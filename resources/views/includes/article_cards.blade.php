<div class="cards-wrapper container mx-auto sm:px-2 md:px-0 lg:px-4">
    <div class="sm:mx-1 lg:mx-4 mt-24 flex flex-wrap">
        @foreach( $articles as $article )
            <?php
                // Collect all article tag->id's in a string to pass as html data-element
                $tagsIds = '';
                foreach( $article->tags as $key => $tag ){
                    $tagsIds .= $tag->id;
                    if( $key !== array_key_last( $article->tags->toArray() ) ){
                        $tagsIds .= ',';
                    }
                }
            ?>
            <div class="card w-full px-4 md:px-2 py-2 mb-12 sm:w-1/2 md:w-1/3 lg:w-1/4"
                data-tags={{ $tagsIds }}>
                <div class="card-image" style="background: no-repeat url('/images/articles/{{ $article->image }}'); background-size: cover;"></div>
                <h4 class="mt-4 mb-2">{{ $article->title }}</h4>
                <p class="mb-2">{{ $article->short }}</p>
                <a href="/{{ app()->getLocale() }}/articles/{{ $article->id }}" class="text-sm font-semibold tracking-widest uppercase">{{ __( 'articles.read-more-link' ) }}</a>
            </div>
        @endforeach
    </div>
</div>
