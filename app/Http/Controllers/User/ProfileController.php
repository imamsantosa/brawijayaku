<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/18/16
 * Time: 17:25
 */

namespace App\Http\Controllers\User;

use App\Friendship;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request, $username)
    {
        if(auth()->user()->username == $username)
            return $this->self();
        else
            return $this->profile($username);
    }

    private function self()
    {
        $data = [
            'post_count' => auth()->user()->post->count(),
            'follower_count' => auth()->user()->followerCount(),
            'following_count' => auth()->user()->followingCount(),
            'follower_list' => $this->listFollower(auth()->user()->id),
            'following_list' => $this->listFollowing(auth()->user()->id),
            'posts' => auth()->user()->post
        ];

        return View('user/profile_self', ['data' => $data, ]);
    }

    private function profile($username)
    {
        $result = User::where('username', $username)->first();
        if($result == null) return redirect()->route('user-home');
        
        $data = [
            'is_followed' => $result->isFollowed(),
            'follower_count' => $result->followerCount(),
            'following_count' => $result->followingCount(),
            'post_count' => $result->post->count(),
            'identity' => $result,
            'follower_list' => $this->listFollower($result->id),
            'following_list' => $this->listFollowing($result->id),
            'posts' => $result->post
        ];

        return View('user/profile_someone', ['data' => $data]);
    }

    private function listFollower($id)
    {
        $data = Friendship::where('friend_id', $id)->get();

        $list = $data->map(function($d){
            return [
                'id' => $d->user->id,
                'is_followed' => $d->user->isFollowed(),
                'full_name' => $d->user->full_name,
                'avatar' => '/avatars/'.$d->user->avatar,
                'username' => $d->user->username,
                'is_admin' => $d->user->is_admin
            ];
        });

        return $list;
    }

    private function listFollowing($id)
    {
        $data = Friendship::where('user_id', $id)->get();

        $list = $data->map(function($d){
            return [
                'id' => $d->friend->id,
                'is_followed' => $d->friend->isFollowed(),
                'full_name' => $d->friend->full_name,
                'avatar' => '/avatars/'.$d->friend->avatar,
                'username' => $d->friend->username,
                'is_admin' => $d->friend->is_admin

            ];
        });

        return $list;
    }
}