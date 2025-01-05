@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Welcome to Our Product Store</h1>
    
    <div class="row d-flex align-items-stretch">
        @foreach($products as $product)
            <div class="col-md-4 col-lg-3 mb-4 d-flex">
                <div class="card shadow-lg border-0 rounded overflow-hidden">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title text-dark">Name: {{ $product->name }}</h5>
                        <p class="card-text text-primary">Price: {{ $product->price }} Tk</p>
                        
                        <p class="card-text mt-auto">
                            <strong>Categories:</strong>
                            <span class="text-success"> {{ $product->categories->pluck('category_name')->join(', ') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }} <!-- Ensure Bootstrap-5 Style -->
    </div>
</div>
@endsection


<style>
    
    .card {
        display: flex;
        flex-direction: column; 
        justify-content: space-between; 
        height: 100%; 
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
        will-change: transform; /* Performance optimization */
    }

    .card:hover {
        transform: scale(1.1) translateY(-10px);
        box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2); 
    }

    .card-img-top {
        height: 200px; 
        width: 100%; 
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

    /* For ellipsis in text */
    .card-title, .card-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

