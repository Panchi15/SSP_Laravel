@extends('layouts.app')

@section('content')
    <!-- Modern Navigation Bar -->
    <style>
        .navbar-custom {
            background: linear-gradient(90deg, #2A8891, #48C2CC, #A8E7EB);
        }

        /* Reusable button style */
        .btn-custom {
            background: linear-gradient(90deg, #2A8891, #2A8891, #2A8891);
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #A8E7EB, #A8E7EB, #A8E7EB);
            color: #2A8891;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/dashboard">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/users') }}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/orders') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/deliverers') }}">Deliverers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/customizations') }}">Customizations</a>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-custom" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h2 class="text-center mb-4">Edit User</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="user_type" class="form-label">User Type</label>
                <select name="user_type" class="form-control" id="user_type" required>
                    <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="customer" {{ $user->user_type == 'customer' ? 'selected' : '' }}>Customer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-custom">Update</button>
        </form>
    </div>
@endsection
