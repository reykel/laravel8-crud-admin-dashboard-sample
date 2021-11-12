<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('articulos', 'App\Http\Controllers\ArticuloController');

Route::resource('cursos', 'App\Http\Controllers\CursosController');

Route::resource('facultades', 'App\Http\Controllers\FacultadesController');

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('getProducto/{id}', function ($id) {
    $producto = App\Models\Producto::where('id_categoria',$id)->get();
    return response()->json($producto);
});
