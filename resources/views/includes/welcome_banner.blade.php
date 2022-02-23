<div class="banner-wrapper pt-32 pb-24">
    <h1 class="font-serif text-center">
        {!! __( 'welcome_banner.title' ) !!}
    </h1>

    <img class="m-auto py-12" src="/images/devider.png" alt="">

    <p class="intro max-w-xl text-center m-auto">
        {!! __( 'welcome_banner.intro' ) !!}
    </p>

    <div class="pt-4 mt-5 text-center">
        <button type="button" data-tag="0" class="tag-pill tag-pill-active text-sm font-semibold py-1 px-3 mx-2 uppercase tracking-wider" name="0">Alles</button>
        @foreach( $tags as $tag )
            <button type="button" data-tag="{{ $tag->tag_id }}"
            class="tag-pill text-sm font-semibold py-1 px-3 mb-4 mx-2 uppercase tracking-wider" name="{{ $tag->tag_id }}">{{ $tag->value }}</button>
        @endforeach
    </div>
</div>
