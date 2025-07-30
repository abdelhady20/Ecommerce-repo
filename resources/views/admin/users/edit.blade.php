@extends('admin.layouts.app')

@section('content')
    <h4 class="mb-3">Edit User</h4>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $user->phone) }}" required>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="customer" {{ old('role', $user->role) === 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Password <small>(Leave blank to keep old)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>


                <div class="form-group">
                    <label>Status</label><br>
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1"
                        {{ old('is_active', $user->is_active) ? 'checked' : '' }}> Active
                </div>


                <button class="btn btn-success">Update</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
@endsection
