@extends('layouts/user')

@section('title')
    Messages
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
                    <h3><span class="glyphicon glyphicon-envelope"></span> Direct Message</h3>
                    <hr>
                    <ul class="message-list" style="overflow-y: scroll; max-height: 500px;">
                        @if(count($messages) != 0)
                            @foreach($messages as $message)
                            <li style="margin-bottom: 5px;">
                                <a href="{{route('user-conversation', ['id' => $message['id']])}}" class="timeline-text message-item">
                                    <div class="row">
                                        <div class="col-xs-6 text-left">
                                            <div class="account-info">
                                                <img style="padding: 0px; " src="{{url('avatars/'.$message['avatar'])}}" class="img-thumbnail image-info"/>
                                                <div class="identity-info">
                                                    <h4 class="name-info">{{$message['full_name']}} {!! ($message['is_admin'])? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : '' !!}</h4>
                                                    <h5 class="id-info">{{'@'.$message['username']}}</h5>
                                                </div>
                                                <div class="message-last">
                                                    {{$message['message']}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            {{$message['created_at']}}
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        @else
                            <div class="alert alert-warning text-center">You Dont Have Any Message!!!</div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-additional')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection