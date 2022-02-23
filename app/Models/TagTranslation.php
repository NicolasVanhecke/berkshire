<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class TagTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'locale',
        'value'
    ];

    /**
     * Relation on tags
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
