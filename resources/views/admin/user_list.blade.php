@extends('layouts.admin')

@section('title')
    User Lists
@endsection

@section('content')
    @if(Session::has('error'))
        <div class="alert alert-{{Session::get('error')}}" role="alert">
            <strong>{{Session::get('title')}}</strong><br/>
            <h5>{!! Session::get('message') !!}</h5>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>User List</h3>
                    <hr>
                    <div class="lists-user" style="overflow-y: scroll; max-height: 500px;">
                        @foreach($users as $user)
                            <div style="margin-bottom: 12px;" class="row">
                                <div class="col-xs-9">
                                    <div class="timeline-text">
                                        <div class="account-info">
                                            <img src="{{url('/avatars/'.$user->avatar)}}" class="img-thumbnail image-info"/>
                                            <div class="identity-info">
                                                <a href="{{route('user-profile', ['username' => $user->username])}}" role="button"><h4 class="name-info">{{$user->full_name}} {!! ($user->is_admin)? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : '' !!}</h4></a>
                                                <a href="{{route('user-profile', ['username' => $user->username])}}" role="button"><h5 class="id-info">{{'@'.$user->username}}</h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3" id="btn-action-list">
                                    @if(auth()->user()->id !== $user->id)
                                        <a role="button" data-id-user="{{$user->id}}" class="btn btn-primary btn-brawijaya btn-grey btn-block delete-btn"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-additional')
    <script>
        $(document).ready(function () {
            $('.delete-btn').on('click', function (e) {
                e.preventDefault();
                var element = $(this);
                if(confirm("Are you sure to remove this user?")){
                    $.ajax({
                        method: 'POST',
                        url: "{{route('api-delete-user')}}",
                        data: "user_id="+element.attr('data-id-user')
                    }).done(function (msg) {
                        var res = msg;
                        if(!res.error){
                            element.closest('.row').remove();
                        }
                    })
                }
            })
        })
    </script>
@endsection