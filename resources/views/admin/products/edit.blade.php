@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header d-flex justify-content-between align-items-center px-3">
            <h1 class="m-0">Edit Product</h1>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <div class="content px-3">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="card p-3">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input name="name" class="form-control" value="{{ old('name', $product->name) }}" required />
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select name="brand_id" class="form-control">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required />
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required />
                    </div>

                    <div class="form-group">
                        <label>Image</label><br>
                        @if ($product->main_image)
                            <img src="{{ asset('uploads/' . $product->main_image) }}" width="100" class="mb-2">
                        @endif
                        <input type="file" name="main_image" class="form-control-file" />
                    </div>


                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
