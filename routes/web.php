<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PriceController;
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


Route::get('/', [DashboardController::class, 'index'])->name('Home');
// Route::get('/', function () {
//     return view('index');
// })->name('Home');
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
    Route::post('/index/viewstudent',  [InvoiceController::class, 'getStudentAjax'])->name('InvoiceGetStudentInfo');
    Route::post('/index/getInvoices/{id}',  [InvoiceController::class, 'getAllStudentsInvoices'])->name('allInvoices');
    
    Route::post('/index/viewcourse',  [InvoiceController::class, 'getCourseAjax'])->name('InvoiceGetCourseInfo'); 
    Route::post('/index/invoicedownload/{id}',  [InvoiceController::class, 'invoiceDownload'])->name('InvoiceDownloadView'); 
    Route::get('/download/{id}',  [InvoiceController::class, 'DownloadInvoice'])->name('InvoiceDownload'); 

    Route::get('/create',  [InvoiceController::class, 'create'])->name('InvoiceCreate');
    Route::post('/create/getTotalAmount',  [InvoiceController::class, 'getTotalPriceAjax'])->name('InvoiceCreateToalAmount');
    Route::post('/update/{id}',  [InvoiceController::class, 'update'])->name('updateInvoice');
    Route::delete('/delete/{id}',  [InvoiceController::class, 'destroy'])->name('deleteInvoice');

    Route::put('/edit/{id}',  [InvoiceController::class, 'edit'])->name('EdittheInvoice');



    Route::get('/create/courseinvoice',  [InvoiceController::class, 'createInvoiceWithCourse'])->name('InvoiceCreatewithCourse');

    Route::post('/store',  [InvoiceController::class, 'store'])->name('InvoiceStore');
    Route::get('/update/{id}',  [InvoiceController::class, 'update'])->name('InvoiceUpdate');
    Route::get('/delete',  [InvoiceController::class, 'destroy'])->name('InvoiceDelete');
    Route::get('/show/{id}',  [InvoiceController::class, 'show'])->name('InvoiceShow');
    Route::post('/payment/{id}',  [InvoiceController::class, 'addpayment'])->name('InvoicePayment');

    
});

Route::group(['prefix'=>'price'], function(){
    Route::get('/index',  [PriceController::class, 'priceIndex'])->name('PriceIndex');
    // Route::get('/index/pagination',  [PriceController::class, 'priceIndex'])->name('PriceIndex');
    Route::post ('/CoursePrice/{c_id}' ,[PriceController::class, 'addPircePriceIndex'])->name('PriceAdding');
    Route::post ('/addNewPrice' ,[PriceController::class, 'NewPriceEntry'])->name('PriceNew');
    Route::get('/updatemodal' ,[PriceController::class,'updateModalShow'])->name('updateModal');
    Route::post('/store',  [PriceController::class, 'storePrice'])->name('PriceStore');
    Route::delete('/delete/{id}',  [PriceController::class, 'deletePrice'])->name('PriceDelete');
    Route::put('/update/{id}',  [PriceController::class, 'updatePrice'])->name('PriceUpdate');

});

Route::group(['prefix' => 'cources'] , function() {
    Route::get('/all', [CoursesController::class, 'index'])->name('CourseIndex');
    Route::post ('/addPriceCourse/{c_id}' ,[CoursesController::class, 'addPirce'])->name('CoursePriceAdding');

});