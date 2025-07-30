<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm mb-5" style="background: #fff; padding: 0.6rem 0;">
    <div class="container align-items-center">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('main-home') }}">
            <i class="fa-solid fa-shirt" style="color: var(--accent); font-size: 1.5rem;"></i>
            <span>WearC</span>
        </a>

        {{-- Search Form --}}
        <form action="{{ route('shop.index') }}" method="GET"
              class="d-none d-lg-flex mx-4 flex-grow-1 align-items-center"
              style="max-width: 500px;">
            <div class="input-group" style="height: 40px;">
                <span class="input-group-text bg-light border-0"
                      style="border-radius: 50px 0 0 50px; padding: 0 12px; height: 100%;">
                    <i class="fa fa-search text-muted" style="font-size: 0.9rem;"></i>
                </span>
                <input
                    class="form-control border-0"
                    style="border-radius: 0 50px 50px 0; font-size: 0.95rem; height: 100%;"
                    type="search"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search for fashion, brands, or categories..."
                    aria-label="Search">
            </div>
        </form>

        {{-- Icons --}}
        <div class="navbar-icons ms-auto d-flex align-items-center" style="gap: 1.8rem;">

            {{-- Cart --}}
            <a href="{{ route('cart.index') }}" class="position-relative">
                <i class="fa fa-shopping-cart fs-5"></i>
                @if($cartCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>

            {{-- Wishlist --}}
            <a href="{{ route('wishlist.index') }}" class="position-relative">
                <i class="fa fa-heart fs-5"></i>
                @if($wishlistCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $wishlistCount }}
                    </span>
                @endif
            </a>

            {{-- User --}}
            @php
                use App\Models\User;
                $currentUser = null;
                if(session()->has('user_id')) {
                    $currentUser = User::find(session('user_id'));
                }
            @endphp

            @if($currentUser)
                {{-- Logged in user dropdown --}}
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                        <i class="fa fa-user fs-5"></i>
                        <span>{{ $currentUser->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li><a class="dropdown-item" href="#">Account</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button class="dropdown-item" type="submit">Log out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                {{-- Guest user --}}
                <a href="{{ route('login.form') }}" class="d-flex align-items-center gap-1">
                    <i class="fa fa-user fs-5"></i>
                    <span>Log in</span>
                </a>
            @endif

        </div>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('main-home') ? 'active' : '' }}" href="{{ route('main-home') }}">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('website.home') }}">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('wishlist.index') }}">Wishlist</a></li>
            </ul>
        </div>

    </div>
</nav>
