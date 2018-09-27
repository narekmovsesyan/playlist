<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Song;
use App\PlaylistSong;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        $user_playlists = Playlist::where('creator_id', Auth::user()->id)->get();
        return view('playlist', compact('genres', 'user_playlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        $playlist_background = $request['image'];
        $playlist = new Playlist;
        $file_name = null;

        if (!is_null($playlist_background)) {
            $path = public_path('images/playlist/backgrounds');
            $file_name = time() . "_" . $playlist_background->getClientOriginalName();
            $playlist_background->move($path, $file_name);
        }

        $playlist->title = $request['title'];
        $playlist->creator_id = Auth::user()->id;
        $playlist->background = $file_name;
        $playlist->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlist = Playlist::find($id);
        $songs = Song::info()->get();

        return view('user_playlist_songs', compact('playlist', 'songs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     */
    public function addMusicInPlaylist(Request $request)
    {
        $songs_id = $request['songsId'];
        $playlist_id = $request['playlistId'];

        foreach ($songs_id as $song_id)
        {
            $songs[] = [
                'song_id' => $song_id,
                'playlist_id' => $playlist_id,
            ];
        }

        $result = PlaylistSong::insert($songs);

        if ($result) {
            return [
                'status' => 200,
                'message' => 'Songs added successfully.',
            ];
        } else {
            return [
                'status' => 400,
                'message' => 'Something went wrong'
            ];
        }
    }
}
