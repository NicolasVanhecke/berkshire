@extends( 'components.layout' )

@section( 'content' )
<?php $articles = $related_articles; ?>
<div class="article-wrapper container mx-auto pt-32">
    <h1 class="mx-auto w-5/6 text-center">
        {{ $article->title }}
    </h1>

    <img class="mx-auto w-max my-12" src="/images/devider.png" alt="">

    <img class="mx-auto w-5/6 lg:w-4/6 mb-8" src="/images/articles/{{ $article->image }}" alt="">

    <div class="article-body mx-auto w-5/6 lg:w-1/2 lg:w-1/2">
        {!! $article->body !!}
    </div>
</div>

<div class="related-products-wrapper py-2 md:py-4 lg:py-6 mt-4 md:mt-8 lg:mt-12">
    <h3 class="text-center">{{ __( 'articles.inspiration' ) }}</h3>
    @include( 'includes.article_cards' )
</div>

<div class="newsletter-wrapper py-2 md:py-4 lg:py-6">
    @include( 'includes.newsletter' )
</div>
@endsection
