@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center players-title">My playlists</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <div class="col-md-12 m-lg-4">
                                        <form class="form-inline center-block"  method="POST" action="/playlists" enctype="multipart/form-data">
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control m-lg-2 multiple-delete-style" placeholder="Song Title" name="title">
                                            </div>
                                            <div class="col-xs-3">
                                                <select class="form-control checked-genre multiple-delete-style" {{--data-id="{{$genre->id}}"  id="{{$genre->id}}_select"--}}>
                                                    @foreach($genres as $genre)
                                                        <option>{{$genre->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="file" name="image" class="form-control m-lg-2 multiple-delete-style">
                                            </div>
                                            <div class="float-right col-xs-3">
                                                <button type="submit" class="btn multiple-delete multiple-delete-style">
                                                    Songs multiple delete
                                                </button>
                                                {{ csrf_field() }}
                                            </div>
                                        </form>
                                        @if ($errors->has('title'))
                                            <div class="alert-danger col-md-3 m-lg-2" style="font-size: 16px">{{$errors->first('title')}}</div>
                                        @endif
                                    </div>
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
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
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


