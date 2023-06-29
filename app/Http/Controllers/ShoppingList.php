<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class ShoppingList extends Controller
{
    
    public function AllProducts()
    {
        $products = ProductList::paginate(5);
        $allproducts = ProductList::all();
        $sum = DB::table('shopping_lists')->sum('price');
        $productnumber = DB::table('shopping_lists')->count();
        $cheapestproduct = DB::table('shopping_lists')
        ->orderBy('price', 'asc')
        ->first();
        $mostexpensiveproduct = DB::table('shopping_lists')
        ->orderBy('price', 'desc')
        ->first();
        return view('all-products',compact('products','allproducts', 'sum', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));        
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = ProductList::query()
        ->where('productname', 'LIKE', "%{$search}%")
        ->orWhere('category', 'LIKE', "%{$search}%")
        ->orWhere('store', 'LIKE', "%{$search}%")
        ->get();
        return view('search',compact('products'));
    }
    
    public function trash(){
        $purchasedproducts = ProductList::onlyTrashed()->get();
        
        $sum = ProductList::onlyTrashed()
        ->sum('price');
        $productnumber = ProductList::onlyTrashed()
        ->count();
        $cheapestproduct = ProductList::onlyTrashed()
        ->orderBy('price', 'asc')
        ->first();
        $mostexpensiveproduct = ProductList::onlyTrashed()
        ->orderBy('price', 'desc')
        ->first();  
        
        return view('trash', compact('purchasedproducts', 'sum', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));
    }

    public function restore($id){
        $restoredproducts = ProductList::onlyTrashed()->findOrFail($id);
        $restoredproducts->restore();
        return redirect()->route('trash');
    }

    public function destroyForever($id){
        ProductList::onlyTrashed()->findOrFail($id)->forceDelete();        
    }

}
