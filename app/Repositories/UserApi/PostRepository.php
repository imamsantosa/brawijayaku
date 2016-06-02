<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/18/16
 * Time: 16:48
 */

namespace App\Repositories\UserApi;


use App\Post;
use Illuminate\Http\Request;

class PostRepository
{
    private $request;
    private $post;

    public function __construct(Request $request, Post $post)
    {
        $this->post    = $post;
        $this->request = $request;
    }

    public function delete()
    {
        $delete = $this->post
            ->find($this->request->input('post_id'));

        $delete->delete();

        return ['error' => false, 'message' => 'sukses menghapus post'];
    }

    public function editCaption()
    {
        $post = $this->post->find($this->request->input('post_id'));
        $post->update([
            'caption' => $this->request->input('caption')
        ]);

        return ['error' => false, 'message'=>'sukses mengubah caption', 'new_caption' => $post->caption];
    }
}