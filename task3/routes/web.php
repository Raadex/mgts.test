<?php

use App\Http\Controllers\HomeController;
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

Route::get('/test', function () {
  /* \App\Models\User::factory()->has(
       \App\Models\Order\Order::factory()->count(rand(1,10))
   )->has(
       \App\Models\Document::factory()->count(rand(1,3))
   )->create();*/

    $users = \App\Models\User::whereHas('address', function($query)
    {
        $query->where('country', 'like', '%Украина%')->
        orWhere('region', 'like', '%Украина%')->
        orWhere('city', 'like', '%Украина%')->
        orWhere('street', 'like', '%Украина%')->
        orWhere('house', 'like', '%Украина%')->
        orWhere('flat', 'like', '%Украина%');

    })->get();

    dd($users->count());
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'index'])->name('search');
