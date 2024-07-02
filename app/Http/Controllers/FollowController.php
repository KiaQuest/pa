<?php

namespace App\Http\Controllers;

use App\Models\Followable;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {
        $id = 3;
        $following_user_id = 4;

        $find2 = Followable::where('followable_follower_id' , $id)->where('followable_follower_id' , $following_user_id)->first();

        if ($find2 == null){
            $check = 0;
        }else{
            $check = 1;
        }

        return view('profile' , compact('check'));
    }

    public function follow(Request $request)
    {
//        dd('fg');
        $id = 3;

//        request'den gelen karsi adamin ID'si
//        $following_user_id = $request->input('follwer_id');
        $following_user_id = 4;

        $user_id = User::find($id);

        if ($user_id != null){
            $user_id->following()->attach($following_user_id);
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

    public function check_follow($id)
    {

//        kendi ID'm
//        $id = Auth::id();
        $id1 = 4;
//        Karsi adamin ID'si
        $id;

//        $find = Followable::find($id);
        $find2 = Followable::where('followable_follower_id' , $id1)->where('followable_id' , $id)->first();

        if ($find2 != null){
            echo '{"follow":"true", "message":null}';
        }else{
            echo '{"follow":"false", "message":null}';
        }
//        dd($find2);
    }
}
