@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h1 class="m-0">Edit Category</h1>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Parent Category</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">— None —</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}" {{ (old('parent_id', $category->parent_id) == $parent->id) ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
