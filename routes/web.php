<?php

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

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoryController;
use App\Story;
use App\Transaction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing', [
        'raised' => Transaction::where('amount', '>', 0)->sum('amount'),
        'storyCount' => Story::count(),
        'donors' => Transaction::distinct()->count('date')
    ]);
});
Route::get('/pribehy', [StoryController::class, 'index']);
Route::get('/pribehy/{id}', [StoryController::class, 'show']);
Route::get('/statistika', [StoryController::class, 'stats']);
Route::get('/euro-nadeje', function () {
    return view('euro');
});
Route::get('/kontakt', function () {
    return view('contact');
});
Route::get('/admin', [StoryController::class, 'indexAdmin'])->middleware('auth');
Route::get('/admin/login', function () {
    return view('login');
});
Route::get('/admin/pribeh', function () {
    return view('admin-story', ['title' => 'Pridať príbeh', 'btn' => 'Vytvoriť']);
})->middleware('auth');
Route::get('/admin/upravit-pribeh', [StoryController::class, 'update'])->middleware('auth');


Route::delete('/admin', [StoryController::class, 'destroy'])->middleware('auth');

Route::post('/admin/pribeh', [StoryController::class, 'store'])->middleware('auth');
Route::post('/admin/login', [LoginController::class, 'authenticate']);

Route::put('/admin/upravit-pribeh', [StoryController::class, 'update'])->middleware('auth');
