<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Builder;

use App\Models\Product;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::whereHas('subcategory', function(Builder $query){
            $query->where('color', true)
                ->where('size', false);
        })->get(); #Permite hacer relaciones de su modelo

        foreach ($products as $product) {
            $product->colors()->attach([
                1 => [
                    'quantity' => 10
                ], 
                2 => [
                    'quantity' => 10
                ], 
                3 => [
                    'quantity' => 10
                ], 
                4 => [
                    'quantity' => 10
                ]
            ]);
        }
    }
}
