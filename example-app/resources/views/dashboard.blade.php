@extends('layouts.app')

@section('content')
    <!-- Modern Navigation Bar -->
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

    <!-- Dashboard Content -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Admin Dashboard</h2>

        <div class="row g-4">
            <!-- Product Category Management -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-box-seam fs-1 mb-3 text-primary"></i>
                        <h5 class="card-title">Product Category Management</h5>
                        <a href="{{ url('/categories') }}" class="btn btn-custom mt-3">Manage Categories</a>
                    </div>
                </div>
            </div>

            <!-- Product Management -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-cart-plus fs-1 mb-3 text-primary"></i>
                        <h5 class="card-title">Product Management</h5>
                        <a href="{{ url('/products') }}" class="btn btn-custom mt-3">Manage Products</a>
                    </div>
                </div>
            </div>

            <!-- User Management -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-people fs-1 mb-3 text-primary"></i>
                        <h5 class="card-title">User Management</h5>
                        <a href="{{ url('/users') }}" class="btn btn-custom mt-3">Manage Users</a>
                    </div>
                </div>
            </div>

            <!-- Order Management -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-receipt fs-1 mb-3 text-primary"></i>
                        <h5 class="card-title">Order Management</h5>
                        <a href="{{ url('/orders') }}" class="btn btn-custom mt-3">Manage Orders</a>
                    </div>
                </div>
            </div>

            <!-- Deliverers Management -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-truck fs-1 mb-3 text-primary"></i>
                        <h5 class="card-title">Deliverers Management</h5>
                        <a href="{{ url('/deliverers') }}" class="btn btn-custom mt-3">Manage Deliverers</a>
                    </div>
                </div>
            </div>

            <!-- Customizations Management -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-sliders fs-1 mb-3 text-primary"></i>
                        <h5 class="card-title">Customizations Management</h5>
                        <a href="{{ url('/customizations') }}" class="btn btn-custom mt-3">Manage Customizations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
