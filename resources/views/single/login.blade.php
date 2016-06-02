<!DOCTYPE html>
<html>

<head>
    <title>Login | Brawijayaku</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('user-home')}}">Brawijayaku</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-md-offset-4 col-md-4">
            @if(Session::has('status'))
                <div class="alert alert-{{Session::get('status')}}" role="alert">
                    <strong>{{Session::get('title')}}</strong><br/>
                    <h5>{!! Session::get('message') !!}</h5>
                </div>
            @endif
        </div>
        <div class="col-md-offset-4 col-md-4">
            <h1 style="text-align: center;">Login</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{route('auth_login')}}">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" placeholder="Username" name="username" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" class="form-control" placeholder="Password" name="password" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <div class="col-md-12 ">
                                <div class="input-group" style="margin: 0px auto;">
                                    <input type="submit" class="form-control btn" value="Sign In" style="background-color: green;color: white;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row interaction text-center">
        <div class="col-md-offset-4 col-md-4 col-xs-offset-4 col-xs-4">
            <a href="{{route('register')}}" role="button">Sign Up</a>
        </div>
    </div>

</div>

<script type="text/javascript" src="{{url('assets/js/jquery-1.12.3.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/bootstrap.min.js')}}"></script>

</body>
</html>