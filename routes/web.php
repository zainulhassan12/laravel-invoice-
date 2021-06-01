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


Route::get('/StudenIndex',  [InvoiceController::class, 'index']);
Route::get('/student',  [StudentController::class, 'index'])->name('StudentHome');
Route::get('/addstudent',  [StudentController::class, 'create']);
Route::post('/storestudent',  [StudentController::class, 'store'])->name('StoreStudent');

Route::get('/viewstudent/{id}',  [StudentController::class, 'show'])->name('DisplayStudent');;
Route::get('/rm-student/{id}',  [StudentController::class, 'delete'])->name('DeleteStudent');






