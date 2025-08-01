@extends('website.layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="container checkout-section mx-auto">
        <div class="checkout-title">Checkout</div>

        <form action="{{ route('shop.checkout.store') }}" method="POST">
            @csrf

            @if ($errors->has('stripe'))
                <div class="alert alert-danger">
                    {{ $errors->first('stripe') }}
                </div>
            @endif

            <div class="row">
                {{-- Shipping Address --}}
                <div class="col-lg-7">
                    <div class="section-title">Shipping Address</div>
                    @if(isset($defaultAddress) && $defaultAddress)
                        <div class="border p-3 mb-3 bg-light">
                            <h6>Default Address</h6>
                            <p>{{ $defaultAddress->street }}, {{ $defaultAddress->city }}, {{ $defaultAddress->country }}</p>
                            <p><strong>Phone:</strong> {{ $defaultAddress->phone }}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="use_default_address" value="1" id="useDefault" checked>
                                <label class="form-check-label" for="useDefault">
                                    Use this default address
                                </label>
                            </div>
                        </div>
                        <hr>
                    @endif
                    <div id="newAddressFields" @if(isset($defaultAddress) && $defaultAddress) style="display:none;" @endif>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">First Name *</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                                @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name *</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                                @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone *</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City *</label>
                                <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                                @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Postal Code *</label>
                                <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}">
                                @error('postal_code') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Full Shipping Address *</label>
                                <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country *</label>
                                <select name="country" class="form-control">
                                    <option value="">-- Select Country --</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="UAE">UAE</option>
                                    <option value="USA">USA</option>
                                </select>
                                @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Notes (Optional)</label>
                                <textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Method --}}
                    <div class="section-title mt-4">Payment Method</div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="payStripe" value="stripe" required>
                        <label class="form-check-label" for="payStripe">Credit Card (via Stripe)</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="payCOD" value="cod" required>
                        <label class="form-check-label" for="payCOD">Cash on Delivery</label>
                    </div>
                    @error('payment_method')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Order Summary --}}
                <div class="col-lg-5">
                    <div class="order-summary">
                        <div class="order-summary-title">Order Summary</div>

                        @forelse($cartItems as $item)
                            <div class="order-summary-row">
                                <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                                <span>${{ number_format($item['unit_price'] * $item['quantity'], 2) }}</span>
                            </div>
                        @empty
                            <p>No items in your cart.</p>
                        @endforelse

                        <div class="order-summary-row">
                            <span>Subtotal</span>
                            <span>${{ number_format($cartSummary['subtotal'], 2) }}</span>
                        </div>
                        <div class="order-summary-row">
                            <span>Tax</span>
                            <span>${{ number_format($cartSummary['tax'], 2) }}</span>
                        </div>
                        <div class="order-summary-total">
                            Total: <span>${{ number_format($cartSummary['total'], 2) }}</span>
                        </div>

                        <button type="submit" class="btn mt-3">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Script to toggle new address form --}}
    <script>
        document.getElementById('useDefault')?.addEventListener('change', function() {
            document.getElementById('newAddressFields').style.display = this.checked ? 'none' : 'block';
        });
    </script>
@endsection
