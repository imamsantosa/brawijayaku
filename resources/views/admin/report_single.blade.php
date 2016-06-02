@extends('layouts.admin')

@section('title')
    Report from {{$data->reporter->full_name}}
@endsection

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-{{Session::get('status')}}" role="alert">
            <strong>{{Session::get('title')}}</strong><br/>
            <h5>{!! Session::get('message') !!}</h5>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h3> <a href="{{route('admin-list-report')}}" style="text-decoration: none; color: #333333"><span class="glyphicon glyphicon-chevron-left"></span> back</a> |  <span class="glyphicon glyphicon-exclamation-sign"></span> Report from {{$data->reporter->full_name}}</h3>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered" style="font-weight: bold">
                                <tr class="text-center">
                                    <td colspan="2">Reporter</td>
                                </tr>
                                <tr>
                                    <td >Username</td>
                                    <td >{{$data->reporter->username}}</td>
                                </tr>
                                <tr>
                                    <td >Full Name</td>
                                    <td><a role="button" style="color: black;" href="{{route('user-profile', ['username' =>$data->reporter->username])}}"> {{$data->reporter->full_name}}</a></td>
                                </tr>
                                <tr>
                                    <td>Date Report</td>
                                    <td>{{$data->created_at()}}</td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="2">Defendant</td>
                                </tr>
                                <tr>
                                    <td >Username</td>
                                    <td >{{$data->post->user->username}}</td>
                                </tr>
                                <tr>
                                    <td >Full Name</td>
                                    <td><a role="button" style="color: black;" href="{{route('user-profile', ['username' =>$data->post->user->username])}}"> {{$data->post->user->full_name}}</a></td>
                                </tr>
                                <tr>
                                    <td>Url</td>
                                    <td><a href="{{route('admin-post-single', $data->post->id)}}">{{route('admin-post-single', $data->post->id)}}</a></td>
                                </tr>
                                <tr>
                                    <td>Caption</td>
                                    <td>{{$data->post->caption}}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><img src="{{url('images/'.$data->post->id.'.jpg')}}" class="img-thumbnail"></td>
                                </tr>
                                <tr>
                                    <td>Reason</td>
                                    <td>{{$data->reason}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{($data->status === 0)? 'Waiting' : (($data->status === 1)? 'Confirm' : 'Reject')}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <form action="{{route('admin-action-report')}}" method="POST">
                                <input type="hidden" name="type" value="confirm">
                                <input type="hidden" name="report_id" value="{{$data->id}}">
                                <input type="submit" class="btn btn-primary btn-grey btn-block" value="Confirm Report">
                            </form>
                        </div>
                        <div class="col-xs-4">
                            <form action="{{route('admin-action-report')}}" method="POST">
                                <input type="hidden" name="type" value="reject">
                                <input type="hidden" name="report_id" value="{{$data->id}}">
                                <input type="submit" class="btn btn-primary btn-grey btn-block" value="Reject Report">
                            </form>
                        </div>
                        <div class="col-xs-4">
                            <a href="{{route('user-conversation', ['id' => $data->post->user->id])}}" role="button" class="btn btn-primary btn-grey btn-block">Send Message</a>
                        </div>
                    </div>
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