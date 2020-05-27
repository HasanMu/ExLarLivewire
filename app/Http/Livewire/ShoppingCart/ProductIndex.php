<?php

namespace App\Http\Livewire\ShoppingCart;

use App\Product;
use App\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;

    protected  $updatesQueryString = ['search'];

    public function render()
    {
        return view('livewire.shopping-cart.product-index', [
            'products' => $this->search === null ?
                            Product::latest()->paginate(12) :
                            Product::where('name', 'like', '%'.$this->search.'%')->latest()->paginate(12),
        ]);
    }

    public function addToCart($id)
    {
        Cart::add(Product::find($id));

        $this->emit('cartAdded');
    }
}
