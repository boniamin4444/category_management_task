<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();
        return view('pages.category', compact('categories'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::create($request->only('category_name'));

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $category->id . '|max:255',
        ]);

       
        $category->update($request->only('category_name'));

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
