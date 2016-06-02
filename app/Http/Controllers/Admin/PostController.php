<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/31/16
 * Time: 18:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function single(Request $request, $id)
    {
        $post = Post::find($id);

        if($post == null)
            return redirect()->route('user-home');

        $result = [
            'post_id' => $post->id,
            'username' => $post->user->username,
            'full_name' => $post->user->full_name,
            'avatar' => $post->user->avatar,
            'caption' => $post->caption,
            'isLiked' => $post->isLiked(),
            'likeCount' => $post->like->count(),
            'commentCount' => $post->comment->count(),
            'created_at' => $post->created_at(),
            'datetime' => $post->created_at->toDateTimeString(),
            'comments' => $post->comments()
        ];

        return View('user/single_post_admin', ['post' => $result]);
    }
}