@extends('layouts/user')

@section('title')
    {{ auth()->user()->full_name }} | RailPicture.id
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
                    <div class="timeline-text">
                        <div class="account-info">
                            <img src="{{url('avatars/'.auth()->user()->avatar)}}" class="img-thumbnail image-info"/>
                            <div class="identity-info">
                                <h4 class="name-info">{{auth()->user()->full_name}} {!! (auth()->user()->is_admin)? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : '' !!}</h4>
                                <h5 class="id-info">{{'@'.auth()->user()->username}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="timeline-text">
                        {{auth()->user()->status_message}}
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 12px">
                <div class="col-md-4 col-xs-4">
                    <a role="button" class="btn btn-primary btn-brawijaya btn-block">{{ $data['post_count'] }} Posts</a>
                </div>
                <div class="col-md-4 col-xs-4">
                    <a role="button" class="btn btn-primary btn-brawijaya btn-block following-btn">{{ $data['following_count'] }} Following</a>
                </div>
                <div class="col-md-4 col-xs-4">
                    <a role="button" class="btn btn-primary btn-brawijaya btn-block follower-btn">{{ $data['follower_count'] }} Follower{{($data['follower_count'] >= 2)? 's':''}}</a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.photo_list_profile')
@endsection

@section('footer-additional')
    @include('partials.following_follower_list')

    <script>
        $(document).ready(function(){

        });
    </script>
@endsection