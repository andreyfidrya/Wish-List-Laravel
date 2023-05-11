<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductList;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $product = ProductList::find($id);
        unlink(public_path('images').'/'.$product->productimage);
        $product->delete();
        return back()->with('product_deleted', 'Товар был удален успешно!');
    }    
}
