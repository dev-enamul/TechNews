<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\homeController;
use App\Http\controllers\listingController;
use App\Http\controllers\detailsController;
use App\Http\controllers\welcomeController;
use App\Http\Controllers\back\dashboardController; 
use App\Http\Controllers\back\categoryController; 
use App\Http\Controllers\back\permissionController; 
use App\Http\Controllers\back\roleController; 
use App\Http\Controllers\back\authorController; 

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

// Route::get('/', function () {
//     return view('');
// });
Route::get("/",[welcomeController::class,'index']);
Route::get("/listing",[listingController::class,'index']);
Route::get("/details",[detailsController::class,'index']);

Route::group(['prefix'=>'back','middleware'=>'auth'], function(){

    Route::get('/',[dashboardController::class,'index']);
    Route::group(['middleware'=>'permission:All'], function(){
            //  Permission
        Route::get('/permission',[permissionController::class,'index','middleware'=>'permission:Permission List'])->name('permission');
        Route::get('/permission/create',[permissionController::class,'create','middleware'=>'permission:Permission Create'])->name('permission-create');
        Route::post('/permission/store',[permissionController::class,'store','middleware'=>'permission:Permission Add'])->name('permission-store');
        Route::get('/permission/edit/{id}',[permissionController::class,'edit','middleware'=>'permission:Permission Update'])->name('permission-edit')->name('permission-edit');
        Route::put('/permission/edit/{id}',[permissionController::class,'update','middleware'=>'permission:Permission Update'])->name('permission-update');
        Route::delete('/permission/delete/{id}',[permissionController::class,'destroy','middleware'=>'permission:Permission Delete'])->name('permission-delete');

        //  Role
        Route::get('/role',[roleController::class,'index']);
        Route::get('/role/create',[roleController::class,'create']);
        Route::post('/role/store',[roleController::class,'store']);
        Route::get('/role/edit/{id}',[roleController::class,'edit'])->name('permission-edit');
        Route::put('/role/edit/{id}',[roleController::class,'update',])->name('permission-update');
        Route::delete('/role/delete/{id}',[roleController::class,'destroy',])->name('permission-delete');

        //  Author
        Route::get('/author',[authorController::class,'index']);
        Route::get('/author/create',[authorController::class,'create']);
        Route::post('/author/store',[authorController::class,'store']);
        Route::get('/author/edit/{id}',[authorController::class,'edit'])->name('permission-edit');
        Route::put('/author/edit/{id}',[authorController::class,'update',])->name('permission-update');
        Route::delete('/author/delete/{id}',[authorController::class,'destroy',])->name('permission-delete');

    });

    //  Category
    Route::get('/category',[categoryController::class,'index','middleware'=>'permission:Permission List'])->middleware(['permission:All|Category List'])->name('category');
    Route::get('/category/create',[categoryController::class,'create'])->middleware(['permission:All|Category Create'])->name('category-create');
    Route::post('/category/store',[categoryController::class,'store'])->middleware(['permission:All|Category Add'])->name('category-store');
    Route::get('/category/edit/{id}',[categoryController::class,'edit'])->middleware(['permission:All|Category Update'])->name('category-edit');
    Route::put('/category/edit/{id}',[categoryController::class,'update'])->middleware(['permission:All|Category Update'])->name('category-update');
    Route::put('/category/status/{id}',[categoryController::class,'status'])->middleware(['permission:All|Category Update'])->name('category-status');
    Route::delete('/category/delete/{id}',[categoryController::class,'destroy'])->middleware(['permission:All|Category Delete'])->name('category-delete');
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

