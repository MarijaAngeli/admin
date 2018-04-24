<?php

namespace Angeli\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = \DB::select("SELECT * FROM products");
        return view('products')->with('products', $products);
    }
}
