<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="stylesheet" href=@yield('style')>
    </head>
    <body >
        @yield('content')
        <footer>RAFA Events &copy; 2023</footer>

        <script type="module" src=@yield('script')></script>
    </body>
</html>
