<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct()
    {
        $products = [
            ["name" => "Phone"],
            ["name" => "Car"],
            ["name" => "Wash Machine"],
            ["name" => "Apple"],
            ["name" => "Cattle"],
            ["name" => "Laptop"],
            ["name" => "Television"],
            ["name" => "Tablet"],
        ];

        Product::insert($products);
        return "Product has been inserted";        
    }

    public function showSearchProduct()
    {
        return view('search');
    }

    public function autocomplete(Request $request)
    {
        $data = Product::select("name")
                    ->where("name", "LIKE", "%{$request->terms}%")
                    ->get();
        return response()->json($data);
    }
}
