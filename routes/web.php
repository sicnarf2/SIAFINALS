<?php

use App\Http\Controllers\SongAlbumController;
use App\Models\SongAlbum;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/home', function() {
    return view('home');
});

Route::get('/song_album', function() {
    return view('song_album');
});

Route::get('/song_album', [SongAlbumController::class, 'index']);
Route::get('/song_album/csv-all', [SongAlbumController::class, 'generateCSV']);
Route::get('/song_album/pdf', [SongAlbumController::class, 'generatePDF']);

Route::post('/song_album/import', [SongAlbumController::class, 'importCsv'])->name('song_album.import');
Route::get('/song_album', [SongAlbumController::class, 'index'])->name('song_album');
