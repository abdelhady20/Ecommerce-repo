@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header d-flex justify-content-between align-items-center px-3">
            <h1 class="m-0">Order #{{ $order->id }} Details</h1>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="content px-3">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card p-3">
                <h5>Customer: {{ $order->user->name ?? 'Guest' }}</h5>
                <p>Email: {{ $order->user->email ?? '-' }}</p>
                <p>Shipping Address:  {{ $order->address->full_address ?? 'No address provided' }}</p>
                <p>Payment Method: {{ ucfirst($order->payment_method) }}</p>
                <p>Payment Status: {{ ucfirst($order->payment_status) }}</p>
                <p>Total: ${{ number_format($order->total, 2) }}</p>
                <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>

                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <label for="status">Update Status:</label>
                        <select name="status" class="form-control" style="width: 200px;">
                            @foreach(['pending', 'processing', 'shipped', 'completed', 'cancelled'] as $status)
                                <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success mt-2">Update Status</button>
                </form>
            </div>

            <div class="card mt-4 p-3">
                <h4>Order Items</h4>
                <table class="table table-bordered mt-2">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
