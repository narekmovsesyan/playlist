<?php

namespace App\Http\Requests;

use App\Playlist;
use App\PlaylistSong;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSongUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Checks whether the person who is deleting the song is the owner of the song or not
     * @return bool
     */
    public function authorize()
    {
        $playlist_id = $this->playlistId;
        $check_song_id = [];
        $check_playlist = [];
        $songs_id = $this->songsId;

        foreach($songs_id as $song){
            $result = PlaylistSong::where([['playlist_id', '=',$playlist_id],
                                           ['song_id', '=',$song]])->get();
            if (count($result) > 0) {
                $check_song_id[] = $result;
            }

        }

        if(count($check_song_id) == count($songs_id)){
            foreach ($check_song_id as $song_id){

                $auth_user_playlists = Auth::user()->userPlaylists()->get();
                $song_playlist_id = $song_id->first()->playlist_id;
                $playlist_creator = Playlist::find($song_playlist_id)->user()->first();

                foreach ($auth_user_playlists as $playlist){
                    if ($playlist->creator_id == $playlist_creator->id) {
                        $check_playlist[] = 'true';
                    }
                }
            };

            if (count($check_playlist) == count($check_song_id)) {
                return true;
            }
        } else {
            $authorize_error  = 'Something went wrong';
            return view('user_playlist_songs', compact('authorize_error'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
