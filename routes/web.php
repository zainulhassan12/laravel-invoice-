<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StudentController;


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
    return view('index');
});

Route::group(['prefix'=>'zcbminvoice'], function(){

});


Route::group(['prefix'=>'student'], function(){
    Route::get('/students',  [StudentController::class, 'index'])->name('StudentIndex');
    Route::get('/addstudent',  [StudentController::class, 'create'])->name('CreateStudent');
    Route::post('/storestudent',  [StudentController::class, 'store'])->name('StoreStudent');
    Route::get('/editstudent/{id}',  [StudentController::class, 'edit'])->name('EditStudent');
    Route::put('/up-student/{id}',  [StudentController::class, 'update'])->name('UpdateStudent');
    Route::get('/viewstudent/{id}',  [StudentController::class, 'show'])->name('DisplayStudent');
    Route::delete('/rm-student/{id}',  [StudentController::class, 'destroy'])->name('DeleteStudent');
    
    
});

Route::group(['prefix'=>'invoice'], function(){
    Route::get('/index',  [InvoiceController::class, 'index'])->name('InvoiceIndex');
    Route::get('/create',  [InvoiceController::class, 'create'])->name('InvoiceCreate');
    Route::get('/store',  [InvoiceController::class, 'store'])->name('InvoiceStore');
    Route::get('/update/{id}',  [InvoiceController::class, 'update'])->name('InvoiceUpdate');
    Route::get('/delete',  [InvoiceController::class, 'destroy'])->name('InvoiceDelete');
    Route::get('/show/{id}',  [InvoiceController::class, 'show'])->name('InvoiceShow');

});




