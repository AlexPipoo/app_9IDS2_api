<?php

use App\Http\Livewire\ClientesEdit;
use App\Http\Livewire\ClientesTable;
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
    return view('welcome');
});

Route::get('/clientes', ClientesTable::class)->name('clientes');

Route::get('/cliente/{id}', ClientesEdit::class)->name('cliente.edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
