<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function follow(Request $request)
    {
        $id = 3;

//        request'den gelen karsi adamin ID'si
//        $following_user_id = $request->input('follwer_id');
        $following_user_id = 4;

        $user_id = User::find($id);

        if ($user_id != null){
            $user_id->follows()->attach($following_user_id);
        }

        return redirect()->back();
//        dd('geldi');

    }
    public function unfollow(Request $request)
    {
        $id = 3;

//        request'den gelen karsi adamin ID'si
//        $following_user_id = $request->input('follwer_id');
        $following_user_id = 4;

        $user_id = User::find($id);

        if ($user_id != null){
            $user_id->follows()->detach($following_user_id);
//            get_class(User::class)
        }

        return redirect()->back();
    }
}
