<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class ClothesController extends Controller
{
    public function __invoke()
    {
        $clothes = 'одежда';
        $allclothesproducts = ProductList::all()->where('category', $clothes);
        $products = ProductList::where('category', $clothes)->paginate(5);
        $sum = \DB::table('shopping_lists')
        ->where('category', $clothes)
        ->sum('price');
        $cheapestproduct = DB::table('shopping_lists')
        ->where('category', $clothes)
        ->orderBy('price', 'asc')
        ->first();
        $mostexpensiveproduct = DB::table('shopping_lists')
        ->where('category', $clothes)
        ->orderBy('price', 'desc')
        ->first();
        $productnumber = DB::table('shopping_lists')->where('category', $clothes)->count();
        return view('clothes-products',compact('products', 'clothes', 'allclothesproducts', 'sum', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));   
    }  
 }
