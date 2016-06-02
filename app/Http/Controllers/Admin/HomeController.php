<?php

namespace App\Http\Controllers\Admin;

use App\Friendship;
use App\Http\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $result = Post::orderBy('id', 'desc')
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

        return view('admin.home')->with(['posts'=>$posts]);
    }
}