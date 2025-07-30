@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header d-flex justify-content-between align-items-center px-3">
            <h1 class="m-0">Products</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
        </div>

        <div class="content px-3">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow rounded-3 border-0">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $index => $product)
                            <tr class="text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? '-' }}</td>
                                <td>{{ $product->brand->name ?? '-' }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No products found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
