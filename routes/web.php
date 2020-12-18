<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DropZoneController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestHelperController;
use App\Http\Controllers\ProductController;

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

Route::get('/editor', [EditorController::class, 'showEditor']);

Route::get('/add-student', [StudentController::class, 'showAddStudent']);
Route::post('/add-student', [StudentController::class, 'addStudent'])->name('student.add');

Route::get('/all-students', [StudentController::class, 'showStudents']);
Route::get('/edit-student/{id}', [StudentController::class, 'showEditStudent']);
Route::post('/update-student', [StudentController::class, 'editStudent'])->name('student.update');
Route::delete('/delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');

Route::get('/contact-us', [ContactController::class,'showContact']);
Route::post('/send-msg', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('test-helper', [TestHelperController::class, 'getFirstLastName']);

Route::get('/add-product', [ProductController::class, 'addProduct']);
Route::get('/search', [ProductController::class, 'showSearchProduct']);
Route::get('/autosearch', [ProductController::class, 'autocomplete'])->name('search.autocomplete');
