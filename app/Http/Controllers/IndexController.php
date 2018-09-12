<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Song;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $all_genres = Genre::with('song')->get();

        foreach ($all_genres as $genre) {
            $genre['songs_count'] = count($genre->song);
        }

        return view('welcome', compact("all_genres"));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function playlistDataAjax(Request $request)
    {

        $count = 0;
        $songs_count = 0;
        $playlist_genre_count = count($request['playlist']);
        $all_points_count = 0;

        foreach ($request['playlist'] as $genre_list) {

            $all_genres = Genre::where('id', $genre_list['genre_id'])->with('song')->get();
            $songs_count += count($all_genres[0]->song);

            $genre_for_compaire = $request['playlist'][0]['points'];

            if ($genre_for_compaire == $genre_list['points']) {
                $count++;
            }

            $all_points_count += $genre_list['points'];
        }

        $str = file_get_contents(public_path('songs.json'));
        $json = json_decode($str, true);
        $music_playlist = [];
        $songs_small_count_error = false;

        if ($count == $playlist_genre_count) {
            $each_genre_percent = 100 / $playlist_genre_count;

            foreach ($request['playlist'] as $genre_list) {
                $songs_count_round = round(($songs_count * $each_genre_percent) / 100);
                $each_songs_data = Song::select('id')->where('genre_id', $genre_list['genre_id'])->inRandomOrder()->limit($songs_count_round)->get();

                foreach ($each_songs_data as $song_data) {
                    $music_playlist[] = $json[$song_data['id']];
                }
            }

        } else {

            $max_genre = 0;
            $max_genre_id = [];
            $all_songs_float_data = [];

            foreach ($request['playlist'] as $genre) {

                $each_gender_songs_count = $songs_count / $all_points_count;
                $selected_songs_count = $each_gender_songs_count * $genre['points'];

                $each_songs_data = Song::select('id')->where('genre_id', $genre['genre_id'])->inRandomOrder()->limit(round($selected_songs_count))->get();
                $all_songs_float_data[$genre['genre_id']] = $selected_songs_count;

                foreach ($each_songs_data as $song_data) {
                    $music_playlist[] = $json[$song_data['id']];
                }
            }

            $count_music_playlist = count($music_playlist);
            $max_keys = [];

            if ($count_music_playlist !== $songs_count) {
                $music_playlist = [];
                $difference_songs = $songs_count - $count_music_playlist - 1;

//version 1
                if ($difference_songs == 1) {
                    $max_key = $this->getMax($all_songs_float_data);

                    foreach ($request['playlist'] as $genre) {

                        $each_gender_songs_count = $songs_count / $all_points_count;
                        $selected_songs_count = $each_gender_songs_count * $genre['points'];

                        if ($genre['genre_id'] == $max_key) {
                            $each_songs_data = Song::select('id')->where('genre_id', $genre['genre_id'])->inRandomOrder()->limit(round($selected_songs_count) + 1)->get();
                            if (count($each_songs_data) !== round($selected_songs_count) + 1) {
                                $songs_small_count_error = true;
                            }
                        } else {
                            $each_songs_data = Song::select('id')->where('genre_id', $genre['genre_id'])->inRandomOrder()->limit(round($selected_songs_count))->get();
                            if (count($each_songs_data) !== round($selected_songs_count)) {
                                $songs_small_count_error = true;
                            }
                        }

                        foreach ($each_songs_data as $song_data) {
                            $music_playlist[] = $json[$song_data['id']];
                        }
                    }
//version 2
                } else if (($difference_songs > $playlist_genre_count) && ($difference_songs % 2) == 0) {

                    $add_in_each_data = $difference_songs / $playlist_genre_count;

                    foreach ($request['playlist'] as $genre) {

                        $each_gender_songs_count = $songs_count / $all_points_count;
                        $selected_songs_count = $each_gender_songs_count * $genre['points'];

                        $each_songs_data = Song::select('id')->where('genre_id', $genre['genre_id'])->inRandomOrder()->limit(round($selected_songs_count) + $add_in_each_data)->get();
                        if (count($each_songs_data) !== round($selected_songs_count) + $add_in_each_data) {
                            $songs_small_count_error = true;
                        }

                        foreach ($each_songs_data as $song_data) {
                            $music_playlist[] = $json[$song_data['id']];
                        }
                    }
//version 3
                } else if (($difference_songs > $playlist_genre_count) && ($difference_songs % 2) == 1) {

                    $add_in_each_data = ($difference_songs - 1) / $playlist_genre_count;
                    $max_key = $this->getMax($all_songs_float_data);
                    $each_gender_songs_count = $songs_count / $all_points_count;

                    foreach ($request['playlist'] as $genre) {
                        $selected_songs_count = $each_gender_songs_count * $genre['points'];

                        if ($genre['genre_id'] == $max_key) {
                            $each_songs_data = Song::select('id')->where('genre_id', $genre['genre_id'])->inRandomOrder()->limit(round($selected_songs_count) + $add_in_each_data + 1)->get();
                            if (count($each_songs_data) !== round($selected_songs_count) + $add_in_each_data + 1) {
                                $songs_small_count_error = true;
                            }
                        } else {
                            $each_songs_data = Song::select('id')->where('genre_id', $genre['genre_id'])->inRandomOrder()->limit(round($selected_songs_count) + $add_in_each_data)->get();
                            if (count($each_songs_data) !== round($selected_songs_count) + $add_in_each_data) {
                                $songs_small_count_error = true;
                            }
                        }

                        foreach ($each_songs_data as $song_data) {
                            $music_playlist[] = $json[$song_data['id']];
                        }
                    }
//version 4
                } else {

                    for ($x = 0; $x < $difference_songs; $x++) {
                        $max_key = $this->getMax($all_songs_float_data);
                        $max_keys[] = $max_key;
                        unset($all_songs_float_data[$max_key]);
                    }

                    foreach ($request['playlist'] as $genre) {

                        $each_gender_songs_count = $songs_count / $all_points_count;
                        $selected_songs_count = $each_gender_songs_count * $genre['points'];

                        if(array_key_exists($genre['genre_id'], $max_keys)) {
                            $each_songs_data = Song::select('id')->where('genre_id', $genre['genre_id'])->inRandomOrder()->limit(round($selected_songs_count) + 1)->get();
                            if (count($each_songs_data) !== round($selected_songs_count) + 1) {
                                $songs_small_count_error = true;
                            }
                        } else {
                            $each_songs_data = Song::select('id')->where('genre_id', $genre['genre_id'])->inRandomOrder()->limit(round($selected_songs_count))->get();
                            if (count($each_songs_data) !== round($selected_songs_count)) {
                                $songs_small_count_error = true;
                            }
                        }

                        foreach ($each_songs_data as $song_data) {
                            $music_playlist[] = $json[$song_data['id']];
                        }
                    }
                }
            }

        }

        if (count($music_playlist) > 0) {
            return [
                'status' => 200,
                'message' => 'Playlist created successfully.',
                'music_playlist' => $music_playlist,
                'songs_count' => $songs_small_count_error
            ];
        } else {
            return [
                'status' => 400,
                'message' => 'Something went wrong'
            ];
        }
    }

    /**
     * @param $array
     * @return false|int|string
     */
    function getMax($array) {

        $value = max($array);

        $max_element_key = array_search($value, $array);

        return $max_element_key;
    }

}
