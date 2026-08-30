<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * 管理者トップページ（集計機能）を表示する。
     */
    public function index(): View
    {
        $totalMemberCount = User::count();
        $freeMemberCount = User::whereDoesntHave('subscriptions', function ($query) {
            $query->where('stripe_status', 'active');
        })->count();
        $paidMemberCount = $totalMemberCount - $freeMemberCount;

        $shopCount = Shop::count();
        $totalReservationCount = Reservation::count();

        $monthlySales = $paidMemberCount * 300;

        return view('admin.home', compact(
            'totalMemberCount',
            'freeMemberCount',
            'paidMemberCount',
            'shopCount',
            'totalReservationCount',
            'monthlySales',
        ));
    }
}
