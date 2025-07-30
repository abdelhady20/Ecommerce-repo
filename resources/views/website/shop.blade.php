@extends('website.layouts.app')

@section('title', 'Shop')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Shop All Products</h1>

        {{-- Trending Section --}}
        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title">Trending</h2><!-- End .title -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel" aria-labelledby="trending-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-1-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Denim jacket</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $19.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-thumbs">
                                    <a href="#" class="active">
                                        <img src="assets/images/demos/demo-6/products/product-1-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-1-2-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-1-3-thumb.jpg" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-2-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-2-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Shoes</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Sandals</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $24.99
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">sale</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-3-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Printed sweatshirt</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Now $7.99</span>
                                    <span class="old-price">Was $12.99</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-4-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-4-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Linen-blend paper bag trousers</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $17.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-thumbs">
                                    <a href="#" class="active">
                                        <img src="assets/images/demos/demo-6/products/product-4-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-4-2-thumb.jpg" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-1-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Denim jacket</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $19.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-thumbs">
                                    <a href="#" class="active">
                                        <img src="assets/images/demos/demo-6/products/product-1-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-1-2-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-1-3-thumb.jpg" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="trending-women-tab" role="tabpanel" aria-labelledby="trending-women-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":0
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">sale</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-3-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Printed sweatshirt</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Now $7.99</span>
                                    <span class="old-price">Was $12.99</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-4-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-4-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Linen-blend paper bag trousers</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $17.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-thumbs">
                                    <a href="#" class="active">
                                        <img src="assets/images/demos/demo-6/products/product-4-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-4-2-thumb.jpg" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-1-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-1-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Denim jacket</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $19.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-thumbs">
                                    <a href="#" class="active">
                                        <img src="assets/images/demos/demo-6/products/product-1-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-1-2-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-1-3-thumb.jpg" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->

                <div class="tab-pane p-0 fade" id="trending-men-tab" role="tabpanel" aria-labelledby="trending-men-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":0
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">sale</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-3-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Printed sweatshirt</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Now $7.99</span>
                                    <span class="old-price">Was $12.99</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        {{-- New Arrivals Section --}}
        <div class="container">
            <h2 class="title text-center mb-4">New Arrivals</h2><!-- End .title text-center -->

            <div class="products">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">Sale</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-5-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-5-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Tie-detail top</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Now $3.99</span>
                                    <span class="old-price">Was $6.99</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-6-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-6-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Shoes</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Sandals</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $12.99
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-7-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-7-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Bags</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Small bucket bag</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $14.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-thumbs">
                                    <a href="#" class="active">
                                        <img src="assets/images/demos/demo-6/products/product-7-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-7-2-thumb.jpg" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-8-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-8-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Denim jacket</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $34.99
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-9-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-9-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">BShort wrap dress</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $17.99
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-10-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-10-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Biker jacket</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $34.99
                                </div><!-- End .product-price -->

                                <div class="product-nav product-nav-thumbs">
                                    <a href="#" class="active">
                                        <img src="assets/images/demos/demo-6/products/product-10-thumb.jpg" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="assets/images/demos/demo-6/products/product-10-2-thumb.jpg" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-11-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-11-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Shoes</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Loafers</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $9.99
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <span class="product-label label-sale">sale</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-6/products/product-12-1.jpg" alt="Product image" class="product-image">
                                    <img src="assets/images/demos/demo-6/products/product-12-2.jpg" alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Clothing</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Super Skinny High Jeggings</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Now $12.99</span>
                                    <span class="old-price">Was $17.99</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .products -->

            <div class="more-container text-center mt-2">
                <a href="#" class="btn btn-outline-dark-2 btn-more"><span>show more</span></a>
            </div><!-- End .more-container -->
        </div><!-- End .container -->
    </div>
@endsection
