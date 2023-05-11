<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('add-product'); 
    }    

}
