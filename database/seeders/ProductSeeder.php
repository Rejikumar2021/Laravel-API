<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $smartphone = ProductCategory::where(
            'category_name',
            'Smartphone'
        )->first();

        $laptop = ProductCategory::where(
            'category_name',
            'Laptop'
        )->first();

        $tablet = ProductCategory::where(
            'category_name',
            'Tablet'
        )->first();

        $headphones = ProductCategory::where(
            'category_name',
            'Headphones'
        )->first();

        Product::create([
            'product_name' => 'iPhone 18',
            'product_description' => 'Latest Apple iPhone',
            'product_price' => 999.0,
            'product_sale_price' => 899.0,
            'product_category' => $smartphone->id,
            'product_available_quantity' => 85,
            'sale_out_of_stock' => false,
        ]);

        Product::create([
            'product_name' => 'Samsung Galaxy S26',
            'product_description' => 'Latest Samsung Galaxy smartphone',
            'product_price' => 899.0,
            'product_sale_price' => 799.0,
            'product_category' => $smartphone->id,
            'product_available_quantity' => 50,
            'sale_out_of_stock' => false,
        ]);

        Product::create([
            'product_name' => 'MacBook Pro M5',
            'product_description' => 'Apple MacBook Pro laptop',
            'product_price' => 1999.0,
            'product_sale_price' => 1799.0,
            'product_category' => $laptop->id,
            'product_available_quantity' => 25,
            'sale_out_of_stock' => false,
        ]);

        Product::create([
            'product_name' => 'Dell XPS 15',
            'product_description' => 'Premium Dell laptop',
            'product_price' => 1499.0,
            'product_sale_price' => 1299.0,
            'product_category' => $laptop->id,
            'product_available_quantity' => 20,
            'sale_out_of_stock' => false,
        ]);

        Product::create([
            'product_name' => 'iPad Pro',
            'product_description' => 'Apple iPad Pro tablet',
            'product_price' => 1099.0,
            'product_sale_price' => 999.0,
            'product_category' => $tablet->id,
            'product_available_quantity' => 30,
            'sale_out_of_stock' => false,
        ]);

        Product::create([
            'product_name' => 'Sony WH-1000XM6',
            'product_description' => 'Wireless noise cancelling headphones',
            'product_price' => 449.0,
            'product_sale_price' => 399.0,
            'product_category' => $headphones->id,
            'product_available_quantity' => 40,
            'sale_out_of_stock' => false,
        ]);
    }
}
