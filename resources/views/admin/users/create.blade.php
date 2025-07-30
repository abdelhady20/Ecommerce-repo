@extends('admin.layouts.app')

@section('content')
    <h4 class="mb-3">Add New User</h4>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone') }}" required>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="customer" {{ old('role') === 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Status</label><br>
                    <input type="checkbox" name="is_active" value="1"
                        {{ old('is_active') ? 'checked' : '' }}> Active
                </div>

                <button class="btn btn-success">Save</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
@endsection
