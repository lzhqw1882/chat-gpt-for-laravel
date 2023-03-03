<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\QuestionsController;
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

/*Route::get('/', function () {
    return view('main');
});*/

Route::get('/', [MainController::class,'index'])->name('index');

Route::prefix('questions')->group(function() {
    Route::get('/', [QuestionsController::class, 'index'])->name('questions.index');
    Route::post('/', [QuestionsController::class, 'store'])->name('questions.store');
    Route::get('/create', [QuestionsController::class, 'create'])->name('questions.create');
    Route::get('/{seq}', [QuestionsController::class, 'show'])->name('questions.show');
});
