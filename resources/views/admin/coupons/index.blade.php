@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper px-3">
        <div class="content-header d-flex justify-content-between align-items-center">
            <h1 class="m-0">Coupons</h1>
            <a href="{{ route('admin.coupons.create') }}" class="btn btn-success">Add Coupon</a>
        </div>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Min Order</th>
                            <th>Expires At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ ucfirst($coupon->discount_type) }}</td>
                                <td>
                                    {{ $coupon->discount_type == 'percent' ? $coupon->discount_value.'%' : '$'.$coupon->discount_value }}
                                </td>
                                <td>{{ $coupon->min_order_amount ?? '-' }}</td>
                                <td>{{ $coupon->expires_at ?? '-' }}</td>
                                <td>
                                <span class="badge {{ $coupon->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $coupon->is_active ? 'Active' : 'Inactive' }}
                                </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No coupons found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
