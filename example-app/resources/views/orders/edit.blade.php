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
        <h2 class="text-center mb-4">Edit Order</h2>

        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="order_status" class="form-label">Order Status</label>
                <select name="order_status" class="form-control" id="order_status" required>
                    <option value="Order Placed" {{ $order->order_status == 'Order Placed' ? 'selected' : '' }}>Order Placed</option>
                    <option value="Processing" {{ $order->order_status == 'Processing' ? 'selected' : '' }}>Processing</option>
                    <option value="Confirmed" {{ $order->order_status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="Shipped" {{ $order->order_status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="Completed" {{ $order->order_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="payment_status" class="form-label">Payment Status</label>
                <select name="payment_status" class="form-control" id="payment_status" required>
                    <option value="Pending" {{ $order->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Paid" {{ $order->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Failed" {{ $order->payment_status == 'Failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-custom">Update</button>
        </form>
    </div>
@endsection
