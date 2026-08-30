<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * 会社概要ページを表示する。
     */
    public function index(): View
    {
        $company = Company::first();

        return view('company.index', compact('company'));
    }
}
