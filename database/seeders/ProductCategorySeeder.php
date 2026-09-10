<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'category_name' => 'Smartphone',
            'category_description' => 'Smartphones and mobile phones',
            'category_image' => 'product-categories/smartphone.webp',
            'subcategory' => 0,
        ]);

        ProductCategory::create([
            'category_name' => 'Laptop',
            'category_description' => 'Laptops and notebooks',
            'category_image' => 'product-categories/laptop.webp',
            'subcategory' => 0,
        ]);

        ProductCategory::create([
            'category_name' => 'Tablet',
            'category_description' => 'Tablets and accessories',
            'category_image' => 'product-categories/tablet.webp',
            'subcategory' => 0,
        ]);

        ProductCategory::create([
            'category_name' => 'Headphones',
            'category_description' => 'Headphones and audio devices',
            'category_image' => 'product-categories/headphones.webp',
            'subcategory' => 0,
        ]);
    }
}
