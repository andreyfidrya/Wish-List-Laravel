<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductList;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = ProductList::select("productname as value", "id")
                    ->where('productname', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }
}
