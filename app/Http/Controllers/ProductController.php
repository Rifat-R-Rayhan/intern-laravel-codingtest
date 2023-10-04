<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // if ($request->filled('search')) {
        //     $query->where('name', 'like', '%' . $request->input('search') . '%');
        // }

        $products = $query->get();

        return view('product.view', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name','like','%'.$search.'%')->orWhere('name','like','%'.$search.'%')->get();
        return view('product/view', compact('products'));
    }
    
}
