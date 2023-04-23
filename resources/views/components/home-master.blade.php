<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Social, SEO meta links --}}
        <meta property="og:title" content="Spártai Kemálok" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://kemalok.hu" />
        <meta property="og:image" content="https://kemalok.hu/images/meta-kemalok.png" />
        <meta property="og:description" content="Spártai Kemálok WoW Guild, EU-Ragnaros" />
        <meta name="theme-color" content="#FF0000">

        <meta name="description" content="Spártai Kemálok Hungarian WoW Guild, EU-Ragnaros"/>
        <meta name="keywords" content="World Of Warcraft, Spártai Kemálok, Spártai, Kemálok, Ragnaros, EU, magyar, hungarian, guild, dps, tank, heal, class, dragonflight"/>

        <!-- Include this to make the og:image larger -->
        <meta name="twitter:card" content="summary_large_image">
        {{-- End Of Social, SEO meta links --}}


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
        
        {{-- Google tag (gtag.js) --}}
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1Y6TQHLWPP"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            
            gtag('config', 'G-1Y6TQHLWPP');
            </script>
        {{-- End of Google tag (gtag.js) --}}

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