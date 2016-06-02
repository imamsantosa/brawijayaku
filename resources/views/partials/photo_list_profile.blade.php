<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            @if(count($data['posts']) !== 0)
            @foreach($data['posts'] as $post)
            <div class="col-xs-4 image-item">
                <a role="button" href="{{route('user-post-single', ['id' => $post->id]) }}">
                    <img src="{{ url('images/'.$post->id.'.jpg') }}" class="img-thumbnail image-profile">
                    <div class="description-image-profil">
                        <div class="row text-center" style="margin-top: 20px;">
                            <div class="col-xs-12">
                                <p>{{ $post->caption }}</p>
                            </div>
                            <div class="col-xs-12">
                                <p><span class="glyphicon glyphicon-star"></span> {{$post->like->count()}} {{($post->like->count() <= 1)? 'Star' : 'Stars'}} </p>
                            </div>
                            <div class="col-xs-12">
                                <p><span class="glyphicon glyphicon-comment"></span> {{$post->comment->count()}} {{($post->comment->count() <= 1)? 'Comment' : 'Comments'}} </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
                <div class="col-xs-12">
                    <div class="alert alert-warning text-center">Not yet any post</div>
                </div>
            @endif
        </div>
    </div>
</div>