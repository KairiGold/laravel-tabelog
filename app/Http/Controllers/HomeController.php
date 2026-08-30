<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * トップページを表示する。
     */
    public function index(): View
    {
        $categories = Category::orderBy('id')->get();
        $shops = Shop::with('category')->latest()->take(6)->get();

        return view('home', compact('categories', 'shops'));
    }
}
