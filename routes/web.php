<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->prefix('/products')->group(function () {
  Route::get('/destroy/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
  Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
  Route::get('/{id}', [ProductsController::class, 'show'])->name('products.show');
  Route::put('/{id}', [ProductsController::class, 'update'])->name('products.update');
  Route::get('/', [ProductsController::class, 'index'])->name('products.index');
  Route::post('/', [ProductsController::class, 'store'])->name('products.store');
  Route::get('/create/new', [ProductsController::class, 'create'])->name('products.create');
});

Route::middleware(['auth'])->prefix('/categories')->group(function () {
  Route::get('/destroy/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
  Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
  Route::get('/{id}', [CategoriesController::class, 'show'])->name('categories.show');
  Route::put('/{id}', [CategoriesController::class, 'update'])->name('categories.update');
  Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
  Route::post('/', [CategoriesController::class, 'store'])->name('categories.store');
  Route::get('/create/new', [CategoriesController::class, 'create'])->name('categories.create');
});


Route::middleware(['auth'])->prefix('/brands')->group(function () {
  Route::get('/destroy/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
  Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
  Route::get('/{id}', [BrandController::class, 'show'])->name('brands.show');
  Route::put('/{id}', [BrandController::class, 'update'])->name('brands.update');
  Route::get('/', [BrandController::class, 'index'])->name('brands.index');
  Route::post('/', [BrandController::class, 'store'])->name('brands.store');
  Route::get('/create/new', [BrandController::class, 'create'])->name('brands.create');
});

require __DIR__ . '/auth.php';
