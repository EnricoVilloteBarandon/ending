<!DOCTYPE html>
<html lang="en">

    <head>
        {!! meta_init() !!}
        <meta name="keywords" content="@get('keywords')">
        <meta name="description" content="@get('description')">
        <meta name="author" content="@get('author')">
        <input type="hidden" id="hiddenUrl" value="{{ url('/') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <title>@get('title')</title>

        @styles()
        @scripts()
        
    </head>

    <body>
        @partial('header')

        @content()

        @partial('footer')

    </body>

</html>
