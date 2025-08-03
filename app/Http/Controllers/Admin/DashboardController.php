<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $stats = [
            'totalOrders' => Order::count(),
            'totalCustomers' => User::count(),
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
        ];


        $ordersStatusData = [
            Order::where('status', 'pending')->count(),
            Order::where('status', 'processing')->count(),
            Order::where('status', 'shipped')->count(),
            Order::where('status', 'completed')->count(),
            Order::where('status', 'cancelled')->count(),
        ];


        $salesData = [];
        $salesMonths = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $salesMonths[] = $month->format('M Y');
            $salesData[] = Order::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->sum('total');
        }


        $latestOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'ordersStatusData',
            'salesMonths',
            'salesData',
            'latestOrders'
        ));
    }
}
