<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories =[

            /*Celulares y tablets*/
            #'Celulares y Smartphones'
            [
                'category_id' => 1,
                'name' => 'Ollitas',
                'slug'=> Str::slug('Ollitas'),
                'color' => true,
            ],

            #'Smartphone'
            [
                'category_id' => 1,
                'name' => 'Floreros',
                'slug'=> Str::slug('Floreros'),
            ], 

            [
                'category_id' => 1,
                'name' => 'Accesorios de Ceramica',
                'slug'=> Str::slug('Accesorios de Ceramica'),
            ], 

            /*Ceramica*/
            #'Reloj de Pared'
            [
                'category_id' => 2,
                'name' => 'Mujer',
                'slug'=> Str::slug('Mujer'),
                'color' => true,
            ],

            #'Portalapiz'
            [
                'category_id' => 2,
                'name' => 'Niño',
                'slug'=> Str::slug('Niño'),
            ],

            #'Lampara'
            [
                'category_id' => 2,
                'name' => 'Hombre',
                'slug'=> Str::slug('Hombre'),
            ],

            /*Calzado*/
            #'Hombre'
            [
                'category_id' => 3,
                'name' => 'Hombre',
                'slug'=> Str::slug('Hombre'),
                'color' => true,
            ],

            #'Mujer'
            [
                'category_id' => 3,
                'name' => 'Mujer',
                'slug'=> Str::slug('Mujer'),
                'color' => true,
                'size' => true,
            ],

            #'Niño'
            [
                'category_id' => 3,
                'name' => 'Niño',
                'slug'=> Str::slug('Niño'),
                'color' => true,
                'size' => true,
            ],

            /*Computacion*/
            #'Laptop'
            [
                'category_id' => 4,
                'name' => 'LLaveros',
                'slug'=> Str::slug('LLaveros'),
                'color' => true,
                'size' => true,
            ],

            #'PC'
            [
                'category_id' => 4,
                'name' => 'Portalapicero',
                'slug'=> Str::slug('Portalapicero'),
            ],

            #'Armada'
            [
                'category_id' => 4,
                'name' => 'Pulseras',
                'slug'=> Str::slug('Pulseras'),
            ],
        ];

        foreach ($subcategories as $subcategories){
            Subcategory::factory(1)->create($subcategories);
        }
    }
}
