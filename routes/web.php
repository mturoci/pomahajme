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
        'donors' => Transaction::distinct()->count('date'),
    ]);
});
Route::get('/pribehy', [StoryController::class, 'index']);
Route::get('/pribehy/{id}', [StoryController::class, 'show']);
Route::get('/statistika', [StoryController::class, 'stats']);
Route::get('/euro-nadeje', function () {
    return view('euro');
});
Route::get('/dokonale-vianoce', function () {
    return view('dokonale-vianoce');
});
Route::get('/o-nas', function () {
    return view('contact');
});
Route::get('/admin', [StoryController::class, 'indexAdmin'])->middleware('auth');
Route::get('/admin/login', function () {
    return view('login');
});
Route::get('/admin/pribeh', function () {
    return view('admin-story', ['title' => 'Pridať príbeh', 'btn' => 'Vytvoriť', 'story' => new Story()]);
})->middleware('auth');
Route::get('/admin/upravit-pribeh', [StoryController::class, 'update'])->middleware('auth');

Route::delete('/admin', [StoryController::class, 'destroy'])->middleware('auth');

Route::post('/admin/pribeh', [StoryController::class, 'store'])->middleware('auth');
Route::post('/admin/login', [LoginController::class, 'authenticate']);

Route::put('/admin/upravit-pribeh', [StoryController::class, 'update'])->middleware('auth');

// Admin Album Routes
Route::middleware(['auth'])->group(function () {
    // Album management
    Route::get('/admin/albums', [App\Http\Controllers\AlbumController::class, 'indexAdmin']);
    Route::get('/admin/album/create', [App\Http\Controllers\AlbumController::class, 'create']);
    Route::post('/admin/album', [App\Http\Controllers\AlbumController::class, 'store']);
    Route::get('/admin/albums/edit', [App\Http\Controllers\AlbumController::class, 'update']);
    Route::put('/admin/albums/edit', [App\Http\Controllers\AlbumController::class, 'update']);
    Route::delete('/admin/albums/delete', [App\Http\Controllers\AlbumController::class, 'destroy']);
    
    // Album images management
    Route::get('/admin/albums/{id}/images', [App\Http\Controllers\AlbumController::class, 'showImages']);
    Route::post('/admin/albums/{id}/images/upload', [App\Http\Controllers\AlbumController::class, 'uploadImages']);
    Route::put('/admin/albums/{id}/images/{imageId}', [App\Http\Controllers\AlbumController::class, 'updateImage']);
    Route::delete('/admin/albums/{id}/images/{imageId}/delete', [App\Http\Controllers\AlbumController::class, 'deleteImage']);
});

Route::get('/dokumenty', function () {
    return view('documents');
});
Route::get('/galeria', [App\Http\Controllers\GalleryController::class, 'index']);
Route::get('/galeria/{id}', [App\Http\Controllers\GalleryController::class, 'show']);
Route::get('/galeria/{albumId}/image/{imageId}', [App\Http\Controllers\GalleryController::class, 'showImage']);
