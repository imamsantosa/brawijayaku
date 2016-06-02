<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/17/16
 * Time: 19:12
 */

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\User;
use App\Friendship;
use App\Post;

class UserController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_admin) return redirect()->route('admin-home');

        $friend = Friendship::where('user_id', auth()->user()->id)
            ->get(['friend_id']);

        $result = Post::where('user_id', auth()->user()->id)
            ->orWhereIn('user_id', $friend)
            ->orderBy('id', 'desc')
            ->get();
        
        $posts= $result->map(function($post){
            return [
                'post_id' => $post->id,
                'username' => $post->user->username,
                'full_name' => $post->user->full_name,
                'is_admin' => $post->user->is_admin,
                'avatar' => $post->user->avatar,
                'caption' => $post->caption,
                'isLiked' => $post->isLiked(),
                'likeCount' => $post->like->count(),
                'commentCount' => $post->comment->count(),
                'created_at' => $post->created_at(),
                'datetime' => $post->created_at->toDateTimeString(),
                'comments' => $post->comments()
            ];
        });

        return view('user/home')->with(['posts'=>$posts]);
    }
}