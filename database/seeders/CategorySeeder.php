<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Celulares y tablets',
                'slug'=> Str::slug('Celulares y tablets'),
                'icon' => '<i class="fas fa-mobile"></i>'
            ],
            
            [
                'name' => 'Ceramica',
                'slug'=> Str::slug('Ceramica'),
                'icon' => '<i class="fad fa-badge"></i>'
            ],

            [
                'name' => 'Calzado',
                'slug'=> Str::slug('Calzado'),
                'icon' => '<i class="fas fa-boot"></i>'               
            ],

            [
                'name' => 'Computación',
                'slug'=> Str::slug('Computación'),
                'icon' => '<i class="fas fa-computer-speaker"></i>'
            ],

            [
                'name' => 'Moda',
                'slug'=> Str::slug('Moda'),
                'icon' => '<i class="fas fa-tshirt"></i>',
            ],
        ];

        foreach ($categories as $category){
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();
            
            foreach ($brands as $brand){
                $brand->categories()->attach($category->id);
            }
        }
    }
} 
