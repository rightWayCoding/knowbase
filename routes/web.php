<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\NotesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [NotesController::class, 'index'])->name("index");
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/add', [HomeController::class, 'showAddNoteForm'])->name('note.add');
Route::post('/home', [HomeController::class, 'storeNote'])->name('note.store');
Route::get('/home/{note}/edit', [HomeController::class, 'showEditNoteForm'])->name('note.edit')->middleware('can:update,note');
Route::patch('/home/{note}', [HomeController::class, 'updateNote'])->name('note.update')->middleware('can:update,note');
Route::get("/home/{note}/delete", [HomeController::class, 'showDeleteNoteForm'])->name('note.delete')->middleware('can:destroy,note');
Route::delete("/home/{note}", [HomeController::class, 'destroyNote'])->name('note.destroy')->middleware('can:destroy,note');
Route::get('/{note}', [NotesController::class, 'detail'])->name("detail");