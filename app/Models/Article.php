<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\ArticleTranslation;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'short',
        'body'
    ];

    public function translations()
    {
        return $this->hasMany(ArticleTranslation::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
