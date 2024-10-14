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
        <h2 class="text-center mb-4">Manage Customizations</h2>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>User ID</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customizations as $customization)
                <tr>
                    <td>{{ $customization->title }}</td>
                    <td>{{ $customization->description }}</td>
                    <td>
                        @if($customization->image)
                            <img src="{{ asset($customization->image) }}" alt="{{ $customization->title }}" width="80" height="80">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $customization->quantity }}</td>
                    <td>{{ $customization->status }}</td>
                    <td>{{ $customization->unit_price }}</td>
                    <td>{{ $customization->total_price }}</td>
                    <td>{{ $customization->user_id  }}</td>
                    <td>{{ $customization->latitude  }}</td>
                    <td>{{ $customization->longitude  }}</td>
                    <td>{{ $customization->address }}</td>
                    <td>
                        <a href="{{ route('customizations.edit', $customization->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
