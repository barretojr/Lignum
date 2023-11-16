<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

    Route::get('/financial', [App\Http\Controllers\FinancialController::class, 'index'])->name('financial.index');
    Route::get('/financial/payable', [App\Http\Controllers\FinancialController::class,'payable'])->name('financial.payable');
    Route::post('/financial/payable', [App\Http\Controllers\FinancialController::class,'payable'])->name('financial.payableinsert');
    Route::get('/financial/receivable', [App\Http\Controllers\FinancialController::class,'receivable'])->name('financial.receivable');
    Route::post('/financial/receivable', [App\Http\Controllers\FinancialController::class,'receivable'])->name('financial.receivableinset'); 

    Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/list', [App\Http\Controllers\ProductsController::class, 'list'])->name('products.list');
    Route::get('/products/store', [App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');
    Route::post('/products/store', [App\Http\Controllers\ProductsController::class, 'insert'])->name('products.insert');
    Route::get("/products/{product}", [App\Http\Controllers\ProductsController::class, "show"])->name('products.show');
    Route::post("/products/{product}", [App\Http\Controllers\ProductsController::class, "update"])->name('products.update');

    Route::get('/clients', [App\Http\Controllers\ClientsController::class, 'index'])->name('clients.index');
    Route::get('/clients/list', [App\Http\Controllers\ClientsController::class, 'list'])->name('clients.list');
    Route::post("/clients/list", [App\Http\Controllers\ClientsController::class, "search"])->name("clients.search");
    Route::get('/clients/store', [App\Http\Controllers\ClientsController::class, 'store'])->name('clients.store');
    Route::post('/clients/store', [App\Http\Controllers\ClientsController::class, 'insert'])->name('clients.insert');
    Route::get("/clients/{client}", [App\Http\Controllers\ClientsController::class, "show"])->name('clients.show');
    Route::get("/clients/historic/{client}", [App\Http\Controllers\ClientsController::class, "historic"])->name('clients.historic');
    Route::post("/clients/{client}", [App\Http\Controllers\ClientsController::class, "update"])->name('clients.update');

    Route::get('/stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock.index');

    Route::get('/partners/list', [App\Http\Controllers\PartnersController::class, 'list'])->name('partners.list');
    Route::get('/partners/store', [App\Http\Controllers\PartnersController::class, 'store'])->name('partners.store');
    Route::post('/partners/store', [App\Http\Controllers\PartnersController::class, 'insert'])->name('partners.insert');
    Route::get("/partners/{partner}", [App\Http\Controllers\PartnersController::class, "show"])->name('partners.show');
    Route::post("/partners/{partner}", [App\Http\Controllers\PartnersController::class, "update"])->name('partners.update');

    Route::get('/items/list', [App\Http\Controllers\ItemsController::class, 'list'])->name('items.list');
    Route::get('/items/store', [App\Http\Controllers\ItemsController::class, 'store'])->name('items.store');
    Route::post('/items/store', [App\Http\Controllers\ItemsController::class, 'insert'])->name('items.insert');
    Route::get("/items/{item}", [App\Http\Controllers\ItemsController::class, "show"])->name('items.show');
    Route::post("/items/{item}", [App\Http\Controllers\ItemsController::class, "update"])->name('items.update');
});
