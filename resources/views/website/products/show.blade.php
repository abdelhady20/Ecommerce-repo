{{-- resources/views/website/products/details.blade.php --}}
@extends('website.layouts.app')

@section('title', $product->name)

@section('content')

    <style>
        :root {
            --primary: #181818;
            --accent: #eab7b1;
            --bg: #faf9f6;
            --card: #fff;
            --text: #222;
            --muted: #888;
            --shadow: 0 4px 24px rgba(24,24,24,0.07);
        }
        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Montserrat', Arial, sans-serif;
        }
        .product-main {
            background: var(--card);
            border-radius: 16px;
            box-shadow: var(--shadow);
            border: 1px solid #f3eaea;
            padding: 2rem;
            margin: 2rem 0;
        }
        .main-img {
            width: 100%;
            height: 340px;
            object-fit: cover;
            border-radius: 14px;
            background: #fbeeee;
            box-shadow: 0 2px 8px rgba(234,183,177,0.2);
        }
        .thumbs {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.8rem;
        }
        .thumbs img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #f3eaea;
            cursor: pointer;
            transition: border 0.2s;
        }
        .thumbs img:hover {
            border: 2px solid var(--accent);
        }
        .product-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }
        .product-price {
            color: var(--accent);
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }
        .product-shortdesc {
            color: var(--muted);
            font-size: 1.08rem;
            margin-bottom: 1rem;
        }
        .btn-primary {
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 30px;
            font-weight: 700;
            padding: 0.6rem 1.6rem;
            font-size: 1rem;
            transition: background 0.15s;
        }
        .btn-primary:hover {
            background: var(--primary);
        }
        .btn-outline-secondary {
            border: 2px solid var(--accent);
            color: var(--accent);
            background: #fff;
            border-radius: 30px;
            font-weight: 700;
            padding: 0.6rem 1.6rem;
            font-size: 1rem;
            transition: all 0.15s;
        }
        .btn-outline-secondary:hover {
            background: var(--accent);
            color: #fff;
        }
        .product-details {
            margin-top: 2rem;
        }
        .product-details h5 {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        .product-specs td {
            color: var(--muted);
            font-size: 1.05rem;
            padding: 0.4rem 0.7rem;
        }
        @media (max-width: 991px) {
            .main-img {
                height: 240px;
            }
        }
    </style>

    <div class="container">
        <div class="product-main">
            <div class="row">
                <!-- الصور -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="{{ asset('uploads/' . $product->main_image) }}"
                         alt="{{ $product->name }}"
                         class="main-img"
                         id="mainProductImg">

                    @if($product->images && count($product->images))
                        <div class="thumbs">
                            @foreach($product->images as $img)
                                <img src="{{ asset('uploads/' . $img) }}"
                                     alt="{{ $product->name }}"
                                     onclick="document.getElementById('mainProductImg').src=this.src">
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- تفاصيل المنتج -->
                <div class="col-lg-7">
                    <div class="product-title">{{ $product->name }}</div>
                    <p class="text-muted mb-1">Category: {{ $product->category?->name }}</p>
                    <div class="product-price">{{ number_format($product->price, 2) }} EGP</div>
                    <div class="product-shortdesc">{{ $product->short_description ?? $product->description }}</div>

                    <!-- Wishlist -->
                    <form action="{{ route('wishlist.store') }}" method="POST" class="mb-2">
                        @csrf
                        <input type="hidden" name="product_slug" value="{{ $product->slug }}">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="icon-heart"></i> Add to Wishlist
                        </button>
                    </form>

                    <!-- Add to Cart -->
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button class="btn btn-primary">
                            <i class="fa fa-shopping-cart me-2"></i> Add to Cart
                        </button>
                    </form>

                    <!-- جدول المواصفات -->
                    <div class="product-details">
                        <h5>Product Details</h5>
                        <table class="table product-specs mb-0">
                            <tbody>
                            @if($product->material) <tr><td>Material</td><td>{{ $product->material }}</td></tr> @endif
                            @if($product->fit) <tr><td>Fit</td><td>{{ $product->fit }}</td></tr> @endif
                            @if($product->care) <tr><td>Care</td><td>{{ $product->care }}</td></tr> @endif
                            @if($product->origin) <tr><td>Origin</td><td>{{ $product->origin }}</td></tr> @endif
                            @if($product->warranty) <tr><td>Warranty</td><td>{{ $product->warranty }}</td></tr> @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
