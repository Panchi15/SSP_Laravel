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
        <h2 class="text-center mb-4">Assign Deliverer</h2>

        <form action="{{ route('deliverers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="order_id" class="form-label">Select Order</label>
                <select name="order_id" class="form-control" id="order_id" required>
                    @foreach($unassignedOrders as $order)
                        <option value="{{ $order->id }}">Order #{{ $order->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="deliverer_name" class="form-label">Deliverer Name</label>
                <input type="text" name="deliverer_name" class="form-control" id="deliverer_name" required>
            </div>
            <div class="mb-3">
                <label for="delivery_status" class="form-label">Delivery Status</label>
                <select name="delivery_status" class="form-control" id="delivery_status" required>
                    <option value="Pending">Pending</option>
                    <option value="In Transit">In Transit</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Canceled">Canceled</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="delivery_note" class="form-label">Delivery Note</label>
                <textarea name="delivery_note" class="form-control" id="delivery_note"></textarea>
            </div>
            <button type="submit" class="btn btn-custom">Assign</button>
        </form>
    </div>
@endsection
