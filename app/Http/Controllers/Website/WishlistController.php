<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\WishlistRequests\StoreWishlistRequest;
use App\Models\Product;
use App\Repositories\WishlistRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class WishlistController extends Controller
{
    protected WishlistRepositoryInterface $wishlistRepo;

    public function __construct(WishlistRepositoryInterface $wishlistRepo)
    {
        $this->wishlistRepo = $wishlistRepo;
    }

    public function index()
    {

        $userId = 1;


        $productSlugs = $this->wishlistRepo->all($userId);


        $products = Product::whereIn('slug', $productSlugs)->get();

        return view('website.wishlist.wishlist', ['wishlists' => $products]);
    }

    public function store(StoreWishlistRequest $request): RedirectResponse
    {
        $userId = 1;

        if ($this->wishlistRepo->has($userId, $request->product_slug)) {
            return redirect()->route('wishlist.index')->with('error', 'This product is already in your wishlist.');
        }
        $this->wishlistRepo->add($userId, $request->product_slug);

        return redirect()->route('wishlist.index')->with('success', 'Product added to wishlist.');
    }

    public function destroy($productSlug): RedirectResponse
    {
        $userId = 1;


        $this->wishlistRepo->remove($userId, $productSlug);

        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}
