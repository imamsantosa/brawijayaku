@extends('layouts.admin')

@section('title')
    List Report
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
                    <h3><span class="glyphicon glyphicon-exclamation-sign"></span> Report List</h3>
                    <hr>
                    <ul class="message-list" style="overflow-y: scroll; max-height: 500px;">
                        @if(count($reports) != 0)
                            @foreach($reports as $report)
                                <li style="margin-bottom: 5px;" class="{{($report->status === 1)? 'solved' : (($report->status === 0)? 'waiting' : 'reject')}}">
                                    <a href="{{route('admin-single-report', ['id' => $report->id])}}" class="timeline-text message-item">
                                        <div class="row">
                                            <div class="col-xs-6 text-left">
                                                <div class="account-info">
                                                    <img style="padding: 0px; " src="{{url('avatars/'.$report->reporter->avatar)}}" class="img-thumbnail image-info"/>
                                                    <div class="identity-info">
                                                        <h4 class="name-info">{{$report->reporter->full_name}} {!! ($report->reporter->is_admin)? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : '' !!}</h4>
                                                        <h5 class="id-info">{{'@'.$report->reporter->username}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                {{$report->created_at()}}
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <div class="alert alert-warning text-center">Reporting not found</div>
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