<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(StoreProductRequest $request)
    {
        $productname = $request->productname;
        $category = $request->category;
        $store = $request->store;
        $price = $request->price;
        $shoppingcart = false;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $product = ProductList::find($request->id);
        $product->productimage = $imageName;
        $product->productname = $productname;
        $product->category = $category;
        $product->store = $store;
        $product->price = $price;
        $product->shoppingcart = $shoppingcart;
        $product->save();
        return back()->with('product_updated', 'Товар был обновлен успешно!');
    }    

}
