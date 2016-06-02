<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/30/16
 * Time: 22:42
 */

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function change(Request $request)
    {
        $dest = public_path() . '/avatars/';
        $file = $request->file('image');

        if(!substr($file->getMimeType(), 0, 5) == 'image')
            return redirect()->route('user-profile-edit')->with(['status' => 'danger','title' => 'Whoops!!', 'message'=>'Failed to upload Avatar. Please Try Again']);

        $filename = md5(date('Y-m-d h:i:s').auth()->user()->username.date('h:i:s')).'.jpg';
        $update = auth()->user()->update([
            'avatar' => $filename

        ]);
        
        $file->move($dest, $filename);
            return redirect()->route('user-profile-edit')->with(['status' => 'success','title' => 'Success!!', 'message'=>'Success to upload Avatar. Your avatar is updated']);
    }
}