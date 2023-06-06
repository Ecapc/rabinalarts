<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;

    public function render()
    {
        return view('livewire.category-products');
    }
}
