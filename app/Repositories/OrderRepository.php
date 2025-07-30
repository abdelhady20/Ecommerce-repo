<?php

namespace App\Repositories;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll()
    {
        return Order::with(['user', 'items.product'])->latest()->get();
    }

    public function findById($id): Order
    {
        return Order::with(['user', 'items.product'])->findOrFail($id);
    }

    public function updateStatus(Order $order, string $status): Order
    {
        $order->update(['status' => $status]);
        return $order;
    }

        public function create(array $data): Order
    {

        $order = Order::create([
            'user_id' => $data['user_id'],
            'address_id' => $data['address_id'] ?? null,
            'status' => $data['status'] ?? 'pending',
            'total' => Cart::totalFloat(),
            'payment_method' => $data['payment_method'],
            'payment_id' => $data['payment_id'] ?? null,
            'payment_status' => $data['payment_status'] ?? 'unpaid',
        ]);


        foreach ($data['items'] ?? [] as $item) {
            $order->items()->create([
                'product_id' => $item['product_id'],
                'product_variant_id' => $item['product_variant_id'] ?? null,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return $order;
    }
    public function getByStatus(string $status)
    {
        return Order::with(['user'])
            ->where('status', $status)
            ->latest()
            ->get();
    }



}
