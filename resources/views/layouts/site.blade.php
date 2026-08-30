<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 items-center">
                        <a href="{{ route('home') }}" class="font-bold text-xl text-gray-800">
                            NAGOYAMESHI
                        </a>

                        <div class="flex items-center gap-4 text-sm">
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">マイページ</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">ログイン</a>
                                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">会員登録</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            @hasSection('header')
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
            @endif

            <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>

            <footer class="border-t border-gray-200 bg-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-sm text-gray-500 flex gap-6">
                    <a href="{{ route('company.index') }}" class="hover:text-gray-800">会社概要</a>
                    <a href="{{ route('terms.index') }}" class="hover:text-gray-800">利用規約</a>
                </div>
            </footer>
        </div>
    </body>
</html>
