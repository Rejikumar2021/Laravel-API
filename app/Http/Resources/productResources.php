<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class productResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
            'product_price' => $this->product_price,
            'product_sale_price' => $this->product_sale_price,
            'product_category' => [
                'id' => $this->category?->id,
                'name' => $this->category?->category_name,
            ],
            'product_available_quantity' => $this->product_available_quantity,
            'sale_out_of_stock' => $this->sale_out_of_stock,
            'gallery' => ProductGalleryResource::collection(
                $this->whenLoaded('galleries')
            ),
        ];
    }
}
