<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class PetsController extends Controller
{
    public function __invoke()
    {
        $pets = 'домашние животные';
        $allpetsproducts = ProductList::all()->where('category', $pets);
        $products = ProductList::where('category', $pets)->paginate(5);
        $sum = \DB::table('shopping_lists')
        ->where('category', $pets)
        ->sum('price');
        $cheapestproduct = DB::table('shopping_lists')
        ->where('category', $pets)
        ->orderBy('price', 'asc')
        ->first();
        $mostexpensiveproduct = DB::table('shopping_lists')
        ->where('category', $pets)
        ->orderBy('price', 'desc')
        ->first();
        $productnumber = DB::table('shopping_lists')->where('category', $pets)->count();
        return view('pets-products',compact('products', 'pets', 'allpetsproducts', 'sum', 'productnumber', 'cheapestproduct', 'mostexpensiveproduct'));   
    }  
 }
