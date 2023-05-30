<?php

use App\Models\Audio;
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
Route::get('login', function() {
    return '';
})->name('login');

// Route::get('test', function () {

//     $me = \App\Models\User::firstOrCreate([
//         'email' => 'me@z2z.kz',
//     ], [
//         'password' => '9293',
//     ]);

//     $audio = Audio::firstOrCreate([
//         'name' => 'Test youtube video',
//         'source' => 'youtube',
//         'source_id' => 'youtube_video_id',
//     ]);

//     $me->audios()
//         ->sync([$audio->id]);

//     $playlist = $me
//         ->playlists()
//         ->firstOrCreate([
//             'name' => 'Favorites',
//         ]);

//     $playlist->userAudios()
//         ->sync($me->userAudios);

//     dd($me->audios);
// });
