<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function __invoke()
    {
     $car = 'машина';
     $allcarproducts = ProductList::all()->where('category', $car);
     $products = ProductList::where('category', $car)->paginate(5);
     $sum = \DB::table('shopping_lists')
     ->where('category', $car)
     ->sum('price');
     $cheapestproduct = DB::table('shopping_lists')
        ->where('category', $car)
        ->orderBy('price', 'asc')
        ->first();
     $mostexpensiveproduct = DB::table('shopping_lists')
        ->where('category', $car)
        ->orderBy('price', 'desc')
        ->first();
     $productnumber = DB::table('shopping_lists')->where('category', $car)->count();
    return view('car-products',compact('products', 'car', 'sum', 'allcarproducts', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));   
    }  
 }
