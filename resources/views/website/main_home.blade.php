@extends('website.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="page-content pb-5">

        <!-- Hero Section -->
        <section class="hero-fashion position-relative">
            <div class="hero-overlay"></div>
            <div class="hero-content text-center">
                <h1>Fashion for Every Story</h1>
                <p>Discover the latest trends in men’s, women’s, and kids’ fashion.</p>
                <a href="{{ route('website.home') }}" class="btn btn-primary">Shop Now <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </section>

        <!-- Promo Banner -->
        <div class="container-fluid px-0">
            <div class="promo-banner mb-4 d-flex justify-content-between align-items-center px-4">
                <span><i class="fa fa-bolt"></i> Spring Sale: Up to 40% Off! </span>
                <a href="{{ route('website.home') }}" class="btn btn-primary">Shop Now</a>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="container categories-section my-5">
            <h3 class="mb-4 fw-bold" style="color:var(--primary)">Shop by Category</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="category-card">
                        <a href="{{ route('website.category.subcategories', 'men') }}">
                            <img src="{{ asset('assets/images/categories/tm-men1_0001_TM-MEN3.jpg') }}" class="category-img" alt="Men">
                        </a>
                        <div class="category-title">Men</div>
                        <div class="category-desc">Shirts, trousers, shoes & more</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-card">
                        <a href="{{ route('website.category.subcategories', 'women') }}">
                            <img src="{{ asset('assets/images/categories/article4221.jpg') }}" class="category-img" alt="Women">
                        </a>
                        <div class="category-title">Women</div>
                        <div class="category-desc">Dresses, blouses, shoes & more</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-card">
                        <a href="{{ route('website.category.subcategories', 'kids') }}">
                            <img src="{{ asset('assets/images/categories/kids-2-918x1024-1.png') }}" class="category-img" alt="Kids">
                        </a>
                        <div class="category-title">Kids</div>
                        <div class="category-desc">T-shirts, trousers, shoes & more</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Arrivals -->
        <div class="container products-section my-5">
            <h3 class="mb-4 fw-bold" style="color:var(--primary)">New Arrivals</h3>
            <div class="row g-4">
                @foreach($newProducts as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="product-card h-100">
                            <img src="{{ asset('uploads/' . $product->main_image) }}" alt="{{ $product->name }}" class="product-img">
                            <div class="product-title">{{ $product->name }}</div>
                            <div class="product-price">${{ number_format($product->price, 2) }}</div>
                            <div class="product-desc">{{ Str::limit($product->description, 60) }}</div>
                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-primary mt-auto">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Featured Products -->
        <div class="container favorites-section my-5">
            <h3 class="mb-4 fw-bold" style="color:var(--primary)">Featured Products</h3>
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="product-card h-100">
                            <img src="{{ asset('uploads/' . $product->main_image) }}" alt="{{ $product->name }}" class="product-img">
                            <div class="product-title">{{ $product->name }}</div>
                            <div class="product-price">${{ number_format($product->price, 2) }}</div>
                            <div class="product-desc">{{ Str::limit($product->description, 60) }}</div>
                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-primary mt-auto">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container mb-5">
            <div class="newsletter-section">
                <h4 style="color:var(--primary);font-weight:700;">Stay in Style!</h4>
                <p style="color:var(--muted);">Sign up for our newsletter to get the latest trends, exclusive offers, and style tips.</p>
                <form class="d-flex justify-content-center flex-wrap">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit" class="btn ms-2">Subscribe</button>
                </form>
            </div>
        </div>
        <!-- Featured Brands Bar -->
        <div class="container brands-bar">
            <img src="{{ asset('assets/images/brands/nike-1-1024x699.jpg') }}" alt="Nike" class="brand-logo">
            <img src="{{ asset('assets/images/brands/452.jpg') }}" alt="Adidas" class="brand-logo">
            <img src="{{ asset('assets/images/brands/51.jpg') }}" alt="Zara" class="brand-logo">
            <img src="{{ asset('assets/images/brands/UNIQLO_logo_(Japanese).svg.png') }}" alt="Uniqlo" class="brand-logo">
            <img src="{{ asset('assets/images/brands/444.jpg') }}" alt="H&M" class="brand-logo">
        </div>


        <!-- Benefits Bar -->
        <div class="container benefits-bar my-5">
            <div class="benefit"><i class="fa fa-shipping-fast"></i> Free Shipping</div>
            <div class="benefit"><i class="fa fa-undo"></i> Easy Returns</div>
            <div class="benefit"><i class="fa fa-lock"></i> Secure Checkout</div>
            <div class="benefit"><i class="fa fa-headset"></i> 24/7 Support</div>
        </div>

    </div>

    <style>

        .hero-fashion {
            background: url('{{ asset('assets/images/hero.jpg') }}') center/cover no-repeat;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: white;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.4);
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .promo-banner {
            background: var(--accent);
            color: white;
            padding: 10px;
        }
        .category-card {
            text-align: center;
        }
        .category-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 12px;
        }
        .product-card {
            background: #fff;
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }
        .product-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
        }
        .benefits-bar {
            background: #fff;
            border-radius: 12px;
            padding: 1rem;
            display: flex;
            justify-content: space-around;
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WearC | Fashion for Everyone</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            body { background: var(--bg); color: var(--text); font-family: 'Montserrat', Arial, sans-serif; }
            .navbar {
                background: #fff;
                box-shadow: var(--shadow);
                font-family: 'Montserrat', sans-serif;
                padding-top: 0.7rem;
                padding-bottom: 0.7rem;
            }
            .navbar-brand {
                font-weight: 800;
                font-size: 1.5rem;
                color: var(--primary) !important;
                letter-spacing: 0.04em;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            .navbar-brand i { color: var(--accent); font-size: 1.7rem; }
            .navbar-nav .nav-link {
                color: var(--primary) !important;
                font-weight: 600;
                font-size: 1rem;
                padding: 0.5rem 1rem;
                border-radius: 6px;
                margin: 0 0.1rem;
                transition: background 0.15s, color 0.15s;
            }
            .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover {
                background: #fbeeee;
                color: var(--accent) !important;
            }
            .navbar-icons {
                display: flex;
                align-items: center;
                gap: 1.2rem;
                margin-left: 1rem;
            }
            .navbar-icons i {
                font-size: 1.3rem;
                color: var(--primary);
                cursor: pointer;
                transition: color 0.15s;
            }
            .navbar-icons i:hover { color: var(--accent); }
            .hero-fashion {
                width: 100%;
                min-height: 420px;
                background: url('https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
                display: flex;
                align-items: center;
                border-radius: 24px;
                box-shadow: var(--shadow);
                margin-top: 2.5rem;
                margin-bottom: 2.5rem;
                position: relative;
            }
            .hero-overlay {
                background: rgba(24,24,24,0.38);
                border-radius: 24px;
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0; left: 0;
                z-index: 1;
            }
            .hero-content {
                position: relative;
                z-index: 2;
                color: #fff;
                padding: 3.5rem 2.5rem;
                max-width: 600px;
            }
            .hero-content h1 {
                font-size: 2.7rem;
                font-weight: 800;
                margin-bottom: 1.2rem;
                letter-spacing: -1px;
                color: #fff;
                text-shadow: 0 2px 8px rgba(24,24,24,0.18);
            }
            .hero-content p {
                font-size: 1.18rem;
                color: #fbeeee;
                margin-bottom: 2rem;
                text-shadow: 0 2px 8px rgba(24,24,24,0.12);
            }
            .hero-content .btn {
                background: var(--accent);
                color: #fff;
                font-weight: 700;
                border-radius: 30px;
                padding: 0.85rem 2.5rem;
                font-size: 1.15rem;
                box-shadow: 0 4px 24px 0 rgba(234,183,177,0.10);
                transition: background 0.2s, color 0.2s, transform 0.15s, box-shadow 0.2s;
                border: none;
            }
            .hero-content .btn:hover {
                background: #fff;
                color: var(--accent);
                transform: scale(1.04);
                box-shadow: 0 8px 32px 0 rgba(234,183,177,0.15);
            }
            .promo-banner {
                background: linear-gradient(90deg, var(--accent) 60%, #fff 100%);
                color: var(--primary);
                border-radius: 16px;
                padding: 1.2rem 2.5rem;
                margin-bottom: 2.5rem;
                font-size: 1.25rem;
                font-weight: 700;
                box-shadow: var(--shadow);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 1.2rem;
            }
            .promo-banner .btn {
                background: var(--primary);
                color: #fff;
                border-radius: 30px;
                font-weight: 700;
                padding: 0.6rem 1.7rem;
                font-size: 1.05rem;
                border: none;
                margin-left: 1.2rem;
            }
            .promo-banner .btn:hover {
                background: #fff;
                color: var(--primary);
                border: 1px solid var(--primary);
            }
            .categories-section {
                margin-bottom: 2.5rem;
            }
            .category-card {
                background: var(--card);
                border-radius: 16px;
                box-shadow: var(--shadow);
                border: 1px solid #f3eaea;
                padding: 1.5rem 1rem;
                text-align: center;
                transition: box-shadow 0.2s, transform 0.15s;
                cursor: pointer;
                margin-bottom: 1.5rem;
                min-height: 220px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            .category-card:hover {
                box-shadow: 0 8px 32px 0 rgba(234,183,177,0.10);
                transform: translateY(-4px) scale(1.03);
            }
            .category-img {
                width: 70px;
                height: 70px;
                object-fit: cover;
                border-radius: 50%;
                margin-bottom: 1rem;
                border: 2px solid var(--accent);
            }
            .category-title {
                font-weight: 700;
                color: var(--primary);
                font-size: 1.13rem;
                margin-bottom: 0.2rem;
            }
            .category-desc {
                color: var(--muted);
                font-size: 0.97rem;
                margin-bottom: 0.7rem;
            }
            .subcategory-list {
                margin-top: 0.5rem;
                color: var(--muted);
                font-size: 0.97rem;
                display: flex;
                flex-wrap: wrap;
                gap: 0.7rem;
                justify-content: center;
            }
            .subcategory-list span {
                background: #fbeeee;
                color: var(--primary);
                border-radius: 12px;
                padding: 0.2rem 0.8rem;
                font-weight: 500;
                font-size: 0.97rem;
            }
            .shop-look-section {
                margin-bottom: 2.5rem;
            }
            .shop-look-scroll {
                display: flex;
                gap: 1.5rem;
                overflow-x: auto;
                padding-bottom: 0.5rem;
                scrollbar-width: thin;
            }
            .look-card {
                min-width: 220px;
                background: var(--card);
                border-radius: 16px;
                box-shadow: var(--shadow);
                border: 1px solid #f3eaea;
                padding: 1rem 1rem 1.2rem 1rem;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                transition: box-shadow 0.2s, transform 0.15s;
            }
            .look-card:hover {
                box-shadow: 0 8px 32px 0 rgba(234,183,177,0.10);
                transform: translateY(-2px) scale(1.02);
            }
            .look-img {
                width: 120px;
                height: 120px;
                object-fit: cover;
                border-radius: 12px;
                margin-bottom: 1rem;
            }
            .look-title {
                font-weight: 700;
                color: var(--primary);
                font-size: 1.08rem;
                margin-bottom: 0.4rem;
            }
            .look-btn {
                background: var(--accent);
                color: #fff;
                border-radius: 30px;
                font-weight: 600;
                padding: 0.4rem 1.2rem;
                font-size: 1rem;
                border: none;
                margin-top: 0.5rem;
                transition: background 0.15s;
            }
            .look-btn:hover {
                background: var(--primary);
                color: #fff;
            }
            .products-section {
                margin-bottom: 2.5rem;
            }
            .product-card {
                background: var(--card);
                border-radius: 16px;
                box-shadow: var(--shadow);
                border: 1px solid #f3eaea;
                padding: 1.2rem;
                margin-bottom: 2rem;
                transition: box-shadow 0.2s, transform 0.15s;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
            }
            .product-card:hover {
                box-shadow: 0 8px 32px 0 rgba(234,183,177,0.10);
                transform: translateY(-2px) scale(1.02);
            }
            .product-img {
                width: 100%;
                height: 220px;
                object-fit: cover;
                border-radius: 12px;
                margin-bottom: 1rem;
            }
            .product-title {
                font-size: 1.13rem;
                font-weight: 700;
                color: var(--primary);
                margin-bottom: 0.3rem;
                text-align: center;
            }
            .product-price {
                color: var(--accent);
                font-size: 1.08rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
            }
            .product-desc {
                color: var(--muted);
                font-size: 0.97rem;
                margin-bottom: 0.7rem;
                text-align: center;
            }
            .btn-primary {
                background: var(--accent);
                border: none;
                border-radius: 30px;
                font-weight: 700;
                padding: 0.6rem 1.7rem;
                font-size: 1.05rem;
                transition: background 0.15s;
            }
            .btn-primary:hover {
                background: var(--primary);
                color: #fff;
            }
            .favorites-section {
                margin-bottom: 2.5rem;
            }
            .newsletter-section {
                background: #fbeeee;
                border-radius: 16px;
                padding: 2rem 2.5rem;
                text-align: center;
                margin: 2.5rem 0;
                box-shadow: var(--shadow);
            }
            .newsletter-section input[type="email"] {
                border-radius: 30px;
                border: 1px solid var(--accent);
                padding: 0.7rem 1.2rem;
                margin-right: 0.5rem;
                width: 260px;
                max-width: 90%;
                outline: none;
                font-size: 1.05rem;
            }
            .newsletter-section .btn {
                border-radius: 30px;
                background: var(--accent);
                color: #fff;
                font-weight: 700;
                padding: 0.7rem 2.2rem;
                font-size: 1.1rem;
                border: none;
            }
            .newsletter-section .btn:hover {
                background: var(--primary);
                color: #fff;
            }
            .brands-bar {
                background: var(--card);
                border-radius: 16px;
                box-shadow: var(--shadow);
                border: 1px solid #f3eaea;
                padding: 1.2rem 1.5rem;
                margin: 2rem 0 2.5rem 0;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 2.5rem;
                flex-wrap: wrap;
            }
            .brand-logo {
                width: 90px;
                height: 38px;
                object-fit: contain;
                filter: grayscale(1) contrast(0.7);
                opacity: 0.8;
            }
            .benefits-bar {
                background: var(--card);
                border-radius: 16px;
                box-shadow: var(--shadow);
                border: 1px solid #f3eaea;
                padding: 1.2rem 1.5rem;
                margin: 2rem 0 2.5rem 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 2rem;
                flex-wrap: wrap;
            }
            .benefit {
                display: flex;
                align-items: center;
                gap: 0.7rem;
                font-size: 1.05rem;
                color: var(--primary);
                font-weight: 600;
            }
            .benefit i { color: var(--accent); font-size: 1.3rem; }
            .footer {
                background: #fff;
                border-top: 1px solid #f3eaea;
                padding: 2.5rem 0 1.2rem 0;
                color: var(--muted);
                font-size: 1rem;
                margin-top: 2rem;
            }
            .footer h5 {
                color: var(--primary);
                font-weight: 700;
                margin-bottom: 1rem;
            }
            .footer a { color: var(--accent); text-decoration: none; margin-right: 0.7rem; }
            .footer a:hover { text-decoration: underline; }
            @media (max-width: 991px) {
                .hero-content { padding: 2rem 1rem; }
                .benefits-bar, .brands-bar { flex-direction: column; gap: 1rem; }
                .shop-look-scroll { gap: 0.7rem; }
            }

        </style>
    </head>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
