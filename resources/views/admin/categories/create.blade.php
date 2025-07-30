@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h1 class="m-0">Add New Category</h1>
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

                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Make this a subcategory of (optional)</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">— This is a main category —</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                            👉 {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
