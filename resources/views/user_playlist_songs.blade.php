@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center players-title">My playlists</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                              @if($playlist)
                                @if(empty($playlist->background))
                                    <div class="float-left playlist-div mb-1">
                                        <img class="playlist-background img-responsive center-block"  src="{{asset('images\default\default-album-110x110.jpg')}}" alt="avatar">
                                        <h5 class="text-info playlist-font-family">{{$playlist->title}}</h5>
                                        <p class="text-info playlist-font-family">All songs {{count($playlist['playlistSongs'])}}</p>
                                    </div>
                                @else
                                    <div class="float-left playlist-div mb-1">
                                        <img  src="{{asset('images\playlist\backgrounds\\'.$playlist->background)}}" alt="playlist" class="playlist-background">
                                        <h5 class="text-info playlist-font-family">{{$playlist->title}}</h5>
                                        <p class="text-info playlist-font-family">All songs {{count($playlist['playlistSongs'])}}</p>
                                    </div>
                                @endif
                              @endif
                            </div>
                            <div class="col-md-10 row playlist-songs-list">
                                @if(count($playlist['playlistSongs']) > 1)
                                    @foreach($playlist['playlistSongs'] as $key => $song)
                                        @if($key <= count($playlist['playlistSongs'])/2)
                                        <div class="col-md-4">
                                            <p>
                                                <button type="submit" class="btn btn-danger" style="background-color: #f7bbb5;border: 1px solid #f7bbb5;">
                                                    -
                                                </button>
                                                {{$song['songs'][0]['title']}} {{$song['songs'][0]['singer']}}
                                            </p>
                                        </div>
                                        @else
                                            <div class="col-md-4">
                                                <p>
                                                    <button type="submit" class="btn btn-danger" style="background-color: #f7bbb5;border: 1px solid #f7bbb5;">
                                                        -
                                                    </button>
                                                    {{$song['songs'][0]['title']}} {{$song['songs'][0]['singer']}}
                                                </p>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  text-center players-title">All songs</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success addMusic">Add selected in playlist</button>
                                    <p class="alert alert-success successful col-md-12 players-title" role="alert">
                                        Added successfully
                                    </p>
                                </div>
                                <table id="example" class="dataTable uk-table uk-table-hover uk-table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Singer</th>
                                        <th>Genre</th>
                                        <th>Creator</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($songs as $song)
                                        <tr>
                                            <td></td>
                                            <td>{{$song->title}}</td>
                                            <td>{{$song->singer}}</td>
                                            <td>{{$song['genre']->title}}</td>
                                            <td>{{$song['creator']->name}}</td>
                                            <td>{{$song->id}}</td>
                                            <td>{{$playlist->id}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success addMusic">Add selected in playlist</button>
                                    <p class="alert alert-success successful col-md-12 players-title" role="alert">
                                        Added successfully
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/js/playlist-songs-datatable.js') }}"></script>
@endsection


