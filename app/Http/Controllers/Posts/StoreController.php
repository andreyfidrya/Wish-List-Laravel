<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreProductRequest $request)
    {
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        $productname = $request->productname;
        $category = $request->category;
        $store = $request->store;
        $price = $request->price;
        $shoppingcart = false;

        $product = new ProductList();
        $product->productimage = $imageName;	    
        $product->productname = $productname;
        $product->category = $category;
        $product->store = $store;
        $product->price = $price;
        $product->shoppingcart = $shoppingcart;
        $product->save();
        return back()->with('product_added', 'Товар был добавлен успешно!');
    }    

}
