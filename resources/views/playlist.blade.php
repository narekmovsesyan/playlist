@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center players-title">My playlists</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if(count($user_playlists) > 1)
                                    @foreach($user_playlists as $playlist)
                                        @if(empty($playlist->background))
                                            <div class="float-left playlist-div mb-1">
                                                <img class="playlist-background img-responsive center-block"  src="images\default\default-album-110x110.jpg" alt="avatar">
                                                <h5 class="text-info playlist-font-family" style="font-family:fantasy">{{$playlist->title}}</h5>
                                                <a href="playlists/{{$playlist->id}}" class="a-text-decor">Show Playlist</a>
                                            </div>
                                        @else
                                            <div class="float-left playlist-div mb-1">
                                                <img class="playlist-background img-responsive center-block" src="images\playlist\backgrounds\{{$playlist->background}}" alt="playlist">
                                                <h5 class="text-info playlist-font-family">{{$playlist->title}}</h5>
                                                <a href="playlists/{{$playlist->id}}" class="a-text-decor">Show Playlist</a>
                                            </div>
                                        @endif
                                    @endforeach
                                @elseif(count($user_playlists) == 1)
                                    @if(empty($user_playlists[0]->background))
                                        <div class="float-left playlist-div mb-1">
                                            <img class="playlist-background img-responsive center-block"  src="images\default\default-album-110x110.jpg" alt="avatar">
                                            <h5 class="text-info playlist-font-family">{{$user_playlists[0]->title}}</h5>
                                            <a href="playlists/{{$user_playlists[0]->id}}" class="a-text-decor 4">Show Playlist</a>
                                        </div>
                                    @else
                                        <div class="float-left playlist-div mb-1">
                                            <img  src="images\playlist\backgrounds\{{$user_playlists[0]->background}}" alt="playlist" class="playlist-background">
                                            <h5 class="text-info playlist-font-family">{{$user_playlists[0]->title}}</h5>
                                            <a href="playlists/{{$user_playlists[0]->id}}" class="a-text-decor 5">Show Playlist</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header  text-center players-title">Create new playlists</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 m-lg-4">
                                <form class="form-inline center-block"  method="POST" action="/playlists" enctype="multipart/form-data">
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control m-lg-2" placeholder="Playlist Name" name="title">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="file" name="image" class="form-control m-lg-2" placeholder="playlist image">
                                    </div>
                                    <div class="float-right">
                                        <button type="submit"  class="btn btn-primary">Create new playlist</button>
                                        {{ csrf_field() }}
                                    </div>
                                </form>
                                @if ($errors->has('title'))
                                    <div class="alert-danger col-md-3 m-lg-2" style="font-size: 16px">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
