<?php

namespace App\Http\Controllers\Productstobuy;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class EmptyShoppingCart extends Controller
{
    public function __invoke()
    {
        $products = ProductList::all()->where('shoppingcart', true); 
         
        foreach ($products as $product) 
        {
            $product->shoppingcart = false;
            $product->save();  
        }
        return view('emptyshopping-cart'); 
    }    

}