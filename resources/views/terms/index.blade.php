@extends('layouts.site')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">利用規約</h2>
@endsection

@section('content')
    <div class="bg-white shadow-sm sm:rounded-lg p-6">
        <div class="whitespace-pre-line text-gray-800 leading-relaxed">{{ $term?->content }}</div>
    </div>
@endsection
