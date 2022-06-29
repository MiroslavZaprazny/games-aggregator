<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Video game aggregator</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <livewire:styles />
        <style>
            html{
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body class="bg-gray-900 text-white">
        <header class="border-b border-gray-800">
            <nav class="container flex lg:flex-row flex-col items-center justify-between mx-auto px-4 py-6">
                <div class="flex items-center mb-5 lg:mb-0">
                    <a href="/">Games aggregator</a>
                    <ul class="flex ml-16 space-x-8">
                        <li><a href="#popular-games" class="hover:text-gray-400">Games</a></li>
                        <li><a href="#recently-reviewed" class="hover:text-gray-400">Reviews</a></li>
                    </ul>
                </div>
                <div class="flex items-center">
                    <livewire:search />
                    <div class="ml-6">
                        <a href="#">
                            <img src="/avatar.jpg" alt="Avatar" class="rounded-full w-8">
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <main class="my-8">
           @yield('content') 
        </main>

        <footer class="border-t border-gray-800">
            <div class="container mx-auto my-6">
                Powered by <a href="">IGDB API</a>
            </div>
        </footer>
    </body>
    <livewire:scripts />
</html>