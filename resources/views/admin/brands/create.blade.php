@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h1 class="m-0">Add New Brand</h1>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Back</a>
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

                <form action="{{ route('admin.brands.store') }}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
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
