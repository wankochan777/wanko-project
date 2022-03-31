<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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

// トップページ
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// 評価一覧
Route::get('/reviewlist', [ReviewController::class, 'reviewlist_index'])->name('reviewlist_index')->middleware(['auth']);

// 投稿
Route::get('/review', [ReviewController::class, 'review'])->name('review')->middleware(['auth']);
Route::post('/review', [ReviewController::class, 'review_send'])->name('review')->middleware(['auth']);

// 投稿編集・削除
Route::get('/review/{id}/edit', [ReviewController::class, 'review_edit'])->whereNumber('id')->name('review_edit')->middleware(['auth']);
Route::post('/review/{id}/edit', [ReviewController::class, 'review_edit_send'])->whereNumber('id')->name('review_edit')->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
