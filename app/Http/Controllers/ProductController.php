<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        $categories = Category::all();
        return view('pages.product', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',  // Ensure each category exists
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create product
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        // Attach categories to product
        $product->categories()->attach($request->categories);

        return back()->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // app/Http/Controllers/ProductController.php

public function welcome()
{
    // প্রোডাক্ট এবং তাদের সম্পর্কিত ক্যাটাগরি নিয়ে আসা
    $products = Product::with('categories')->get();
    return view('welcome', compact('products'));
}


    public function update(Request $request, Product $product)
    {
        // Validate input
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'categories' => 'required|array',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        // Update product details
        $product->update($request->only('name', 'price'));

        // Sync categories
        $product->categories()->sync($request->categories);

        return back()->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted successfully!');
    }
}
