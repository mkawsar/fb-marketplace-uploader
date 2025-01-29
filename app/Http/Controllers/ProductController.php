<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products.
     *
     * @return JsonResponse
    */

    public function index(): JsonResponse
    {
        return response()->json(Product::all());
    }

    
    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
    */
    public function store(Request $request): JsonResponse
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    
    /**
     * Display the specified product.
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
    */
    public function show(string $id): JsonResponse
    {
        return response()->json(Product::findOrFail($id));
    }
}
