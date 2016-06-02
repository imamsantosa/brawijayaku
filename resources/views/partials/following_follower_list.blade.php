<div class="modal fade modal-following" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" style="margin: 80px auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Following List</h4>
            </div>
            <div class="modal-body" style="overflow-y: scroll; max-height: 350px;">
                @if(count($data['following_list']) != 0)
                    @foreach($data['following_list'] as $following)
                        <div style="margin-bottom: 12px;" class="row">
                            <div class="col-xs-8">
                                <div class="timeline-text">
                                    <div class="account-info">
                                        <img src="{{url($following['avatar'])}}" class="img-thumbnail image-info"/>
                                        <div class="identity-info">
                                            <a href="{{route('user-profile', ['username' => $following['username']])}}" role="button"><h4 class="name-info">{{$following['full_name']}} {!! ($following['is_admin'])? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : '' !!}</h4></a>
                                            <a href="{{route('user-profile', ['username' => $following['username']])}}" role="button"><h5 class="id-info">{{'@'.$following['username']}}</h5></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4" id="btn-action-list">
                                @if($following['id'] !== auth()->user()->id)
                                    <a role="button" data-id-user="{{$following['id']}}" style="{{($following['is_followed'])? 'display:none;' : ''}}" class="btn btn-primary btn-grey btn-block list-btn-follow">Follow</a>
                                    <a role="button" data-id-user="{{$following['id']}}" style="{{(!$following['is_followed'])? 'display:none;' : ''}} margin-top: 0px; " class="btn btn-primary btn-grey btn-block list-btn-unfollow"><span>Following</span></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning">This account don't following any user</div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-follower" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" style="margin: 80px auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Follower List</h4>
            </div>
            <div class="modal-body">
                @if(count($data['follower_list']) != 0)
                    @foreach($data['follower_list'] as $follower)
                        <div style="margin-bottom: 12px;" class="row">
                            <div class="col-xs-8">
                                <div class="timeline-text">
                                    <div class="account-info">
                                        <img src="{{url($follower['avatar'])}}" class="img-thumbnail image-info"/>
                                        <div class="identity-info">
                                            <a href="{{route('user-profile', ['username' => $follower['username']])}}" role="button"><h4 class="name-info">{{$follower['full_name']}} {!! ($follower['is_admin'])? '<span style="font-size: 45%;" class="label label-primary">Admin</span>' : '' !!}</h4></a>
                                            <a href="{{route('user-profile', ['username' => $follower['username']])}}" role="button"><h5 class="id-info">{{'@'.$follower['username']}}</h5></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4" id="btn-action-list">
                                @if($follower['id'] !== auth()->user()->id)
                                    <a role="button" data-id-user="{{$follower['id']}}" style="{{($follower['is_followed'])? 'display:none;' : ''}}" class="btn btn-primary btn-grey btn-block list-btn-follow">Follow</a>
                                    <a role="button" data-id-user="{{$follower['id']}}" style="{{(!$follower['is_followed'])? 'display:none;' : ''}} margin-top: 0px; " class="btn btn-primary btn-grey btn-block list-btn-unfollow"><span>Following</span></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning">This account don't following any user</div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.following-btn').on('click', function (e) {
        e.preventDefault();
        $('.modal-following').modal('show');
    })

    $('.follower-btn').on('click', function (e) {
        e.preventDefault();
        $('.modal-follower').modal('show');
    });

    $('.list-btn-follow').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id-user");
        var node = $(this).closest('#btn-action-list');

        $.ajax({
            method: 'POST',
            url: "{{ route('api-user-follow') }}",
            data: "friend_id=" + id
        })
        .done(function (msg) {
            var resp = msg;
            if (!resp.error) {
                node.find('.list-btn-follow').hide();
                node.find('.list-btn-unfollow').show();
            }
        });
    })

    $('.list-btn-unfollow').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id-user");
        var node = $(this).closest('#btn-action-list');
        $.ajax({
            method: 'POST',
            url: "{{ route('api-user-unfollow') }}",
            data: "friend_id=" + id
        })
        .done(function (msg) {
            var resp = msg;
            if (!resp.error) {
                node.find('.list-btn-unfollow').hide();
                node.find('.list-btn-follow').show();
            }
        });
    })
</script>