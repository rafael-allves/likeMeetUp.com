<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/assets/logo.png" type="image/x-icon">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        <style>
            *{
                font-family: 'Roboto', sans-serif;

                margin: 0;
                padding: 0;
                
                box-sizing: border-box;
            }

            body, html{
                margin: 0 !important;
                min-width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
