<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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
    return view('auth.login');
});



Auth::routes();
//Route::match(['get', 'post'], 'register', function () { abort(404); });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('invoices', App\Http\Controllers\InvoicesController::class);

Route::resource('sections', App\Http\Controllers\SectionsController::class);

Route::resource('products', App\Http\Controllers\ProductsController::class);

Route::resource('InvoiceAttachments', 'App\Http\Controllers\InvoicesAttachmentsController');

Route::get('/section/{id}', 'App\Http\Controllers\InvoicesController@getproducts');

Route::get('/InvoicesDetails/{id}', 'App\Http\Controllers\InvoicesDetailsController@edit');

Route::get('Attachments/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');

Route::get('download/{invoice_number}/{file_name}', 'App\Http\Controllers\InvoicesDetailsController@get_file');

Route::get('/edit_invoice/{id}', 'App\Http\Controllers\InvoicesController@edit');

Route::get('/Status_show/{id}', 'App\Http\Controllers\InvoicesController@show')->name('Status_show');

Route::post('/Status_Update/{id}', 'App\Http\Controllers\InvoicesController@Status_Update')->name('Status_Update');

Route::post('delete_file', 'App\Http\Controllers\InvoicesDetailsController@destroy')->name('delete_file');

Route::get('Invoice_Paid','App\Http\Controllers\InvoicesController@Invoice_Paid');

Route::get('Invoice_UnPaid','App\Http\Controllers\InvoicesController@Invoice_UnPaid');

Route::get('Invoice_Partial','App\Http\Controllers\InvoicesController@Invoice_Partial');

Route::resource('Archive', 'App\Http\Controllers\InvoiceAchiveController');

Route::get('Print_invoice/{id}','App\Http\Controllers\InvoicesController@Print_invoice');

Route::get('export_invoices', 'App\Http\Controllers\InvoicesController@export');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});

Route::get('invoices_report', 'App\Http\Controllers\Invoices_Report@index');
Route::post('Search_invoices', 'App\Http\Controllers\Invoices_Report@Search_invoices');

Route::get('customers_report', 'App\Http\Controllers\Customers_Report@index')->name("customers_report");
Route::post('Search_customers', 'App\Http\Controllers\Customers_Report@Search_customers');

Route::get('MarkAsRead_all','App\Http\Controllers\InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('/{page}', [AdminController::class, 'index']);
