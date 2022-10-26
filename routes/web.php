<?php

use App\Http\Controllers\GroceryController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'groceries' => Auth::user()->groceries,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/{user}/groceries', [GroceryController::class, 'show']);

Route::get('/deleted-item', [GroceryController::class, 'showDelete'])->name('deleted-item')->middleware(['auth', 'verified']);

Route::get('/groceries/delete-all', [GroceryController::class, 'deleteAll'])->middleware(['auth', 'verified']);

Route::get('/groceries/delete-all/permanent', [GroceryController::class, 'deleteAllPermanent']);

Route::post('/groceries', [GroceryController::class, 'store'])->middleware(['auth', 'verified']);

Route::delete('/groceries/{grocery}', [GroceryController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/groceries/toggle-check/{grocery}', [GroceryController::class, 'toggleCheck'])->middleware(['auth', 'verified']);

Route::post('/groceries/{grocery}/restore', [GroceryController::class, 'restoreItem'])->middleware(['auth']);

Route::post('/{user}/subscribe', [GroceryController::class, 'subscribeUser'])->middleware(['auth']);

require __DIR__.'/auth.php';
