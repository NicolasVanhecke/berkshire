@extends( 'components.layout' )

@section( 'content' )

@include( 'includes.welcome_banner' )

@include( 'includes.article_cards', [ 'articles' => $articles ] )

@endsection
