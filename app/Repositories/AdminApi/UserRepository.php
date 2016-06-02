<?php

namespace App\Repositories\AdminApi;


use App\User;
use Illuminate\Http\Request;

class UserRepository
{
    private $user;
    private $request;

    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    public function delete()
    {
        $remove = $this->user->find($this->request->input('user_id'));

        $remove->delete();

        return ['error' => false, 'message' => 'sukses menghapus user'];
    }
}