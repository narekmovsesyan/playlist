<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Player</title>
        <link rel="icon"
              type="image/png"
              href="{{asset('images/default/icon.ico')}}">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/header.css" type="text/css">


    </head>
    <body>
        <div class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
                <div class="container">
                    <a class="navbar-brand header-text" href="{{env('APP_URL')}}" >Music Player
                        <img src="images/default/audioblack.svg" alt="icon">
                    </a>

                    <div style="float:right">
                        <a class="navbar-brand header-text" href="/login">Login</a>
                        <a class="navbar-brand header-text" href="/register">Register</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading col-sm-12 col-md-12" id="headStyleMenu">
                                        <div class="col-sm-8 col-md-8">
                                        <span class="genre-list">
                                              Genre List
                                          </span>
                                            </h4>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                          <span>
                                              Points
                                          </span>
                                            </h4>
                                        </div>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <ul class="list-group table">
                                          @foreach($all_genres as $genre)
                                                <li>
                                                    <span class="col-sm-4 col-md-4 font-weight-bold"><strong>{{ $genre->title }}</strong></span>
                                                    <span class="col-sm-3 col-md-3 font-weight-light">all {{ $genre->songs_count }}</span>
                                                    <div class="form-group col-sm-5 col-md-5">
                                                        <select class="form-control checked-genre" data-id="{{$genre->id}}"  id="{{$genre->id}}_select">
                                                            <option>0</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>
                                                </li>
                                            @endforeach
                                              <button type="submit" class="btn btn-default center-block save-playlist">Save Playlist</button>
                                        </ul>
                                        <p class="error-info text-center">Please select Genre</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <video class="my_video" id="video" controls width="520" height="250">

                                    </video>
                                </div>
                                <button type="button" id="buttonFfw" class="btn center-block">
                                    <i class="fa fa-fast-forward"></i>
                                </button>
                            </div>

                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-heading" id="headStyleList">Music Playlist</div>
                                <div class="panel-body panel-scroll">
                                    <div class="music-list">
                                        <ul class="list-group list-group-flush all-songs-ul">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/savePlaylist.js') }}"></script>
    </body>
</html>

