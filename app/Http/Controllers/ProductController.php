<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view("products.index", ["products" => $products]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function create()
    {
        return view("products.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "quantity" => "required|numeric",
            "price" => "required|decimal:2",
            "description" => "nullable",
            "category" => "nullable",
        ]);

        $nameProduct = Product::create($data);

        return redirect(route("product.index"));
    }

    public function edit(Product $product)
    {
        return view("products.edit", ["product" => $product]);
    }
    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "quantity" => "required|numeric",
            "price" => "required|decimal:2",
            "description" => "nullable",
            "category" => "nullable",
        ]);

        $product->update($data);

        return redirect(route("product.index"))->with("success", "Product Update");
    }

    public function delete(Product $product, Request $request)
    {


        $product->delete();

        return redirect(route("product.index"))->with("success", "Product Deleted");
    }

}

