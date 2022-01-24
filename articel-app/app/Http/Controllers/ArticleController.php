<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\StatusPublish;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Articles::paginate(20);        
        return view('dashboard.article.index')->with(compact('articles'));
    }
    public function write()
    {
        $categories = Categories::all();
        return view('dashboard.article.add')->with(compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'blog' => 'required',
            'kategori' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $Article = new Articles();
            $Article->title = $request->title;
            $Article->reporter_id = Auth::id();
            $Article->blog = $request->blog;

            if (!$Article->save()) throw new \Throwable;

            $idArticle = $Article->id;
            $ArticleCategory = new ArticleCategory();
            $kt = $request->kategori;
            $data = array_map(function ($data) use ($idArticle) {
                return [
                    'article_id' => $idArticle,
                    'category_id' => intval($data)
                ];
            }, $kt);
            if (!$ArticleCategory->insert($data)) throw new \Throwable;
            DB::commit();
            Session::flash('message.success', 'Success Create Article');
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('message.error', 'There was Error');
        }
        return redirect()->back();
    }
    public function view(Articles $article)
    {
        $categoriesAr = ArticleCategory::where('article_id', $article->id)->get();
        $categories = Categories::all();
        return view('dashboard.article.view')->with(compact(['article', 'categories', 'categoriesAr']));
    }
    public function editList(Request $request)
    {
        $articles = Articles::whereNull('editor_id')
            ->orWhere('editor_id', Auth::id())
            ->whereStatus(0)
            ->paginate(20);
        return view('dashboard.article.edit-list')->with(compact('articles'));
    }
    public function edit(Articles $article)
    {
        $article->editor_id = Auth::id();
        $article->save();
        $categoriesAr = ArticleCategory::where('article_id', $article->id)->get();
        $categories = Categories::all();
        return view('dashboard.article.edit')->with(compact(['article', 'categories', 'categoriesAr']));
    }

    public function update(Request $request, Articles $article)
    {
        $submit = $request->submit;
        DB::beginTransaction();
        try {
            $article->blog = $request->blog;

            if (!$article->save()) throw new \Throwable;
            Session::flash('message.success', 'Success Update Article');
            if ($submit == 'save_publish') {
                $this->publish($article);
            }
            DB::commit();
        } catch (\Throwable $th) {
            Session::flash('message.error', 'There was Error');
            DB::rollBack();
        }
        return redirect()->back();
    }

    public function publish(Articles $article)
    {
        $article->publish_date = Carbon::now();
        $article->status = 1;
        if (!$article->save()) throw new \Throwable;
        Session::flash('message.success', 'Success Updaet and Publish Article');
        return redirect()->back();
    }
}
