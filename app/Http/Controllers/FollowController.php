<?php

namespace App\Http\Controllers;

use App\Models\Followable;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {
        $id = 1;
        $following_user_id = 5;

        $find2 = Followable::where('followable_follower_id' , $id)->where('followable_id' , $following_user_id)->first();

//        dd($find2);
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
        $id = 1;

//        request'den gelen karsi adamin ID'si
        $following_user_id = $request->input('follower_id');
//        $following_user_id = 4;

        $user_id = User::find($following_user_id);


        $find2 = Followable::where('followable_follower_id' , $id)->where('followable_id' , $following_user_id)->first();

        if ($find2 == null){
            $user_id->following()->attach($id);
        }else{
            $user_id->following()->detach($id);
        }
//
//        if ($user_id != null && $request->input('follow') == 0){
//            $user_id->following()->attach($id);
//
//        }elseif ($user_id != null && $request->input('follow') == 1){
//
//            $user_id->following()->detach($id);
//        }

        return redirect()->back();
//        dd('geldi');

    }
    public function unfollow(Request $request)
    {
        $id = 1;

//        request'den gelen karsi adamin ID'si
        $following_user_id = $request->input('follower_id');
//        $following_user_id = 4;

        $user_id = User::find($following_user_id);

        if ($user_id != null){
            $user_id->following()->detach($id);
//            get_class(User::class)
        }

        return redirect()->back();
    }

    public function check_follow(Request $request)
    {
//        dd($request->yes);

        User::create(['name' => $request->yes]);
        dd('geldi');
//        kendi ID'm
//        $id = Auth::id();
//        $id1 = 4;
////        Karsi adamin ID'si
//        $id;
//
////        $find = Followable::find($id);
//        $find2 = Followable::where('followable_follower_id' , $id1)->where('followable_id' , $id)->first();
//
//        if ($find2 != null){
//            echo '{"follow":"true", "message":null}';
//        }else{
//            echo '{"follow":"false", "message":null}';
//        }
//        dd($find2);
    }
}
