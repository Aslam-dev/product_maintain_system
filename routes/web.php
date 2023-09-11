<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    //product routes
    Route::get('/products/viewproduct', [ProductController::class,'index'])->name('products.viewproduct');
    Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
  
    
    Route::post('/products', [ProductController::class,'store'])->name('products.store');
    Route::resource('products', ProductController::class);


    //catogory routes
    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.addcategory');
    Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
   
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
