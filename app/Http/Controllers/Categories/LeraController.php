<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class LeraController extends Controller
{
    public function __invoke()
    {
     $lera = 'желания Леры';
     $allleraproducts = ProductList::all()->where('category', $lera);
     $products = ProductList::where('category', $lera)->paginate(5);
     $sum = \DB::table('shopping_lists')
     ->where('category', $lera)
     ->sum('price');
     $cheapestproduct = DB::table('shopping_lists')
        ->where('category', $lera)
        ->orderBy('price', 'asc')
        ->first();
     $mostexpensiveproduct = DB::table('shopping_lists')
        ->where('category', $lera)
        ->orderBy('price', 'desc')
        ->first();
     $productnumber = DB::table('shopping_lists')->where('category', $lera)->count();
     return view('lera-products',compact('products', 'lera', 'sum', 'allleraproducts', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));   
    }  
 }
