@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Profile</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1"></div>

                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your email:</label>
                                    <label class="control-label">{{$user_info->email}}</label>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Your name:</label>
                                    <label class="control-label">{{$user_info->name}}</label>
                                </div>
                                <div class="form-group label-floating footer">
                                    <button type="button" data-toggle="modal" data-target="#changeInfo" class="btn btn-primary btn-lg btn-block bottom-button">Change my profile info</button>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <div class="border-button avatar-position">
                                    @if($user_info->avatar != null)
                                        <img class="user-avatar" src="images\avatars\{{$user_info->avatar}}" alt="">
                                    @else
                                        <img class="user-avatar"  src="\images\default\avatar-icon2.png" alt="avatar">
                                    @endif
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="changeInfo" tabindex="-1" role="dialog" aria-labelledby="changeInfo" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Change My Profile Info</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST" action="/edit-user-info" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="userName">Name</label>
                                                    <input type="text" name="name" class="form-control" id="userName" placeholder="{{$user_info->name}}">
                                                    @if ($errors->has('name'))
                                                        <div class="alert-danger">{{$errors->first('name')}}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="userEmail">Email address</label>
                                                    <input type="email" name="email" class="form-control" id="userEmail" placeholder="{{$user_info->email}}">
                                                    @if ($errors->has('email'))
                                                        <div class="alert-danger">{{$errors->first('email')}}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="userPassword">Password</label>
                                                    <input type="password" name="password" class="form-control" id="userPassword" placeholder="">
                                                    @if ($errors->has('password'))
                                                        <div class="alert-danger">{{$errors->first('password')}}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="userPassword">Repeat Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" id="passwordConfirmation" placeholder="">
                                                    @if ($errors->has('password_confirmation'))
                                                        <div class="alert-danger">{{$errors->first('password_confirmation')}}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="userAvatar">Select Avatar</label>
                                                    <input type="file" name="image" id="userAvatar">
                                                </div>

                                                <button type="submit" id="saveChanges" class="btn btn-primary float-right">Save</button>
                                                {{ csrf_field() }}
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            @if (count($errors) > 0)
                $('#changeInfo').modal('show');
            @endif
        })

    </script>
@endsection
