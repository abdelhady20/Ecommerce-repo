<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(protected OrderRepositoryInterface $orderRepo) {}

    public function index(Request $request)
    {
        $status = $request->get('status');

        if ($status) {
            $orders = $this->orderRepo->getByStatus($status);
        } else {
            $orders = $this->orderRepo->getAll();
        }

        return view('admin.orders.index', compact('orders'));
    }


    public function show($id)
    {
        $order = $this->orderRepo->findById($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
        ]);


        $this->orderRepo->updateStatus($order, $request->status);
        return redirect()->back()->with('success', 'Order status updated successfully');
    }
}

