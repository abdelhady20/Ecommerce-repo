@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <div class="content-header d-flex justify-content-between align-items-center px-3">
            <h1 class="m-0">Orders</h1>
        </div>
        <form method="GET" action="{{ route('admin.orders.index') }}" class="mb-3 d-flex align-items-center gap-2">
            <label for="status" class="mb-0">Filter by Status:</label>
            <select name="status" id="status" class="form-select w-auto" onchange="this.form.submit()">
                <option value="">All</option>
                @foreach(['pending','processing','shipped','completed','cancelled'] as $status)
                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </form>


        <div class="content px-3">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name ?? 'Guest' }}</td>
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-secondary',
                                        'processing' => 'bg-primary',
                                        'shipped' => 'bg-warning text-dark',
                                        'completed' => 'bg-success',
                                        'cancelled' => 'bg-danger',
                                    ];
                                @endphp
                                <td>
                                <span class="badge {{ $statusColors[$order->status] ?? 'bg-secondary' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                </td>

                                <td>${{ number_format($order->total, 2) }}</td>
                                <td>{{ ucfirst($order->payment_method) }} ({{ $order->payment_status }})</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No orders found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
