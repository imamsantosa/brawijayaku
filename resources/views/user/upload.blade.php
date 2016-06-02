@extends('layouts/user')

@section('title')
    Upload Image | RailPicture.id
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
                    <h3> Upload Image</h3>
                    <hr>
                    <form class="form-horizontal" action="{{route('user-upload_proses')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="file" name="image" id="image" required="required" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <img src="" id="image-preview" class="img-thumbnail" style="display: none;">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="caption" placeholder="Write a caption ..." required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <input type="submit" class="form-control btn-brawijaya" value="Post">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer-additional')
    <script>
        $(document).ready(function(){
            function readImage(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image-preview').show();
                        $('#image-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image").on('change', function(){
                readImage(this);
            });
        });
    </script>
@endsection