@extends('layouts.site')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">会社概要</h2>
@endsection

@section('content')
    <div class="bg-white shadow-sm sm:rounded-lg p-6">
        @if ($company)
            <table class="w-full text-sm">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left py-3 w-40 text-gray-500 font-medium">会社名</th>
                        <td class="py-3 text-gray-800">{{ $company->name }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="text-left py-3 text-gray-500 font-medium">郵便番号</th>
                        <td class="py-3 text-gray-800">{{ $company->postal_code }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="text-left py-3 text-gray-500 font-medium">住所</th>
                        <td class="py-3 text-gray-800">{{ $company->address }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="text-left py-3 text-gray-500 font-medium">代表者</th>
                        <td class="py-3 text-gray-800">{{ $company->representative }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="text-left py-3 text-gray-500 font-medium">事業内容</th>
                        <td class="py-3 text-gray-800">{{ $company->business }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="text-left py-3 text-gray-500 font-medium">設立</th>
                        <td class="py-3 text-gray-800">{{ optional($company->established_on)->format('Y年n月j日') }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="text-left py-3 text-gray-500 font-medium">資本金</th>
                        <td class="py-3 text-gray-800">{{ $company->capital }}</td>
                    </tr>
                    <tr>
                        <th class="text-left py-3 text-gray-500 font-medium">従業員数</th>
                        <td class="py-3 text-gray-800">{{ $company->number_of_employees }}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <p class="text-gray-500">会社情報が登録されていません。</p>
        @endif
    </div>
@endsection
