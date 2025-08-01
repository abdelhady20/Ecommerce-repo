{{-- resources/views/website/categories/products.blade.php --}}
{{--@extends('website.layouts.app')--}}

{{--@section('content')--}}

{{--    <style>--}}
{{--        :root {--}}
{{--            --primary: #181818;--}}
{{--            --accent: #eab7b1;--}}
{{--            --bg: #faf9f6;--}}
{{--            --card: #fff;--}}
{{--            --text: #222;--}}
{{--            --muted: #888;--}}
{{--            --shadow: 0 4px 24px 0 rgba(24,24,24,0.07);--}}
{{--        }--}}
{{--        body { background: var(--bg); color: var(--text); font-family: 'Montserrat', Arial, sans-serif; }--}}
{{--        .product-card {--}}
{{--            background: var(--card);--}}
{{--            border-radius: 16px;--}}
{{--            box-shadow: var(--shadow);--}}
{{--            border: 1px solid #f3eaea;--}}
{{--            padding: 1.2rem;--}}
{{--            margin-bottom: 2rem;--}}
{{--            transition: box-shadow 0.2s, transform 0.15s;--}}
{{--            height: 100%;--}}
{{--            display: flex;--}}
{{--            flex-direction: column;--}}
{{--            justify-content: flex-start;--}}
{{--            align-items: center;--}}
{{--        }--}}
{{--        .product-card:hover {--}}
{{--            box-shadow: 0 8px 32px 0 rgba(234,183,177,0.10);--}}
{{--            transform: translateY(-2px) scale(1.02);--}}
{{--        }--}}
{{--        .product-img {--}}
{{--            width: 100%;--}}
{{--            height: 220px;--}}
{{--            object-fit: cover;--}}
{{--            border-radius: 12px;--}}
{{--            margin-bottom: 1rem;--}}
{{--        }--}}
{{--        .product-title {--}}
{{--            font-size: 1.13rem;--}}
{{--            font-weight: 700;--}}
{{--            color: var(--primary);--}}
{{--            margin-bottom: 0.3rem;--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        .product-price {--}}
{{--            color: var(--accent);--}}
{{--            font-size: 1.08rem;--}}
{{--            font-weight: 700;--}}
{{--            margin-bottom: 0.8rem;--}}
{{--        }--}}
{{--        .btn-primary {--}}
{{--            background: var(--accent);--}}
{{--            border: none;--}}
{{--            border-radius: 30px;--}}
{{--            font-weight: 700;--}}
{{--            padding: 0.5rem 1.5rem;--}}
{{--            font-size: 0.95rem;--}}
{{--            transition: background 0.15s;--}}
{{--        }--}}
{{--        .btn-primary:hover {--}}
{{--            background: var(--primary);--}}
{{--            color: #fff;--}}
{{--        }--}}
{{--        .btn-outline-primary {--}}
{{--            color: var(--accent);--}}
{{--            border: 2px solid var(--accent);--}}
{{--            border-radius: 30px;--}}
{{--            font-weight: 700;--}}
{{--            padding: 0.5rem 1.5rem;--}}
{{--            font-size: 0.95rem;--}}
{{--            transition: all 0.15s;--}}
{{--        }--}}
{{--        .btn-outline-primary:hover {--}}
{{--            background: var(--accent);--}}
{{--            color: #fff;--}}
{{--        }--}}
{{--    </style>--}}

{{--    <div class="container my-5">--}}
{{--        <h2 class="text-center fw-bold mb-5" style="color: var(--primary)">--}}
{{--            {{ $subcategory->name }} Products--}}
{{--        </h2>--}}

{{--        @if($products->count())--}}
{{--            <div class="row">--}}
{{--                @foreach($products as $product)--}}
{{--                    <div class="col-6 col-md-4 col-lg-3">--}}
{{--                        <div class="product-card">--}}
{{--                            --}}{{-- Product Image --}}
{{--                            <a href="{{ route('product.details', $product->slug) }}">--}}
{{--                                <img src="{{ asset('uploads/' . $product->main_image) }}"--}}
{{--                                     alt="{{ $product->name }}"--}}
{{--                                     class="product-img">--}}
{{--                            </a>--}}

{{--                            --}}{{-- Product Title --}}
{{--                            <h5 class="product-title">{{ $product->name }}</h5>--}}

{{--                            --}}{{-- Price --}}
{{--                            <p class="product-price">{{ number_format($product->price, 2) }} EGP</p>--}}

{{--                            --}}{{-- Actions --}}
{{--                            <div class="d-flex justify-content-center gap-2 mt-auto">--}}
{{--                                --}}{{-- View Product --}}
{{--                                <a href="{{ route('product.details', $product->slug) }}"--}}
{{--                                   class="btn btn-outline-primary btn-sm">--}}
{{--                                    View--}}
{{--                                </a>--}}

{{--                                --}}{{-- Add to Cart --}}
{{--                                <form action="{{ route('cart.store') }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="product_id" value="{{ $product->id }}">--}}
{{--                                    <input type="hidden" name="quantity" value="1">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-sm">--}}
{{--                                        Add to Cart--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            --}}{{-- Pagination --}}
{{--            <div class="mt-4">--}}
{{--                {{ $products->links() }}--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <p class="text-center mt-4 text-muted">No products found under this category.</p>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--@endsection--}}
