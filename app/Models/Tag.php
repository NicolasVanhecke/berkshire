<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\TagTranslation;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function translations()
    {
        return $this->hasMany(TagTranslation::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
