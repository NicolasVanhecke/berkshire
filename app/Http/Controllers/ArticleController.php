<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
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
            'tags' => $this->fetchTagsWithTranslation(),
            'articles' => $this->fetchArticlesWithTranslation()
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
        // Fetch article(s) with translations
        $article = $this->fetchArticlesWithTranslation( $id );

        // Get main article
        $article = Article::with('tags')->findOrFail($id);
        $translated_article = $this->translateArticle( $article );

        // Gather all id's from main article tags in array
        $tag_ids = $article->tags->pluck('id')->toArray();

        // Fetch (4) random articles with at least one similar tag
        $related_articles = [];
        $related_articles = Article::with('tags')->whereHas('tags', function( $query ) use ( $tag_ids ) {
            return $query->whereIn('tag_id', $tag_ids);
        })
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $translated_related_articles = [];
        foreach( $related_articles as $article ){
            $translated_related_articles[] = $this->translateArticle( $article );
        }

        return view( 'article.show', [
            'article' => $translated_article,
            'related_articles' => $translated_related_articles
        ]);
    }

    private function fetchTagsWithTranslation(){
        $tags = Tag::with(['translations'])->get();
        $translated_tags = [];
        foreach( $tags as $tag ){
            foreach( $tag->translations as $translation ){
                if( $translation->locale === App::getLocale() ){
                    $translated_tags[] = $translation;
                }
            }
        }

        return $translated_tags;
    }

    private function translateArticle( $article ){
        foreach( $article->translations as $translation ){
            if( $translation->locale === App::getLocale() ){
                $translation->setAttribute('image', $article->image );
                $translation->setAttribute('tags', $article->tags );
                $translated_article = $translation;
            }
        }

        return $translated_article;
    }

    private function fetchArticlesWithTranslation( $id = null ){
        if( $id ){
            $article = Article::with('tags')->findOrFail($id);
            foreach( $article->translations as $translation ){
                if( $translation->locale === App::getLocale() ){
                    $translation->setAttribute('tags', $article->tags );
                    $translation->setAttribute('image', $article->image );

                    return $translation;
                }
            }
        } else {
            $articles = Article::with('tags')->get();

            $translated_articles = [];
            foreach( $articles as $article ){
                foreach( $article->translations as $translation ){
                    if( $translation->locale === App::getLocale() ){
                        $translation->setAttribute('tags', $article->tags );
                        $translation->setAttribute('image', $article->image );
                        $translated_articles[] = $translation;
                    }
                }
            }

            return $translated_articles;
        }
    }


}
