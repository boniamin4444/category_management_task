<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable = ['category_name'];

    public function products()
{
    return $this->ManyToMany(Product::class, 'category_product'); // Here, 'category_product' is the pivot table
}

}
