<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\FacebookMarketplaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $fbService;
    protected $client;
    protected $accessToken;
    protected $pageId;

    public function __construct(FacebookMarketplaceService $fbService)
    {
        $this->fbService = $fbService;
    }

    /**
     * Display a listing of all products.
     *
     * @return JsonResponse
    */

    public function index(): JsonResponse
    {
        return response()->json(Product::query()->first());
    }

    public function store(Request $request)
    {
        $productData = Product::query()->find($request->id);

        $response = $this->fbService->listProduct($productData);

        return response()->json($response);
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
