<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{(auth()->user()->is_admin)? route('admin-home') : route('user-home')}}">Brawijayaku</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" role="search" action="{{route('user-search')}}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="query">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="{{(auth()->user()->is_admin)? route('admin-home') : route('user-home')}}">Home <span class="sr-only"></span></a></li>
                    <li ><a href="{{route('user-upload_image')}}">Upload <span class="sr-only"></span></a></li>
                    <li ><a href="{{route('user-message')}}">Messages <span class="sr-only"></span></a></li>
                    @if(auth()->user()->is_admin)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Admin Control <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin-list-user')}}"><span class="glyphicon glyphicon-user"></span>  User List</a></li>
                            <li><a href="{{route('admin-list-report')}}"><span class="glyphicon glyphicon-exclamation-sign"></span>  Report List</a></li>
                            <li><a href="{{route('admin-broadcast')}}"><span class="glyphicon glyphicon-envelope"></span>  Broadcast Message to all users</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 12px">
                            <img src="{{url('avatars/'.auth()->user()->avatar)}}" class="img-rounded" style="width: 36px; height:26px;"> {{auth()->user()->full_name}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href={{ route('user-profile', ['username' => auth()->user()->username]) }}><span class="glyphicon glyphicon-user"></span>  Profile</a></li>
                            <li><a href="{{route('user-profile-edit')}}"><span class="glyphicon glyphicon-cog"></span>  Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('auth_logout')}}"><span class="glyphicon glyphicon-off"></span>  Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
