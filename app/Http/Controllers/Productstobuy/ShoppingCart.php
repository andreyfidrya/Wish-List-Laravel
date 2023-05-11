<?php

namespace App\Http\Controllers\Productstobuy;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Controller
{
    public function __invoke()
    {
        $products = ProductList::all()->where('shoppingcart', true);              
        
        $sum = \DB::table('shopping_lists')
        ->where('shoppingcart', true)
        ->sum('price');        

        return view('shopping-cart',compact('products', 'sum'));
    }    

}