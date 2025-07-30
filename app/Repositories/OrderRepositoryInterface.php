<?php

namespace App\Repositories;

use App\Models\Order;

interface OrderRepositoryInterface
{
    public function getAll();
    public function findById($id): Order;
    public function updateStatus(Order $order, string $status): Order;
    public function create(array $data): Order;
}
