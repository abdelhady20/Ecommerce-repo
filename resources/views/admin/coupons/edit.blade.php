@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper px-3">
        <div class="content-header d-flex justify-content-between align-items-center">
            <h1 class="m-0">Edit Coupon</h1>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="content">
            <div class="card p-4">
                <form action="{{ route('admin.coupons.update', $coupon) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="code" class="form-label">Coupon Code</label>
                        <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                               value="{{ old('code', $coupon->code) }}">
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="discount_type" class="form-label">Discount Type</label>
                        <select name="discount_type" id="discount_type" class="form-select @error('discount_type') is-invalid @enderror">
                            <option value="fixed" {{ old('discount_type', $coupon->discount_type) == 'fixed' ? 'selected' : '' }}>Fixed</option>
                            <option value="percent" {{ old('discount_type', $coupon->discount_type) == 'percent' ? 'selected' : '' }}>Percent</option>
                        </select>
                        @error('discount_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="discount_value" class="form-label">Discount Value</label>
                        <input type="number" step="0.01" name="discount_value" id="discount_value"
                               class="form-control @error('discount_value') is-invalid @enderror"
                               value="{{ old('discount_value', $coupon->discount_value) }}">
                        @error('discount_value')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="min_order_amount" class="form-label">Minimum Order Amount</label>
                        <input type="number" step="0.01" name="min_order_amount" id="min_order_amount"
                               class="form-control @error('min_order_amount') is-invalid @enderror"
                               value="{{ old('min_order_amount', $coupon->min_order_amount) }}">
                        @error('min_order_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="expires_at" class="form-label">Expiration Date</label>
                        <input type="date" name="expires_at" id="expires_at"
                               class="form-control @error('expires_at') is-invalid @enderror"
                               value="{{ old('expires_at', $coupon->expires_at ? date('Y-m-d', strtotime($coupon->expires_at)) : '') }}"

                        @error('expires_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-4">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
                            {{ old('is_active', $coupon->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>


                    <button type="submit" class="btn btn-primary">Update Coupon</button>
                </form>
            </div>
        </div>
    </div>
@endsection
