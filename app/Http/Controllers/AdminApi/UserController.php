<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/31/16
 * Time: 16:56
 */

namespace App\Http\Controllers\AdminApi;

use App\Repositories\AdminApi\UserRepository;

class UserController extends BaseController
{
    private $repo;
    
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function delete()
    {
        return $this->respond($this->repo->delete());
    }
}