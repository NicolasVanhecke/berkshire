<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class ArticleTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'locale',
        'title',
        'short',
        'body'
    ];

    /**
     * Relation on articles
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
