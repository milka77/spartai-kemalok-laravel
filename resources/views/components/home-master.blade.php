<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>{{ config('app.name', 'Laravel') }}</title>
        
        {{-- Favicon links --}}
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/images/favicon/site.webmanifest">
        {{-- End Of Favicon links --}}
        
        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/b6c120cd7f.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="bg-zinc-900 font-roboto-con flex flex-col min-h-screen" >
        {{-- Navigation --}}
        <x-home-nav.home-navbar/>
        {{-- End Of Navigation --}}

        {{-- Content --}}
        <div class="h-auto  mt-10 mb-4">
            @yield('content')
        </div>
        {{-- End Of Content --}}

        {{-- Footer --}}
        <x-home-nav.home-footer/>
        {{-- End Of Footer --}}
    </body>
    @yield('extra-js')
</html>