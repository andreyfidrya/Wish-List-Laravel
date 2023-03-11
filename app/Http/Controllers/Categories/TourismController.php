<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class TourismController extends Controller
{
    public function __invoke()
    {
        $tourism = 'туризм';
        $alltourismproducts = ProductList::all()->where('category', $tourism);
        $products = ProductList::where('category', $tourism)->paginate(5);
        $sum = \DB::table('shopping_lists')
        ->where('category', $tourism)
        ->sum('price');
        $cheapestproduct = DB::table('shopping_lists')
        ->where('category', $tourism)
        ->orderBy('price', 'asc')
        ->first();
        $mostexpensiveproduct = DB::table('shopping_lists')
        ->where('category', $tourism)
        ->orderBy('price', 'desc')
        ->first();
        $productnumber = DB::table('shopping_lists')->where('category', $tourism)->count();
        return view('tourism-products',compact('products', 'tourism', 'alltourismproducts', 'sum', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));  
    }  
 }
