<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| ここに管理者側（/admin配下）のルートを定義する。
| RouteServiceProviderにより、web ミドルウェア・"admin/" プレフィックス・
| "admin." ルート名プレフィックスが自動で付与される。
|
*/

Route::middleware('guest.admin')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // 今後、店舗管理・会員管理・カテゴリ管理・会社概要編集・利用規約編集などの
    // リソースルートをここに追加していく。
});
