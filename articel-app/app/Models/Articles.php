<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'title', 'blog', 'reporter_id'
    ];
    protected $attributes = [
        'status' => false
    ];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id', 'id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id', 'id');
    }

    public function statusPublish()
    {
        return $this->belongsTo(StatusPublish::class, 'status', 'id');
    }
    public function getStatusPublish()
    {
        return $this->statusPublish->status;
    }
    public function getEditorName()
    {
        $editor = $this->editor;
        if (!$editor) return "Belum ada Editor";
        return $editor->name;
    }
    public function getDatePublish()
    {
        $status = $this->status;
        if (!$status) return "Belum Publish";
        return Carbon::parse($this->publish_date)->isoFormat('dddd, D MMMM Y');
    }

    public function getDateCreate()
    {
        return Carbon::parse($this->created_at)->isoFormat('dddd, D MMMM Y');
    }
    public function category()
    {
        return $this->hasMany(ArticleCategory::class, 'article_id', 'id');
    }
}
