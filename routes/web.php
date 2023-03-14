<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StatisticController;

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

//Route::get('/statistics', function () {
//    return view('admin.statistics');
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

    Route::get('/debt_info/{costumer}',[CostumerController::class,'debt_info'])->name('debt_info');

    Route::resource('/costumer', CostumerController::class);

    Route::resource('/debt', DebtController::class);

    Route::resource('/payment', PaymentController::class);

//    Route::resource('/statistics', StatisticController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function(){
    //roles
    Route::resource('/roles',RoleController::class);

    Route::resource('/statistics', StatisticController::class);
});

require __DIR__.'/auth.php';
