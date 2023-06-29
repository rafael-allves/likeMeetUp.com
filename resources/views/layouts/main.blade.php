<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yeld('title')</title>
        <link rel="stylesheet" href="@yeld('style')">
    </head>
    <body >
        @yeld('content')
        <footer>RAFA Events &copy; 2023</footer>

        <script type="module" src="@yeld('script')"></script>
    </body>
</html>
