<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', [StudentController::class, 'index']);
// untuk halamn menambahkan data baru 
Route::get('/add', [StudentController::class, 'create'])->name('add');
// untuk tambah data
Route::post('/add/send', [StudentController::class, 'store'])->name('send');
//untuk halaman edit dan kirim datanya 
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
// untuk edit data
Route::patch('/update/{id}', [StudentController::class, 'update'])->name('update');
//untuk hapus data
Route::delete('/delete/data/{id}', [StudentController::class, 'destroy'])->name('delete');
// menampilkan data yang di hapus 
Route::get('/trashall', [StudentController::class, 'trash'])->name('trashall');
//restore
Route::get('/data/restore/{id}', [StudentController::class, 'restore'])->name('restore');
//permanen 
Route::get('/trash/deleted/permanenn/{id}', [StudentController::class, 'permanenDelete'])->name('permanent');