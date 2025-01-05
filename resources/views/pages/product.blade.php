@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Create Product Modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Add Product</button>

    <!-- Product List -->
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">৳{{ $product->price }}</p>
                        <p class="card-text">
                            <strong>Categories:</strong>
                            {{ $product->categories->pluck('category_name')->join(', ') }}
                        </p>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="mb-3">
                            <label for="categories" class="form-label">Categories</label>
                            <select id="categorySelect" class="form-control" multiple name="categories[]">
                                <option value="" disabled selected>Select Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if(in_array($category->id, old('categories', []))) selected @endif>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle form submission via AJAX
        $('#productForm').on('submit', function(e) {
            e.preventDefault();  // Prevent the default form submission

            var formData = new FormData(this);  // Create a FormData object

            $.ajax({
                url: $(this).attr('action'),  // Get the form action URL
                type: 'POST',  // Method of request
                data: formData,  // Send the form data
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Don't set content type (important for file upload)
                success: function(response) {
                    // Handle success response
                    if (response.success) {
                        $('#createModal').modal('hide');  // Close the modal
                        alert(response.message);  // Show success message
                    } else {
                        alert(response.message);  // Show error message if validation fails
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('Something went wrong. Please try again.');
                }
            });
        });
    });
</script>
@endsection
