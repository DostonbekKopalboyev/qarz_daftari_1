<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\PaymentController;

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

//Route::get('/', function () {
//    return view('admin.index');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//


Route::middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('admin.index');
    Route::get('/addUser', [ProfileController::class, 'create'])->name('admin.addUser');
    Route::post('store', [ProfileController::class, 'store']);
    Route::get('/editUser/{id}', [ProfileController::class, 'edit'])->name('admin.editUser');
    Route::post('/update', [ProfileController::class, 'update']);
    Route::get('/destroy/{id}', [ProfileController::class, 'destroy']);


    Route::resource('/costumer', CostumerController::class);

    Route::resource('/debt', DebtController::class);

    Route::resource('/payment', PaymentController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
