@extends('website.layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <div class="container cart-section mx-auto">
        <div class="cart-title">Your Shopping Cart</div>

        @if(count($cartItems) > 0)
            <div class="table-responsive">
                <table class="table cart-table align-middle">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $itemKey => $item)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/' . ($item['main_image'] ?? 'default.png')) }}"
                                     alt="{{ $item['name'] }}"
                                     class="cart-img">
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>${{ number_format($item['unit_price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update', $itemKey) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="item_key" value="{{ $itemKey }}">
                                    <input type="number" name="quantity"
                                           value="{{ $item['quantity'] }}"
                                           min="1" max="10"
                                           class="option-qty text-center" style="width:60px;">
                                    <button type="submit" class="btn btn-sm btn-primary ms-1">↻</button>
                                </form>
                            </td>
                            <td>${{ number_format($item['total_price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $itemKey) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="cart-remove">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Coupon Form --}}
            <form action="{{ route('coupon.apply') }}" method="POST" class="mb-3" style="max-width: 500px;">
                @csrf
                <div class="input-group">
                    <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code" required>
                    <button type="submit" class="btn btn-outline-secondary btn-sm coupon-btn">Apply</button>

                </div>
            </form>

            {{-- If coupon applied --}}
            @if(session('cart')['coupon'] ?? false)
                <div class="alert alert-info">
                    Coupon <strong>{{ session('cart')['coupon']['code'] }}</strong> applied.
                    <form action="{{ route('coupon.remove') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </div>
            @endif

            {{-- Messages --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- Summary --}}
            <div class="row justify-content-end">
                <div class="col-md-5 col-lg-4">
                    <div class="cart-summary">
                        <div class="cart-summary-title">Order Summary</div>
                        <div class="cart-summary-row"><span>Subtotal</span><span>${{ number_format($cartSummary['subtotal'] ?? 0, 2) }}</span></div>
                        <div class="cart-summary-row"><span>Tax</span><span>${{ number_format($cartSummary['tax'] ?? 0, 2) }}</span></div>
                        @if(session('cart')['coupon'] ?? false)
                            <div class="cart-summary-row"><span>Discount</span><span>- ${{ number_format($cartSummary['discount'] ?? 0, 2) }}</span></div>
                        @endif
                        <div class="cart-summary-total">Total: ${{ number_format($cartSummary['total'] ?? 0, 2) }}</div>

                        <a class="btn" href="{{ route('shop.checkout') }}">Proceed to Checkout</a>
                        <form action="{{ route('cart.clear') }}" method="POST" class="mt-2" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">Clear Cart</button>
                        </form>
                    </div>
                </div>
            </div>

        @else
            {{-- Empty Cart State --}}
            <div class="empty-cart">
                <img src="{{asset('assets/images/categories/2762885.png')}}">
                <h4>Your cart is empty</h4>
                <p>Looks like you haven't added anything yet.</p>
                <a href="{{ route('website.home') }}" class="btn">Continue Shopping</a>
            </div>
        @endif
    </div>


    <style>
        :root {
            --primary: #181818;
            --accent: #eab7b1;
            --bg: #faf9f6;
            --card: #fff;
            --text: #222;
            --muted: #888;
            --shadow: 0 4px 24px 0 rgba(24,24,24,0.07);
        }
        .cart-section {
            background: var(--card);
            border-radius: 16px;
            box-shadow: var(--shadow);
            border: 1px solid #f3eaea;
            padding: 2.5rem 2rem;
            margin: 2.5rem 0;
        }
        .cart-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 2rem;
        }
        .cart-table th, .cart-table td {
            vertical-align: middle;
            text-align: center;
        }
        .cart-table th {
            color: var(--primary);
            font-weight: 700;
            background: #fbeeee;
            border: none;
        }
        .cart-table td {
            background: #fff;
            border: none;
            color: var(--text);
            font-size: 1.05rem;
        }
        .cart-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 2px 8px #eab7b133;
        }
        .cart-remove {
            color: var(--accent);
            font-size: 1.2rem;
            cursor: pointer;
            border: none;
            background: none;
            transition: color 0.15s;
        }
        .cart-remove:hover { color: #c0392b; }
        .cart-summary {
            background: #fbeeee;
            border-radius: 16px;
            padding: 2rem 1.5rem;
            box-shadow: var(--shadow);
            margin-top: 2rem;
        }
        .cart-summary-title {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .cart-summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.7rem;
            font-size: 1.08rem;
        }
        .cart-summary-total {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.15rem;
            margin-top: 1rem;
            margin-bottom: 1.2rem;
        }
        .cart-summary .btn {
            background: var(--accent);
            color: #fff;
            border-radius: 30px;
            font-weight: 700;
            padding: 0.7rem 2.2rem;
            font-size: 1.1rem;
            border: none;
            width: 100%;
            transition: background 0.15s;
        }
        .cart-summary .btn:hover {
            background: var(--primary);
            color: #fff;
        }
        .empty-cart {
            text-align: center;
            padding: 3rem 1rem;
        }
        .empty-cart img {
            width: 120px;
            margin-bottom: 1.5rem;
            opacity: 0.7;
        }
        .empty-cart h4 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .empty-cart .btn {
            background: var(--accent);
            color: #fff;
            border-radius: 30px;
            font-weight: 700;
            padding: 0.7rem 2.2rem;
            font-size: 1.1rem;
            border: none;
            margin-top: 1rem;
        }
        .empty-cart .btn:hover {
            background: var(--primary);
            color: #fff;
        }
        @media (max-width: 991px) {
            .cart-section { padding: 1.2rem 0.7rem; }
            .cart-summary { padding: 1.2rem 0.7rem; }
        }
        .coupon-btn {
            padding: 0.3rem 0.9rem;
            font-size: 0.85rem;
            border-radius: 20px;
            height: 39px;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
