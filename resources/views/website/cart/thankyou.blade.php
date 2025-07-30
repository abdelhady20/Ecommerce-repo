@extends('website.layouts.app')

@section('title', 'Thank You')

@section('content')
    <div class="container text-center py-5">
        <h2 class="mb-3 text-success">🎉 Thank You for Your Purchase!</h2>
        <p>Your order has been successfully placed and paid.</p>
        <a href="{{ route('website.home') }}" class="btn btn-primary mt-4">Continue Shopping</a>
    </div>
@endsection
