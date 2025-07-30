@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper px-3">
        <div class="content-header d-flex justify-content-between align-items-center">
            <h1 class="m-0">Add Coupon</h1>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="content">
            <div class="card p-3">
                <form action="{{ route('admin.coupons.store') }}" method="POST">
                    @csrf

                    {{-- CODE --}}
                    <div class="form-group mb-3">
                        <label for="code">Code</label>
                        <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                               value="{{ old('code', $coupon->code ?? '') }}" required>
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- TYPE --}}
                    <div class="form-group mb-3">
                        <label for="discount_type">Type</label>
                        <select name="discount_type" id="discount_type" class="form-control @error('discount_type') is-invalid @enderror" required>
                            <option value="fixed" {{ old('discount_type', $coupon->discount_type ?? '') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                            <option value="percent" {{ old('discount_type', $coupon->discount_type ?? '') == 'percent' ? 'selected' : '' }}>Percent</option>
                        </select>
                        @error('discount_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- VALUE --}}
                    <div class="form-group mb-3">
                        <label for="discount_value">Discount Value</label>
                        <input type="number" step="0.01" name="discount_value" id="discount_value"
                               class="form-control @error('discount_value') is-invalid @enderror"
                               value="{{ old('discount_value', $coupon->discount_value ?? '') }}" required>
                        @error('discount_value')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- MIN ORDER --}}
                    <div class="form-group mb-3">
                        <label for="min_order_amount">Minimum Order Amount</label>
                        <input type="number" step="0.01" name="min_order_amount" id="min_order_amount"
                               class="form-control @error('min_order_amount') is-invalid @enderror"
                               value="{{ old('min_order_amount', $coupon->min_order_amount ?? '') }}">
                        @error('min_order_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- EXPIRES --}}
                    <div class="form-group mb-3">
                        <label for="expires_at">Expires At</label>
                        <input type="date" name="expires_at" id="expires_at"
                               class="form-control @error('expires_at') is-invalid @enderror"
                               value="{{ old('expires_at', isset($coupon->expires_at) ? $coupon->expires_at->format('Y-m-d') : '') }}">
                        @error('expires_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- STATUS --}}
                    <div class="form-group mb-3">
                        <label for="is_active">Status</label>
                        <select name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror" required>
                            <option value="1" {{ old('is_active', $coupon->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('is_active', $coupon->is_active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('is_active')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
