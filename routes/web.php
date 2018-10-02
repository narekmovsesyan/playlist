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


Route::get('/', 'IndexController@index');
Route::post('/store-playlist', 'IndexController@playlistDataAjax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user profile edit
Route::post('/edit-user-info', 'UserController@editInfo')->name('/edit-user-info');

//------------------------------Playlist-----------------------------------------
//user playlist
Route::resource('/playlists', 'PlaylistController');
Route::get('/add-music-in-playlist', 'PlaylistController@addMusicInPlaylist')->name('/add-music-in-playlist');
Route::get('/remove-music-from-playlist', 'PlaylistController@removeMusicFromPlaylist')->name('/remove-music-from-playlist');

//user playlist songs
Route::resource('/user-playlist-songs', 'UserSongsController');

//------------------------------Songs--------------------------------------------
//songs page
Route::resource('/songs', 'SongController');
