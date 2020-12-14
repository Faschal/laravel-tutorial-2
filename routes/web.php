<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DropZoneController;
use App\Http\Controllers\GalleryController;

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
    return view('welcome');
});

Route::get('/add-user', [UserController::class, 'addRecord']);
Route::get('/phone/{id}', [UserController::class, 'fetchPhoneByUser']);

Route::get('/add-post', [PostController::class, 'addPost']);
Route::get('/add-comment/{id}', [PostController::class, 'addComment']);
Route::get('/comments/{id}', [PostController::class, 'getCommentByPost']);

Route::get('/add-employee', [EmployeeController::class, 'addEmployee']);    
Route::get('/export-excel', [EmployeeController::class, 'exportIntoExcel']);
Route::get('/export-csv', [EmployeeController::class, 'exportIntoCsv']);

Route::get('/get-employee', [EmpController::class, 'getAllEmployees']);
Route::get('/export-pdf', [EmpController::class, 'downloadPDF']);

Route::get('/import-form', [EmployeeController::class, 'showImportForm']);
Route::post('/import-form', [EmployeeController::class, 'importForm'])->name('employee.import');

Route::get('/resize-image', [ImageController::class, 'showResizeImage']);
Route::post('/resize-image', [ImageController::class, 'resizeImage'])->name('image.resize');

Route::get('/dropzone', [DropZoneController::class, 'dZone']);
Route::post('/dropzone', [DropZoneController::class, 'dzoneStore'])->name('image.dzone');

Route::get('/gallery', [GalleryController::class, 'showGallery']);
