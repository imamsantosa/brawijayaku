<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/28/16
 * Time: 22:46
 */

namespace App\Http\Controllers\UserApi;


use App\Repositories\UserApi\PasswordRepository;

class PasswordController extends BaseController
{
    private $repo;
    
    public function __construct(PasswordRepository $repo)
    {
        $this->repo = $repo;
    }

    public function change()
    {
        return $this->respond($this->repo->changePassword());
    }
}