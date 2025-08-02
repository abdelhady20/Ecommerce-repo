@extends('admin.layouts.app')

@section('content')
    {{-- Admins Section --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Admins</h4>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New Admin</a>
    </div>

    <div class="card mb-4">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $admins = $users->where('role', 'admin');
                @endphp

                @forelse($admins as $admin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>
                            <span class="badge badge-{{ $admin->is_active ? 'success' : 'secondary' }}">
                                {{ $admin->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $admin->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.users.destroy', $admin->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No admins found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Users Section --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Users</h4>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New User</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $customers = $users->where('role', 'customer');
                @endphp

                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            <span class="badge badge-{{ $customer->is_active ? 'success' : 'secondary' }}">
                                {{ $customer->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $customer->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.users.destroy', $customer->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No users found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
