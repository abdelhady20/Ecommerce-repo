@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header d-flex justify-content-between align-items-center px-3">
            <h1 class="m-0">Add New Product</h1>
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

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card p-3">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input name="name" class="form-control" value="{{ old('name') }}" required />
                    </div>

                    <div class="form-group">
                        <label>Subcategory</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Subcategory</option>
                            @foreach($mainCategories as $main)
                                <optgroup label="📂 {{ strtoupper($main->name) }}">
                                    @foreach($main->children as $sub)
                                        <option value="{{ $sub->id }}" {{ old('category_id') == $sub->id ? 'selected' : '' }}>
                                            {{ $sub->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Brand</label>
                        <select name="brand_id" class="form-control">
                            <option value="">Select</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required />
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}" required />
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="main_image" class="form-control-file" required />
                    </div>


                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
