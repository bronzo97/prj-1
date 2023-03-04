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
        <style>
            .container {
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="{{ url('pluto') }}" method="post">
                @csrf
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name">

                <label for="tel">Telefono:</label>
                <input type="text" name="tel" id="tel">

                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email">

                <label for="mess">Messaggio:</label>
                <textarea name="mess" id="" cols="30" rows="10"></textarea>

                <input type="submit" value="invia">
            </form>
        </div>
    </body>
</html>