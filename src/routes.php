<?php

//Route::get('products', function (){
//    $products = DB::select("SELECT * FROM products");
//    return view('admin::products')->with('products',$products);
//});

Route::get('products', 'ProductController@index');

Route::get('products', function (){
    echo "Hello";
});

