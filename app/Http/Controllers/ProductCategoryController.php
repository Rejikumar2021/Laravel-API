<?php

namespace App\Http\Controllers;

use App\Http\Requests\createCategory;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function updateCategory(UpdateCategoryRequest $request)
    {
        $id = $request->route('id');
        $data = $request->validated();
        $category = ProductCategory::findOrFail($id);
        if ($request->hasFile('category_image')) {
            if ($category->category_image) {
                Storage::disk('public')->delete($category->category_image);
            }

            $data['category_image'] = $request
                ->file('category_image')
                ->store('product-categories', 'public');
        }

        $category->update($data);
        if (!$category->update($data)) {
            return response()->json([
                'success' => false,
                'message' => 'Product category update failed.',
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Product category updated successfully.',
            'data' => $category,
        ], 200);
    }

    public function deleteCategory(Request $request)
    {
        $id = $request->route('id');
        $category = ProductCategory::findOrFail($id);
        if ($category->category_image) {
            Storage::disk('public')->delete($category->category_image);
        }
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product category deleted successfully.',
        ], 200);
    }
}
