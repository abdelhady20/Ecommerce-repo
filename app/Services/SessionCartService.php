<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Session;

class SessionCartService
{
    protected $key = 'cart';
    protected float $taxs = 0.1;

    public function get()
    {
        return session()->get($this->key, [
            'items' => [],
            'summary' => [
                'quantity' => 0,
                'subtotal' => 0,
                'tax' => 0,
                'discount' => 0,
                'total' => 0,
            ],
            'coupon' => null,
        ]);
    }

    public function save($cart)
    {
        session()->put($this->key, $cart);
    }

    public function all()
    {
        return $this->get();
    }

    public function add(Product $product, int $quantity = 1, ?ProductVariant $variant = null)
    {
        $cart = $this->get();

        $itemKey = $variant ? "{$product->id}_{$variant->id}" : (string) $product->id;

        if (isset($cart['items'][$itemKey])) {
            $cart['items'][$itemKey]['quantity'] += $quantity;
        } else {
            $cart['items'][$itemKey] = [
                'product_id' => $product->id,
                'variant_id' => $variant?->id,
                'name' => $product->name,
                'quantity' => $quantity,
                'unit_price' => $variant?->price ?? $product->price,
                'unit_tax' => round(($variant?->price ?? $product->price) * $this->taxs, 2),
                'total_price' => 0,
                'total_tax' => 0,
                'main_image' => $product->main_image ?? 'default.png',
            ];
        }


        $item = &$cart['items'][$itemKey];
        $item['total_price'] = $item['unit_price'] * $item['quantity'];
        $item['total_tax'] = $item['unit_tax'] * $item['quantity'];

        $this->recalculateSummary($cart);

        $this->save($cart);

        return $cart;
    }

    public function updateQuantity(string $itemKey, int $quantity)
    {
        $cart = $this->get();

        if (isset($cart['items'][$itemKey])) {
            $product = Product::find($cart['items'][$itemKey]['product_id']);

            if (!$product) {
                session()->flash('error', 'Product not found.');
                return $cart;
            }

            if ($product->stock < $quantity) {
                session()->flash('error', "Only {$product->stock} items available in stock.");
                return $cart;
            }

            if ($quantity <= 0) {
                unset($cart['items'][$itemKey]);
            } else {
                $cart['items'][$itemKey]['quantity'] = $quantity;
                $cart['items'][$itemKey]['total_price'] = $cart['items'][$itemKey]['unit_price'] * $quantity;
                $cart['items'][$itemKey]['total_tax'] = $cart['items'][$itemKey]['unit_tax'] * $quantity;
            }

            $this->recalculateSummary($cart);
            $this->save($cart);
        }

        return $cart;
    }



    public function remove(string $itemKey)
    {
        $cart = $this->get();

        if (isset($cart['items'][$itemKey])) {
            unset($cart['items'][$itemKey]);
            $this->recalculateSummary($cart);
            $this->save($cart);
        }

        return $cart;
    }

    public function clear()
    {
        session()->forget($this->key);
    }

    public function recalculateSummary(&$cart)
    {
        $subtotal = 0;
        $tax = 0;
        $quantity = 0;

        foreach ($cart['items'] as $item) {
            $subtotal += $item['total_price'];
            $tax += $item['total_tax'];
            $quantity += $item['quantity'];
        }

        $discount = 0;

        if (!empty($cart['coupon'])) {
            if ($cart['coupon']['discount_type'] === 'percent') {
                $discount = round($subtotal * ($cart['coupon']['discount_value'] / 100), 2);
            } elseif ($cart['coupon']['discount_type'] === 'fixed') {
                $discount = $cart['coupon']['discount_value'];
            }
        }

        $total = $subtotal + $tax - $discount;
        if ($total < 0) $total = 0;

        $cart['summary'] = [
            'subtotal' => $subtotal,
            'tax' => $tax,
            'discount' => $discount,
            'total' => $total,
            'quantity' => $quantity,
        ];
    }
    public function has(Product $product, ?ProductVariant $variant = null): bool
    {
        $cart = $this->get();
        $itemKey = $variant ? "{$product->id}_{$variant->id}" : (string) $product->id;

        return isset($cart['items'][$itemKey]);
    }

}
