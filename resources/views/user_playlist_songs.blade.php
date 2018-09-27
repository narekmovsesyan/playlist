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
                                @if(empty($playlist->background))
                                    <div class="float-left playlist-div mb-1">
                                        <img class="playlist-background img-responsive center-block"  src="{{asset('images\default\default-album-110x110.jpg')}}" alt="avatar">
                                        <h5 class="text-info playlist-font-family">{{$playlist->title}}</h5>
                                    </div>
                                @else
                                    <div class="float-left playlist-div mb-1">
                                        <img  src="{{asset('images\playlist\backgrounds\\'.$playlist->background)}}" alt="playlist" class="playlist-background">
                                        <h5 class="text-info playlist-font-family">{{$playlist->title}}</h5>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header  text-center players-title">All songs</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success addMusic">Add selected in playlist</button>
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
                                        <tr data-id="{{$song->id}}">
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


