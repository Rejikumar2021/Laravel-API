<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ValidateImageRequest;
use App\Http\Resources\productResources;
use App\Models\Product;
use App\Models\productGallery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(CreateProductRequest $request)
    {
        $data = $request->validated();
        Product::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully.',
            'data' => $data,
        ], 201);
    }

    public function createProductGallery(ValidateImageRequest $request)
    {
        $id = $request->route('id');
        $data = product::findOrFail($id);
        foreach ($request->file('images', []) as $index => $image) {
            $path = $image->store('product-galleries', 'public');
            productGallery::create([
                'product_id' => $id,
                'image' => $path
            ]);
        }
    }

    public function getAllProducts(Request $request)
    {
        $products = product::with('galleries')->latest()->get();
        return response()->json([
            'success' => true,
            'products' => productResources::collection($products)
        ], 200);
    }
}
