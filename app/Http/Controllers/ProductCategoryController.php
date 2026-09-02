<?php

namespace App\Http\Controllers;

use App\Http\Requests\createCategory;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function createCategory(createCategory $request)
    {
        $data = $request->validated();
        $data['category_image'] = $request
            ->file('category_image')
            ->store('product-categories', 'public');
        $category = ProductCategory::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Product category created successfully.',
            'data' => $category,
        ], 201);
    }

    public function getAllCategories()
    {
        $categories = ProductCategory::latest()->get();
        return ProductCategoryResource::collection(($categories));
    }

    public function getCategoryItem(Request $request)
    {
        $id = $request->route('id');
        $item = ProductCategory::find($id);
        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid request'
            ], 404);
        }
        return new ProductCategoryResource($item);
    }
}
