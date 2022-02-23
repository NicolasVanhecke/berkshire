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

    /**
     * Relation on translations
     */
    public function translations()
    {
        return $this->hasMany(ArticleTranslation::class);
    }

    /**
     * Relation on tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
