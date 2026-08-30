<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} 管理画面</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 items-center">
                        <a href="{{ route('admin.home') }}" class="text-white font-semibold text-lg">
                            NAGOYAMESHI 管理画面
                        </a>

                        @auth('admin')
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-gray-300 hover:text-white">
                                    ログアウト
                                </button>
                            </form>
                        @endauth
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
        </div>
    </body>
</html>
