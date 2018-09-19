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

        return view('index', compact("all_genres"));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function playlistDataAjax(Request $request)
    {
        $playlist_genre_count = count($request['playlist']);

        $firstData = $this->collectNeededData($request['playlist']);
        $all_points_count = $firstData['all_points_count'];
        $count = $firstData['count'];
        $songs_count = $firstData['songs_count'];

        $json = $this->getJsonData();

        $music_playlist = [];
        $songs_small_count_error = false;
        $find_max = [];
        $max_array = [];
        $max_key = $this->getMax($request['playlist']);


        if ($count == $playlist_genre_count) {
            $each_genre_percent = 100 / $playlist_genre_count;
            $songs_count_round = round(($songs_count * $each_genre_percent) / 100);

            if (($count * $songs_count_round) > $songs_count) {
                $count_2 = ($count * $songs_count_round) - $songs_count;

                $low_end = 0;
                $arr_count = [];
                while($low_end < $count_2){
                    array_push($arr_count, $low_end++);
                }

                    foreach ($request['playlist'] as $genre_key => $genre_list) {

                        if (in_array($genre_key, $arr_count)) {
                            $each_songs_data = $this->selectEachGenreSongs($genre_list['genre_id'], $songs_count_round - 1);
                        } else {
                            $each_songs_data = $this->selectEachGenreSongs($genre_list['genre_id'], $songs_count_round );
                        }

                        foreach ($each_songs_data as $song_data) {
                            $music_playlist[] = $json[$song_data['id']];
                        }

                        if (count($music_playlist) > $songs_count) {
                            $missing_count = count($music_playlist) - $songs_count;

                            for ($x = 0; $x < $missing_count; $x++) {
                                $max_key = $this->getMax($request['playlist']);
                                $max_keys[] = $max_key;
                                unset($music_playlist[$max_key]);
                            }
                        }
                    }
            } else if (($count * $songs_count_round) < $songs_count) {
                $count_3 = $songs_count - ($count * $songs_count_round);

                $low_end = 0;
                $arr_count = [];
                while($low_end < $count_3){
                    array_push($arr_count, $low_end++);
                }

                foreach ($request['playlist'] as $genre_key => $genre_list) {
                    if (in_array($genre_key, $arr_count)) {
                        $each_songs_data = $this->selectEachGenreSongs($genre_list['genre_id'], $songs_count_round + 1);
                    } else {
                        $each_songs_data = $this->selectEachGenreSongs($genre_list['genre_id'], $songs_count_round);
                    }

                    foreach ($each_songs_data as $song_data) {
                        $music_playlist[] = $json[$song_data['id']];
                    }
                }

            } else {
                foreach ($request['playlist'] as $genre_key => $genre_list) {

                    $each_songs_data = $this->selectEachGenreSongs($genre_list['genre_id'], $songs_count_round);

                    foreach ($each_songs_data as $song_data) {
                        $music_playlist[] = $json[$song_data['id']];
                    }
                }
            }
        } else {

            $all_songs_float_data = [];

            foreach ($request['playlist'] as $genre) {

                $each_gender_songs_count = $songs_count / $all_points_count;
                $selected_songs_count = $each_gender_songs_count * $genre['points'];

                $count_for_select = round($selected_songs_count);
                $each_songs_data = $this->selectEachGenreSongs($genre['genre_id'], $count_for_select);

                $all_songs_float_data[$genre['genre_id']] = $selected_songs_count;

                if ($genre['genre_id'] == $max_key) {
                    foreach ($each_songs_data as $song_data) {
                        $first_key[] = count($music_playlist) - 1;
                        $music_playlist[] = $json[$song_data['id']];
                    }
                } else {
                    foreach ($each_songs_data as $song_data) {
                        $music_playlist[] = $json[$song_data['id']];
                    }
                }
            }

            if ((count($music_playlist) - $songs_count) == 1) {

                $music_playlist_last = [];
                $max_songs_array_data = array_slice($music_playlist, $first_key[0] + 1 , end($first_key) - $first_key[0] + 1);
                $cute_key = count($max_songs_array_data) - 1;

                foreach ($music_playlist as $music_key => $music_val) {
                    if ($music_key != $cute_key) {

                        $music_playlist_last[$music_key] = $music_val;
                    } else {
                        $cut[$music_key] = $music_val;
                    }
                }

                $music_playlist = [];
                $music_playlist = $music_playlist_last;
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
    function getMax($playlist) {

        foreach ($playlist as $key => $genre) {

            $find_max[$genre['genre_id']] = $genre['points'];
        }

        $value = max($find_max);
        $max_element_key = array_search($value, $find_max);

        return $max_element_key;
    }

    /**
     * @return mixed
     */
    function getJsonData(){

        $str = file_get_contents(public_path('songs.json'));
        $json = json_decode($str, true);

        return $json;
    }

    /**
     * @param $data
     * @return array
     */
    public function collectNeededData($dataPlaylist){

        $count = 0;
        $songs_count = 0;
        $all_points_count = 0;

        foreach ($dataPlaylist as $genre_list) {

            $all_genres = Genre::where('id', $genre_list['genre_id'])->with('song')->get();
            $songs_count += count($all_genres[0]->song);

            $genre_for_compaire = $dataPlaylist[0]['points'];

            if ($genre_for_compaire == $genre_list['points']) {
                $count++;
            }

            $all_points_count += $genre_list['points'];
        }




        return [
            'count' => $count,
            'songs_count' => $songs_count,
            'all_points_count' => $all_points_count
        ];
    }

    /**
     * @param $songs_count
     * @param $all_points_count
     * @param $genre_points
     * @return int
     */
    public function selectedSongsCount($songs_count, $all_points_count, $genre_points){

        $each_gender_songs_count = $songs_count / $all_points_count;
        $selected_songs_count = $each_gender_songs_count * $genre_points;

        return $selected_songs_count;
    }

    /**
     * @param $genre_id
     * @param $count
     * @return mixed
     */
    public function selectEachGenreSongs($genre_id, $count, $check_count = false, $songs_data = false){

        if ($check_count == false && $songs_data == false) {
            $each_songs_data = Song::select('id')->where('genre_id', $genre_id)->inRandomOrder()->limit($count)->get();
        }

        if ($songs_data) {
            $each_songs_data = $songs_data;

            $each_playlist = Song::select('id')->where('genre_id', $genre_id)->inRandomOrder()->limit($count)->get();

            foreach($each_playlist as $array)
            {
                $each_songs_data[] = $array->toArray();
            }

            $count = $check_count;
        }

        if (count($each_songs_data) != $count) {
            $missing_count = $count - count($each_songs_data);

            $this->selectEachGenreSongs($genre_id, $missing_count, $count, $each_songs_data);
        }

        return $each_songs_data;

    }
}
