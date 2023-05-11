<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class FlatController extends Controller
{
    public function __invoke()
    {
        $flat = 'квартира';
        $allflatproducts = ProductList::all()->where('category', $flat);
        $products = ProductList::where('category', $flat)->paginate(5);
        $sum = \DB::table('shopping_lists')
        ->where('category', $flat)
        ->sum('price');
        $cheapestproduct = DB::table('shopping_lists')
        ->where('category', $flat)
        ->orderBy('price', 'asc')
        ->first();
        $mostexpensiveproduct = DB::table('shopping_lists')
        ->where('category', $flat)
        ->orderBy('price', 'desc')
        ->first();
        $productnumber = DB::table('shopping_lists')->where('category', $flat)->count();
        return view('flat-products',compact('products', 'flat', 'allflatproducts', 'sum', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));   
    }  
 }
