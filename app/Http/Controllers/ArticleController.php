<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
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
     */
    public function show($locale, $id)
    {
        // // Fetch article with translations
        $translated_article = $this->fetchArticlesWithTranslation( $id );

        // Gather all id's from main article tags in array
        $tag_ids = $translated_article->tags->pluck('id')->toArray();

        // Fetch (4) random articles with at least one similar tag
        $related_articles = [];
        $related_articles = Article::with('tags')->whereHas('tags', function( $query ) use ( $tag_ids ) {
            return $query->whereIn('tag_id', $tag_ids);
        })
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // Translate the related articles according to the locale
        $translated_related_articles = [];
        foreach( $related_articles as $article ){
            $translated_related_articles[] = $this->translateArticle( $article );
        }

        return view( 'article.show', [
            'article' => $translated_article,
            'related_articles' => $translated_related_articles
        ]);
    }

    /**
     * Fetch tags from the database in the correct language.
     */
    private function fetchTagsWithTranslation(){
        $tags = Tag::with(['translations'])->get();
        $translated_tags = [];
        foreach( $tags as $tag ){
            foreach( $tag->translations as $translation ){ // loop all translations
                if( $translation->locale === App::getLocale() ){ // if translation matches the selected locale
                    $translated_tags[] = $translation; // add to return array
                }
            }
        }

        return $translated_tags;
    }

    /**
     * Fetch the translation for the given article.
     */
    private function translateArticle( $article ){
        foreach( $article->translations as $translation ){ // loop all translations
            if( $translation->locale === App::getLocale() ){ // if translation matches the selected locale
                $translation->setAttribute('image', $article->image ); // add image
                $translation->setAttribute('tags', $article->tags ); // add tags
                $translated_article = $translation;
            }
        }

        return $translated_article;
    }

    /**
     * Fetch article(s) from the database in the correct language.
     */
    private function fetchArticlesWithTranslation( $id = null ){
        // If an article id is passed, fetch just 1 article
        if( $id ){
            $article = Article::with('tags')->findOrFail($id); // article
            foreach( $article->translations as $translation ){ // loop all translations
                if( $translation->locale === App::getLocale() ){ // if translation matches the selected locale
                    $translation->setAttribute('tags', $article->tags ); // add tags
                    $translation->setAttribute('image', $article->image ); // add image

                    return $translation;
                }
            }
        } else {
            // If no id is passed, fetch all articles
            $articles = Article::with('tags')->get();

            $translated_articles = [];
            foreach( $articles as $article ){
                foreach( $article->translations as $translation ){ // loop all translations
                    if( $translation->locale === App::getLocale() ){ // if translation matches the selected locale
                        $translation->setAttribute('tags', $article->tags ); // add tags
                        $translation->setAttribute('image', $article->image ); // add image
                        $translated_articles[] = $translation; // add to return array
                    }
                }
            }

            return $translated_articles;
        }
    }


}
