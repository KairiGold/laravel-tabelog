@extends('admin.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">管理者トップページ</h2>
@endsection

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-sm text-gray-500">総会員数</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">{{ $totalMemberCount }} 人</div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-sm text-gray-500">無料会員数</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">{{ $freeMemberCount }} 人</div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-sm text-gray-500">有料会員数</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">{{ $paidMemberCount }} 人</div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-sm text-gray-500">店舗数</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">{{ $shopCount }} 店舗</div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-sm text-gray-500">総予約数</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">{{ $totalReservationCount }} 件</div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-sm text-gray-500">月間売上（概算）</div>
            <div class="text-3xl font-bold text-gray-800 mt-2">¥{{ number_format($monthlySales) }}</div>
        </div>
    </div>
@endsection
