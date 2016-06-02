<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/31/16
 * Time: 16:32
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function listUser()
    {
        $users = User::get();
        
        return view('admin/user_list', ['users' => $users]);
    }
}