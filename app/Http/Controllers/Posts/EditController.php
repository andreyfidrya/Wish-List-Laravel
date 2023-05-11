<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke($id)
    {
        $product = ProductList::find($id);
        return view('edit-product',compact('product'));
    }    

}
