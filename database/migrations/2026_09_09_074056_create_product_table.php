<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_description')->nullable();
            $table->decimal('product_price', 10, 2);
            $table->decimal('product_sale_price', 10, 2)->nullable();
            $table
                ->foreignId('product_category')
                ->constrained('product_categories')
                ->restrictOnDelete();
            $table->unsignedInteger('product_available_quantity')->default(0);
            $table->boolean('sale_out_of_stock')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
