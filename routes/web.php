<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemNameController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponsiblePersonController;
use App\Http\Controllers\Showcase;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',[DashboardController::class,'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::resource('assets',AssetController::class);
    Route::resource('locations',LocationController::class);
    Route::resource('item-names',ItemNameController::class);
    Route::resource('responsible-people',ResponsiblePersonController::class);

    Route::group(['prefix'=>'showcase'],function(){
        Route::get('/location-of-asset',[Showcase::class,'locationOfAsset'])->name('showcase.location-of-asset');
        Route::get('/asset-at-location',[Showcase::class,'assetAtLocation'])->name('showcase.asset-at-location');
    });

    Route::group(['prefix'=>'users'],function(){
        Route::get('/',[AdminController::class,'index'])->name('users.index');
        Route::get('/{user}/edit',[AdminController::class,'edit'])->name('users.edit');
        Route::put('/{user}',[AdminController::class,'update'])->name('users.update');
        
    });
        
    });

require __DIR__.'/auth.php';

