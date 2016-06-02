<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/18/16
 * Time: 16:47
 */

namespace App\Http\Controllers\UserApi;


use App\Repositories\UserApi\PostRepository;

class PostController extends BaseController
{
    protected $repository;

    public function __construct(PostRepository $repo)
    {
        $this->repository = $repo;
    }

    public function delete()
    {
        return $this->respond($this->repository->delete());
    }

    public function editCaption()
    {
        return $this->respond($this->repository->editCaption());
    }
}