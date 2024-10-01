@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/dashboard">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ url('/categories') }}">Categories</a>
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
                        <a class="nav-link active" href="{{ url('/deliverers') }}">Deliverers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/customizations') }}">Customizations</a>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h2 class="text-center mb-4">Update Delivery Status</h2>

        <form action="{{ route('deliverers.update', $deliverer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="delivery_status" class="form-label">Delivery Status</label>
                <select name="delivery_status" class="form-control" id="delivery_status" required>
                    <option value="Pending" {{ $deliverer->delivery_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Transit" {{ $deliverer->delivery_status == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                    <option value="Delivered" {{ $deliverer->delivery_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="Canceled" {{ $deliverer->delivery_status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="delivery_note" class="form-label">Delivery Note</label>
                <textarea name="delivery_note" class="form-control" id="delivery_note">{{ $deliverer->delivery_note }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
