@extends('layouts.site')

@section('content')
    <div class="mb-10 text-center">
        <h1 class="text-3xl font-bold text-gray-800">NAGOYAMESHI</h1>
        <p class="mt-2 text-gray-600">名古屋のB級グルメ専門レビューサイト</p>
    </div>

    <section class="mb-10">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">カテゴリから探す</h2>
        <div class="flex flex-wrap gap-2">
            @foreach ($categories as $category)
                <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-sm text-gray-700">
                    {{ $category->name }}
                </span>
            @endforeach
        </div>
    </section>

    <section>
        <h2 class="text-lg font-semibold text-gray-800 mb-4">新着店舗</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($shops as $shop)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="text-xs text-gray-500">{{ $shop->category->name }}</div>
                    <div class="font-semibold text-gray-800 mt-1">{{ $shop->name }}</div>
                    <div class="text-sm text-gray-500 mt-1">{{ $shop->address }}</div>
                    <div class="text-sm text-gray-500 mt-1">
                        予算：¥{{ number_format($shop->low_price) }}〜¥{{ number_format($shop->high_price) }}
                    </div>
                </div>
            @empty
                <p class="text-gray-500">店舗がまだ登録されていません。</p>
            @endforelse
        </div>
    </section>
@endsection
