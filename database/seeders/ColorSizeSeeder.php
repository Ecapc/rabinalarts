<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = Size::all();

        foreach ($sizes as $size) {
            $size->colors()
                ->attach([  
                            1 => ['quantity' => 10],
                            2 => ['quantity' => 10], 
                            3 => ['quantity' => 10], 
                            4 => ['quantity' => 10]
                        ]);
        }
    }
}
