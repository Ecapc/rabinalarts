<?php

namespace App\Http\Livewire;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;



class AddCartItem extends Component
{
    public $product, $quantity;
    public $qty = 1;

    public function mount()
    {
        $this->quantity = $this->product->quantity;
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }
    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function addItem(){
        Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'large']]);
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
