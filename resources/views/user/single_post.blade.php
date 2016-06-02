@extends('layouts.user')

@section('title')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row" data-postId="{{$post['post_id']}}">
                <div class="col-md-12 col-xs-12 text-center" id="image-post">
                    <img src="{{url('images/'.$post['post_id'].'.jpg')}}" class="img-thumbnail">
                </div>
                <div class="col-md-12 col-xs-12 action">
                    <div class="row text-center interaction">
                        <div class="col-md-3 col-xs-3" id="star-button">
                            <a role="button" style="{{ ($post['isLiked'])? 'display: none;' : '' }}" class="like-button"> <span class="glyphicon glyphicon-star-empty"></span> <span id="count-like">{{ $post['likeCount'] }} {{ ($post['likeCount'] <= 1)? 'Star' : 'Stars' }}</span></a>
                            <a role="button" style="{{ ($post['isLiked'])? '' : 'display: none;' }}" class="unlike-button"> <span class="glyphicon glyphicon-star"></span> <span id="count-unlike">{{ $post['likeCount']  }} {{  ($post['likeCount'] <= 1)? 'Star' : 'Stars' }}</span></a>
                        </div>
                        <div class="col-md-3 col-xs-3" id="report-button">
                            <a role="button" class="report-button"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-option-horizontal"></span> Options
                                <ul class="dropdown-menu">
                                    @if(auth()->user()->username == $post['username'])
                                        <li><a role="button" class="remove-button"><span class="glyphicon glyphicon-remove"></span> Delete</a></li>
                                        <li><a role="button" data-post-id="{{$post['post_id']}}" class="edit-caption-button"><span class="glyphicon glyphicon-pencil"></span> Edit Caption</a></li>

                                    @endif
                                    <li><a role="button" class="download-button" href="{{url('images/'.$post['post_id'].'.jpg')}}" download="{{md5(date('Y-m-d h:i:s').auth()->user()->username . $post['post_id']).'.jpg'}}"><span class="glyphicon glyphicon-download-alt"></span> Download</a></li>
                                </ul>
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <div class="time-creates">
                                {{$post['created_at']}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 post">
                    <hr>
                    <div class="timeline-text">
                        <div class="account-info">
                            <img src="{{url('avatars/'.$post['avatar'])}}" class="img-thumbnail image-info"/>
                            <div class="identity-info">
                                <h4 class="name-info"><a href="{{route('user-profile', ['username' => $post['username']])}}" role="button">{{$post['full_name']}}</a></h4>
                                <h5 class="id-info"><a href="{{route('user-profile', ['username' => $post['username']])}}" role="button"> {{'@'.$post['username']}} </a></h5>
                            </div>
                        </div>
                        <div class="status">
                            <p>{{$post['caption']}}</p>
                        </div>
                        <hr>
                        <div class="comment row">
                            @if(count($post['comments']) != 0)
                                @foreach($post['comments'] as $comment)
                                    <div class="comment-list col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-11">
                                                <div class="comment-name"><a href="{{route('user-profile', ['username' => $comment['username']])}}" role="button">{{'@'.$comment['username']}}</a> : </div>
                                                <div class="comment-content">{{$comment['comment']}} </div>
                                            </div>
                                            <div class="col-xs-1">
                                                @if($comment['username'] === auth()->user()->username )
                                                    <a class="delete-comment-btn" data-comment-id="{{$comment['id']}}" role="button"><span class="glyphicon glyphicon-remove"></span></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 comment-forms">
                    <div class="comment-form">
                        <form class="form-horizontal form-comment">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off" class="form-control comment-text" placeholder="Write Comment ....." name="comment">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-additional')
    <script>
        $(document).ready(function(){

            $('.like-button').on('click', function(event){
                var element = event.target.parentNode.parentNode.parentNode.parentNode.parentNode;
                var post_id = element.dataset['postid'];
                console.log(post_id);
                $.ajax({
                            method: 'POST',
                            url: "{{route('api-user-like')}}",
                            data: 'post_id='+post_id,
                        })
                        .done(function (msg) {
                            var res = msg;
                            if(!res.error){
                                $(element).find('.action').find('.interaction').find('.like-button').hide();
                                $(element).find('.action').find('.interaction').find('.unlike-button').show();
                                $(element).find('.action').find('.interaction').find('.unlike-button').find('#count-unlike').html(res.count_like);
                            }
                        });
            });

            $('.unlike-button').on('click', function(event){
                var element = event.target.parentNode.parentNode.parentNode.parentNode.parentNode;
                var post_id = element.dataset['postid'];
                console.log(element);
                $.ajax({
                            method: 'POST',
                            url: "{{route('api-user-unlike')}}",
                            data: 'post_id='+post_id,
                        })
                        .done(function (msg) {
                            var res = msg;
                            if(!res.error){
                                $(element).find('.action').find('.interaction').find('.unlike-button').hide();
                                $(element).find('.action').find('.interaction').find('.like-button').show();
                                $(element).find('.action').find('.interaction').find('.like-button').find('#count-like').html(res.count_like);
                            }
                        });
            });

            $('.form-comment').on('submit', function (event) {
                event.preventDefault();

                var element = event.target.parentNode.parentNode.parentNode;
                var post_id = element.dataset['postid'];
                var comment = $(this).find('.comment-text').val();
                console.log();
                if(post_id === undefined){

                } else {
                    $(this).find('.comment-text').val("");

                    $.ajax({
                        type: "POST",
                        url: "{{route('api-user-comment')}}",
                        data: "post_id="+post_id+"&comment="+comment,
                        success: function () {

                        },
                        error: function () {

                        }
                    }).done(function (msg) {
                        var res = msg;
                        if(!res.error){
                            $(element).find('.post').find('.timeline-text').find('.comment').append(addComment(res));
                        }
                    })
                }
            });

            function addComment(str){


                var a = '<div class="comment-list col-xs-12">'+
                        '<div class="row">'+
                        '<div class="col-xs-11">'+
                        '<div class="comment-name">';
                var b = '<a href="{{route('user-profile', '')}}/'+str.username+'" role="button">@'+str.username+'</a> : </div>';
                var c = '<div class="comment-content">'+str.comment+'</div>';
                var d = '</div>';
                var e = '<div class="col-xs-1">'+
                        '<a class="" role="button"><span class="glyphicon glyphicon-remove"></span></a>'+
                        '</div>'+
                        '</div>'+
                        '</div>';

                return a+b+c+d+e;
            }

            $('.remove-button').on('click', function (event) {
                var element = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                var post_id = element.dataset['postid'];
                var deleted = element.parentNode.parentNode;

                console.log(deleted);
                if(post_id !== undefined){
                    if(confirm("Are you sure to delete this image ?")){
                        $.ajax({
                            method: 'POST',
                            url: "{{route('api-user-delete-post')}}",
                            data: 'post_id='+post_id,
                        })
                        .done(function (msg) {
                            var res = msg;
                            if(!res.error){
                                window.location = "{{route('user-home')}}"
                            }
                        });
                    }
                }
            });

            $('.report-button').on('click', function(event){
                var element = event.target.parentNode.parentNode.parentNode.parentNode;
                var post_id = element.dataset['postid'];

                console.log(element);
                if(post_id !== undefined){
                    $('.report_post_id').val(post_id);
                    $('.modal-report').modal('show');
                }
            });

            $('.form-report').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: "{{route('api-user-send-report')}}",
                    data: $(this).serialize(),
                })
                .done(function (msg) {
                    var res = msg;
                    if(!res.error){
                        $('.form-report').hide();
                        $('.info-report').show();
                    }
                });
            })

            $('.delete-comment-btn').on('click', function (e) {
                e.preventDefault();
                var t = $(this);
                if(confirm("Are you sure to delete this comment ?")){
                    $.ajax({
                        method: 'POST',
                        url: "{{route('api-user-delete-comment')}}",
                        data: 'comment_id='+t.attr('data-comment-id'),
                    })
                    .done(function (msg) {
                        var res = msg;
                        if(!res.error){
                            t.closest('.comment-list').remove();
                        }
                    });
                }
            });

            $('.edit-caption-button').on('click', function (e) {
                e.preventDefault();
                var t = $(this);
                setTempCaptionElement(t);
                var old_caption = t.closest('.panel-body').find('.status p').text();
                $('.modal-ch-caption').find('.caption').val(old_caption);
                $('.modal-ch-caption').find('.post-id').val(t.attr('data-post-id'));
                $('.modal-ch-caption').modal('show');
            });

            var temp_caption_element;
            function setTempCaptionElement(element) {
                temp_caption_element = element;
            }

            $('.form-ch-caption').on('submit', function (e) {
                e.preventDefault();
                if(confirm("Are you sure to change caption?"))
                {
                    $.ajax({
                                method: 'POST',
                                url: "{{route('api-user-edit-caption')}}",
                                data: $(this).serialize(),
                            })
                            .done(function (msg) {
                                var res = msg;
                                if(!res.error){
                                    temp_caption_element.closest('.panel-body').find('.status p').text(res.new_caption);
                                    $('.modal-ch-caption').modal('hide');
                                }
                            });
                }
            })
        });
    </script>

    <div class="modal fade modal-report" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" style="margin: 190px auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Report Post</h4>
                </div>
                <form action="" method="POST" class="form-report">
                    <div class="modal-body">
                        <input type="hidden" value="" name="report_post_id" class="report_post_id">
                        <textarea class="form-control" placeholder="Reason..." rows="5" name="report_reason" required="required`    "></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary submt-btn" value="Send">
                    </div>
                </form>
                <div class="modal-body info-report" style="display: none;">
                    <div class="alert alert-success" >Sukses to report image. Thanks for contribute!!!</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-ch-caption" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" style="margin: 190px auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Caption</h4>
                </div>
                <form action="" method="POST" class="form-ch-caption">
                    <div class="modal-body">
                        <input type="hidden" value="" name="post_id" class="post-id">
                        <input type="text" value="" name="caption" class="form-control caption" placeholder="write caption..." required="required">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary submt-btn" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection