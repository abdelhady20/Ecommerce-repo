@extends('admin.layouts.app')

@section('style')
    <style>
        body { background: #f4f6f9; }
        .content-wrapper { padding: 1.5rem; }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .stat-icon {
            font-size: 2rem;
            opacity: 0.8;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- 📊 Stats Row -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="card bg-primary text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3>{{ $stats['totalOrders'] }}</h3>
                                <p>Total Orders</p>
                            </div>
                            <i class="fas fa-shopping-bag stat-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-success text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3>{{ $stats['totalCustomers'] }}</h3>
                                <p>Customers</p>
                            </div>
                            <i class="fas fa-users stat-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-warning text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3>{{ $stats['totalProducts'] }}</h3>
                                <p>Products</p>
                            </div>
                            <i class="fas fa-box stat-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card bg-danger text-white p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3>{{ $stats['totalCategories'] }}</h3>
                                <p>Categories</p>
                            </div>
                            <i class="fas fa-list stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 📈 Charts Row -->
            <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="card p-3">
                        <h5>Monthly Sales</h5>
                        <canvas id="salesChart" height="300"></canvas>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-3">
                        <h5>Orders Status</h5>
                        <canvas id="ordersPie" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- 📋 Latest Orders Table -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card p-3">
                        <h5>Latest Orders</h5>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latestOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>{{ $order->total }} EGP</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        const salesCtx = document.getElementById('salesChart');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($salesMonths) !!},
                datasets: [{
                    label: 'Sales',
                    data: {!! json_encode($salesData) !!},
                    borderColor: '#36a2eb',
                    backgroundColor: 'rgba(54,162,235,0.2)',
                    tension: 0.3
                }]
            }
        });


        const pieCtx = document.getElementById('ordersPie');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Processing', 'Shipped', 'Completed', 'Cancelled'],
                datasets: [{
                    data: {!! json_encode($ordersStatusData) !!},
                    backgroundColor: ['#ffcd56','#36a2eb','#4bc0c0','#00c851','#ff4444']
                }]
            }
        });
    </script>
@endsection
