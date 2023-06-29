<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

    </head>
    <body >
        <?php
            $i = 0
            ?>
        @while($i < 5)
            <p>Re-rendering</p>
            <?php
            ++$i;
            ?>
        @endwhile
        @if(10 < 15)
            <p>Teste</p>
        @endif
        <p>{{$nome}}</p>
    </body>
</html>
