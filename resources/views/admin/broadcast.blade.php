@extends('layouts.admin')

@section('title')
    Broadcast to all user
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
            <h3> Broadcast Message</h3>
            <hr>
            <form class="form-horizontal" method="POST" action="{{route('admin-broadcast-send')}}">
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="message" placeholder="write message ..." required="required"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <input type="submit" class="form-control btn-brawijaya" value="Send Message">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer-additional')

@endsection