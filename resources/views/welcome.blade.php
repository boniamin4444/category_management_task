@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Welcome to Our Product Store</h1>
    
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card shadow-lg border-0 rounded overflow-hidden">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">{{ $product->name }}</h5>
                        <p class="card-text text-primary">৳{{ $product->price }}</p>
                        
                        <p class="card-text">
                            <strong>Categories:</strong>
                            <span class="text-success">{{ $product->categories->pluck('category_name')->join(', ') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        background-color: #f8f9fa;
        padding: 20px;
    }

    .card-title {
        font-size: 1.2rem;
        color: #495057;
    }

    .card-text {
        font-size: 1rem;
        color: #6c757d;
    }

    .card-text span {
        font-weight: bold;
    }

    .card:hover .card-body {
        background-color: #e9ecef;
    }
</style>
@endsection
