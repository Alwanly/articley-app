<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class DashboardAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $reporter = $user->where('role_id','2')->count();
        $editor = $user->where('role_id','3')->count();
        $article = Articles::all();
        $publish = $article->where('status', true)->count();
        $article = $article->count();
        
        return view('dashboard.dashboard')->with(compact(['reporter', 'editor', 'article', 'publish']));
    }
    public function listOfReporter()
    {
        $reporters = User::where('role_id', 2)->get();
        return view('dashboard.repoter')->with(compact('reporters'));
    }
    public function listOfEditor()
    {
        $editories = User::where('role_id', 3)->get();
        return view('dashboard.editor')->with(compact('editories'));
    }
    public function add()
    {
        $roles = Roles::all();
        return view('dashboard.addUser')->with(compact('roles'));
    }
    public function saveUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required|min:10',
            'role_id' => 'required'

        ]);
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            throw ValidationException::withMessages([
                'email' => 'Email Already Exist',
            ]);
        }
        $save = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);
        if (!$save) {
            Session::flash('message.error', 'There was Error');
            return redirect()->back();
        }
        Session::flash('message.success', 'Success Create Users');
        return redirect()->back();
    }

    public function categories()
    {
        $categories = Categories::paginate(10);
        return view('dashboard.category-list')->with(compact('categories'));
    }

    public function saveCategory(Request $request)
    {
        $request->validate(['category' => 'required']);
        $Category = new Categories();
        if ($request->id) $Category = Categories::find($request->id);
        $Category->category = $request->category;
        if (!$request->id) $Category->slug = Str::slug($request->category, '-');
        if (!$Category->save()) {
            Session::flash('message.error', 'There was Error');
            return redirect()->back();
        }
        Session::flash('message.success', 'Success Create Users');
        return redirect()->back();
    }
}
