<?php

namespace App\Http\Controllers\Productstobuy;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class SelectProducts extends Controller
{
    public function __invoke($id)
    {
        $product = ProductList::find($id);
        $product->shoppingcart = true;
        $product->save();

        return back()->with('product_selected', 'Товар был успешно добавлен в корзину!');
    }    

}