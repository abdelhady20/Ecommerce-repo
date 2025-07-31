@extends('website.layouts.app')

@section('title', 'My Account')

@section('content')
    <div class="container my-5">
        <h2>My Account</h2>

        {{-- Account Info --}}
        <div class="card p-4 mb-4">
            <h5>Account Information</h5>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        {{-- Addresses --}}
        <div class="card p-4 mb-4">
            <h5>My Addresses</h5>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($user->addresses->count() > 0)
                @foreach($user->addresses as $address)
                    <div class="border p-3 mb-2">
                        <p>{{ $address->street }}, {{ $address->city }}, {{ $address->country }}</p>
                        <p><strong>Phone:</strong> {{ $address->phone }}</p>

                        @if($address->is_default)
                            <span class="badge bg-success">Default</span>
                        @else
                            <form action="{{ route('account.address.default', $address->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Set as Default</button>
                            </form>
                        @endif

                        <form action="{{ route('account.address.delete', $address->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                @endforeach

            @else
                <p>No addresses found.</p>
            @endif
        </div>

        {{-- Change Password --}}
        <div class="card p-4">
            <h5>Change Password</h5>
            @if(session('password_success'))
                <div class="alert alert-success">{{ session('password_success') }}</div>
            @endif
            <form action="{{ route('account.password.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control" required>
                    @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control" required>
                    @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
