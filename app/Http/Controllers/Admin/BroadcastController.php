<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/31/16
 * Time: 19:25
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function index()
    {
        return view('admin/broadcast');
    }

    public function send(Request $request)
    {
        $users = User::get();

        $send = $users->map(function($user)use($request){
            if($user->id != auth()->user()->id){
                $d = Message::create([
                    'sender_id' => auth()->user()->id,
                    'recipient_id' => $user->id,
                    'message' => $request->input('message')
                ]);
            }
        });

        return redirect()->route('admin-broadcast')
            ->with(['status' => 'success', 'title' => 'Success!!!', 'message' => 'Success to broadcast to all users']);
    }
}