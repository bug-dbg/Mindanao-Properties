<?php

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

// config a route to Unauthenticated route, accessible to all users 
// and route to Authenticated route, accessible to authenticated users only


Route::get('/', function () {
    return view('welcome');
})->middleware('authcheck')->name('welcome');

//  allowed only if the user is verified or loged-in
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        Route::get('/properties', function () {
            return view('properties');
        })->name('properties');

        Route::get('/properties/property-details', function () {
            return view('property-details');
        })->name('property-details');
        
        Route::controller(App\Http\Controllers\UserVerifiedController::class)->group(function () {
            Route::get('/properties/add-property', 'addproperty')->name('add.property');
        });

        /* Route::middleware(['user.verified'])
            ->controller([App\Http\Controllers\UserVerifiedController::class])
            ->group(function () {
            Route::get('properties/add-property', 'addproperty')
                ->name('add.property');
        }); */
});




