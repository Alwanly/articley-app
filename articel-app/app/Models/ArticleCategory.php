<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = [
        'article_id', 'category_id'
    ];
    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function getCategoryName()
    {
        return $this->category->category;
    }
}
