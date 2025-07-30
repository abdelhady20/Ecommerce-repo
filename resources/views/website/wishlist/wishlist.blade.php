@extends('website.layouts.app')

@section('title', 'My Wishlist')

@section('content')
    <div class="container wishlist-section mx-auto">
        <div class="wishlist-title">Your Wishlist</div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


    @if($wishlists->count())
            <div class="wishlist-grid">
                @foreach($wishlists as $item)
                    <div class="wishlist-card">
                        <a href="{{ route('product.details', $item->slug) }}">
                            <img src="{{ asset('uploads/' . $item->main_image) }}"
                                 class="wishlist-img"
                                 alt="{{ $item->name }}">
                        </a>

                        <div class="wishlist-title-card">{{ $item->name }}</div>
                        <div class="wishlist-price">${{ number_format($item->price, 2) }}</div>

                        <div class="wishlist-actions">
                            @if($item->stock > 0)
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="price" value="{{ $item->price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="image" value="{{ $item->main_image }}">
                                    <button type="submit" class="btn">Add to Cart</button>
                                </form>
                            @else
                                <button class="btn" disabled>Out of Stock</button>
                            @endif


                            <form action="{{ route('wishlist.destroy', $item->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="wishlist-remove" title="Remove">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-wishlist">
                <img src="{{asset('assets/images/categories/asdd.jpg')}}">
                <h4>Your wishlist is empty</h4>
                <p>Save your favorite items to your wishlist for later.</p>
                <a href="{{ route('website.home') }}" class="btn">Continue Shopping</a>
            </div>
        @endif
    </div>

    {{-- Styles --}}
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
        .wishlist-section { background: var(--card); border-radius: 16px; box-shadow: var(--shadow); border: 1px solid #f3eaea; padding: 2.5rem 2rem; margin: 2.5rem 0; }
        .wishlist-title { font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 2rem; }
        .wishlist-grid { display: flex; flex-wrap: wrap; gap: 2rem; justify-content: flex-start; }
        .wishlist-card { background: #fff; border-radius: 16px; box-shadow: var(--shadow); border: 1px solid #f3eaea; padding: 1.2rem 1.2rem 1.5rem; width: 260px; display: flex; flex-direction: column; align-items: center; transition: box-shadow 0.2s, transform 0.15s; }
        .wishlist-card:hover { box-shadow: 0 8px 32px 0 rgba(234,183,177,0.10); transform: translateY(-2px) scale(1.02); }
        .wishlist-img { width: 120px; height: 120px; object-fit: cover; border-radius: 12px; margin-bottom: 1rem; }
        .wishlist-title-card { font-size: 1.08rem; font-weight: 700; color: var(--primary); margin-bottom: 0.3rem; text-align: center; }
        .wishlist-price { color: var(--accent); font-size: 1.08rem; font-weight: 700; margin-bottom: 0.7rem; }
        .wishlist-actions { display: flex; gap: 0.7rem; margin-top: 0.5rem; }
        .wishlist-actions .btn { background: var(--accent); color: #fff; border-radius: 30px; font-weight: 600; padding: 0.4rem 1.2rem; font-size: 1rem; border: none; transition: background 0.15s; }
        .wishlist-actions .btn:hover { background: var(--primary); color: #fff; }
        .wishlist-remove { color: var(--accent); font-size: 1.2rem; cursor: pointer; border: none; background: none; transition: color 0.15s; }
        .wishlist-remove:hover { color: #c0392b; }
        .empty-wishlist { text-align: center; padding: 3rem 1rem; }
        .empty-wishlist img { width: 120px; margin-bottom: 1.5rem; opacity: 0.7; }
        .empty-wishlist h4 { color: var(--primary); font-weight: 700; margin-bottom: 1rem; }
        .empty-wishlist .btn { background: var(--accent); color: #fff; border-radius: 30px; font-weight: 700; padding: 0.7rem 2.2rem; font-size: 1.1rem; border: none; margin-top: 1rem; }
        .empty-wishlist .btn:hover { background: var(--primary); color: #fff; }
        @media (max-width: 991px) {
            .wishlist-section { padding: 1.2rem 0.7rem; }
            .wishlist-grid { gap: 1rem; justify-content: center; }
        }
    </style>
@endsection
