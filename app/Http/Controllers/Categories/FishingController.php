<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class FishingController extends Controller
{
    public function __invoke()
    {
        $fishing = 'рыбалка';
        $allfishingproducts = ProductList::all()->where('category', $fishing);        
        $products = ProductList::where('category', $fishing)->paginate(5);
        $sum = \DB::table('shopping_lists')
        ->where('category', $fishing)
        ->sum('price');
        $cheapestproduct = DB::table('shopping_lists')
        ->where('category', $fishing)
        ->orderBy('price', 'asc')
        ->first();
        $mostexpensiveproduct = DB::table('shopping_lists')
        ->where('category', $fishing)
        ->orderBy('price', 'desc')
        ->first();
        $productnumber = \DB::table('shopping_lists')
        ->where('category', $fishing)
        ->count();
        return view('fishing-products',compact('products', 'fishing', 'allfishingproducts', 'sum', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));
    }  
 }
