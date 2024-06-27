<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::controller(InvoiceController::class)->group(function(){
        Route::get('/invoices','index');
        Route::get('/invoice/{id}','show');
        Route::post('/invoice','store');
});

Route::resources([
   'customers' => CustomerController::class,
   'products' => ProductController::class,
]);
