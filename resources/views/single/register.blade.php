<!DOCTYPE html>
<html>

<head>
    <title>Register | Brawijayaku</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{ url('assets/lib/datepicker/css/datepicker.css') }} ">
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
            <h1 style="text-align: center;">Register</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{route('auth_register')}}">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="BirthDate" name="birthdate" id="birthdate" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="email" class="form-control" placeholder="Email" name="email" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Full Name" name="full_name" required="required">
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <div class="col-md-12 ">
                                <input type="submit" class="form-control btn" value="Register" style="background-color: green;color: white;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row interaction text-center">
        <div class="col-md-offset-4 col-md-4 col-xs-offset-4 col-xs-4">
            <a href="{{route('login')}}" role="button">Already Register?</a>
        </div>
    </div>

</div>

<script type="text/javascript" src="{{url('assets/js/jquery-1.12.3.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src=" {{ url('assets/lib/datepicker/js/bootstrap-datepicker.js') }} " ></script>
<script>
    $( document ).ready(function() {
        $('#birthdate').datepicker({
            format: "yyyy-mm-dd"
        }).on('changeDate', function(ev) {
            $('#birthdate').datepicker('hide');
        });
    });
</script>
</body>
</html>