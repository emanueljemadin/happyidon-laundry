<?php

use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;

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
    return redirect()->route('login');
});


Route::group(
    ['middleware' => ['auth',  'verified']],
    function () {


        Route::get('/dashboard', function () {
            return view('dashboard', [
                'title' => 'Dashboard',
            ]);
        })->name('dashboard');


        // customer
        Route::controller(CustomerController::class)->group(function () {
            Route::get('customer', 'index')->name('customer.index');
            Route::get('customer/create', 'create')->name('customer.create');
            Route::post('customer/store', 'store')->name('customer.store');
            Route::get('customer/edit/{id}', 'edit')->name('customer.edit');
            Route::put('customer/update', 'update')->name('customer.update');
            Route::delete('customer/destroy/{id}', 'destroy')->name('customer.destroy');
        });
        // package
        Route::controller(PackageController::class)->group(function () {
            Route::get('package', 'index')->name('package.index');
            Route::get('package/create', 'create')->name('package.create');
            Route::post('package/store', 'store')->name('package.store');
            Route::get('package/edit/{id}', 'edit')->name('package.edit');

            Route::get('package/show/{id}', 'show')->name('package.show');


            Route::put('package/update', 'update')->name('package.update');
            Route::delete('package/destroy/{id}', 'destroy')->name('package.destroy');
        });

        // transaksi
        Route::controller(TransactionController::class)->group(function () {
            Route::get('transaction', 'index')->name('transaction.index');
            Route::get('transaction/create', 'create')->name('transaction.create');

            Route::post('transaction/store', 'store')->name('transaction.store');
            Route::delete('transaction/destroy/{id}', 'destroy')->name('transaction.destroy');
            Route::get('transaction/print/{id}', 'print')->name('transaction.print');

            Route::post('transaction/status/{id}', 'status')->name('transaction.status');
            Route::get('transaction/paket/{id}', 'paket')->name('transaction.paket');

            Route::patch('transaction/confirm/{id}', 'confirm')->name('transaction.confirm');
        });
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
