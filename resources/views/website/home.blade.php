@extends('website.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="page-content pb-5">
        <div class="container">
            <div class="row">

                <!-- Sidebar -->
                <aside class="col-lg-3 mb-4">
                    <div class="sidebar">
                        <div class="category-title">Categories</div>
                        <nav class="nav flex-column">

                            <!-- All -->
                            <a class="nav-link {{ request('category') || request('subcategory') ? '' : 'active' }}"
                               href="{{ route('shop.index', request()->except(['category','subcategory','page'])) }}">
                                All
                            </a>

                            @foreach($categories as $category)
                                <a class="nav-link {{ request('category') == $category->slug && !request('subcategory') ? 'active' : '' }}"
                                   href="{{ route('shop.index', array_merge(request()->except(['page']), ['category' => $category->slug, 'subcategory' => null])) }}">
                                    {{ $category->name }}
                                </a>

                                @if($category->children->count())
                                    <div class="subcategory-list ms-3">
                                        @foreach($category->children as $subcategory)
                                            <a class="subcategory-link {{ request('subcategory') == $subcategory->slug ? 'active' : '' }}"
                                               href="{{ route('shop.index', array_merge(request()->except(['page']), [
                                                'category' => $category->slug,
                                                'subcategory' => $subcategory->slug
                                           ])) }}">
                                                {{ $subcategory->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach

                        </nav>
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="col-lg-9">
                    <!-- Search Bar -->
                    <form class="search-bar mb-4 d-flex align-items-center" action="{{ route('shop.index') }}" method="GET" role="search"
                          onsubmit="this.querySelectorAll('[name=page]').forEach(el=>el.remove());">
                        <i class="fa fa-search me-2"></i>
                        <input type="text" class="form-control" name="search" placeholder="Search for fashion, brands, or categories..." value="{{ request('search') }}">
                    </form>

                    <!-- Product Grid -->
                    <div class="row g-4">
                        @foreach($products as $product)
                            <div class="col-md-6 col-lg-4">
                                <div class="product-card h-100 d-flex flex-column shadow-sm rounded-3 p-3">
                                    <img src="{{ asset('uploads/' . $product->main_image) }}" alt="{{ $product->name }}" class="product-img mb-3 rounded">
                                    <div class="product-title fw-bold">{{ $product->name }}</div>
                                    <div class="product-price text-primary fw-bold">${{ number_format($product->price, 2) }}</div>
                                    <div class="product-desc text-muted small mb-3">{{ Str::limit($product->description, 60) }}</div>
                                    <a href="{{ route('product.details', $product->slug) }}" class="btn btn-primary mt-auto">View Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>

                    <!-- Benefits Bar -->
                    <div class="benefits-bar mt-4 d-flex justify-content-between flex-wrap text-center py-3 bg-light rounded">
                        <div class="benefit flex-fill"><i class="fa fa-shipping-fast"></i> Free Shipping</div>
                        <div class="benefit flex-fill"><i class="fa fa-undo"></i> Easy Returns</div>
                        <div class="benefit flex-fill"><i class="fa fa-lock"></i> Secure Checkout</div>
                        <div class="benefit flex-fill"><i class="fa fa-headset"></i> 24/7 Support</div>
                    </div>
                </main>
            </div>
        </div>
    </div>


    <style>
        .sidebar {
            background: var(--card);
            border-radius: 16px;
            box-shadow: var(--shadow);
            border: 1px solid #f3eaea;
            padding: 2rem 1.2rem 1.2rem 1.2rem;
            min-width: 220px;
            max-width: 260px;
            margin-bottom: 2rem;
        }
        .sidebar .category-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.2rem;
            font-size: 1.1rem;
            letter-spacing: 0.04em;
        }
        .sidebar .nav-link {
            color: var(--text);
            font-weight: 500;
            padding: 0.4rem 0.7rem;
            border-radius: 6px;
            margin-bottom: 0.2rem;
            transition: background 0.15s, color 0.15s;
            font-size: 1rem;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #fbeeee;
            color: var(--accent);
        }
        .sidebar .subcategory-list {
            margin-left: 1.2rem;
            margin-bottom: 0.7rem;
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }
        .sidebar .subcategory-link {
            color: var(--muted);
            font-size: 0.97rem;
            padding: 0.2rem 0.7rem;
            border-radius: 8px;
            transition: background 0.15s, color 0.15s;
            cursor: pointer;
            text-decoration: none;
            margin-left: 0.5rem;
        }
        .sidebar .subcategory-link:hover, .sidebar .subcategory-link.active {
            background: #fbeeee;
            color: var(--accent);
        }

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
        .main-content {
            margin-top: 2.5rem;
            margin-bottom: 2.5rem;
        }
        .sidebar {
            background: var(--card);
            border-radius: 16px;
            box-shadow: var(--shadow);
            border: 1px solid #f3eaea;
            padding: 1.5rem 1rem;
            min-width: 220px;
            max-width: 260px;
        }

        .sidebar .category-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.2rem;
            font-size: 1.1rem;
            letter-spacing: 0.04em;
        }

        .shop-now-btn {
            color: var(--accent) !important;
            border: 2px solid var(--accent) !important;
            background: rgba(255, 255, 255, 0.8) !important;
            font-weight: 600;
            padding: 0.4rem 1.4rem;
            font-size: 0.95rem;
            transition: all 0.2s ease-in-out;
            text-shadow: 0px 1px 3px rgba(0,0,0,0.3);
        }

        .shop-now-btn:hover {
            background: var(--accent) !important;
            color: #fff !important;
            text-shadow: none;
        }

        .search-bar {
            background: var(--card);
            border-radius: 30px;
            box-shadow: 0 2px 8px 0 rgba(24,24,24,0.04);
            border: 1px solid #f3eaea;
            padding: 0.5rem 1.2rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }
        .search-bar input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
            font-size: 1.05rem;
        }
        .search-bar i {
            color: var(--accent);
            font-size: 1.2rem;
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
            .main-content { flex-direction: column; }
            .sidebar { max-width: 100%; min-width: 100%; margin-bottom: 2rem; }
            .benefits-bar { flex-direction: column; gap: 1rem; }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection


