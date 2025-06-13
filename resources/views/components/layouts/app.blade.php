@props(["title" => "Default title"])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title }}</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        {{ $slot }}

        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>
