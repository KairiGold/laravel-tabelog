<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\View\View;

class TermController extends Controller
{
    /**
     * 利用規約ページを表示する。
     */
    public function index(): View
    {
        $term = Term::first();

        return view('terms.index', compact('term'));
    }
}
