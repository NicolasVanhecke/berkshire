<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Duke of Berkshire</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>

        <!-- Styles -->
        <link rel="stylesheet" href="/css/tailwind.css">
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="/js/app.js" type="text/javascript"></script>
    </head>
    <body class="w-screen mx-auto">

        @include( 'includes.navigation' )

        @include( 'includes.alerts' )

        @yield( 'content' )

    </body>
</html>
