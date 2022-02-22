<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        return view( 'article.index', [
            'articles' => Article::with(['tags'])->get(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        // Get main article
        $article = Article::with('tags')->findOrFail($id);

        // Gather all id's from main article tags in array
        $tag_ids = $article->tags->pluck('id')->toArray();

        // Fetch (4) random articles with at least one similar tag
        $related_articles = Article::whereHas('tags', function( $query ) use ( $tag_ids ) {
            return $query->whereIn('tag_id', $tag_ids);
        })
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view( 'article.show', [
            'article' => $article,
            'related_articles' => $related_articles
        ]);
    }
}
