<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{

    public function index(User $user,$following)

    {
        if($following != 'follower' && $following != 'following'){
            return redirect(route('profile',$user->username));
        }
        return view('users.following',[
            'user'=> $user,
            'follows' => $following == 'following' ? $user->follows : $user->followers
        ]);




        // if($following == 'following' ){
        //     $follows = $user->follows;
        // } else if($following == 'follower') {
        //     $follows = $user->followers;
        // } else{
        //     return redirect(route('profile',$user->username));
        // }

        // $follows = $following == 'following' ? $user->follows : $user->followers;

    }

    public function store(Request $request,User $user)
    {
        // if(Auth::user()->hasFollow($user)){
        //     Auth::user()->unfollow($user);
        // } else {
        //     Auth::user()->follow($user);
        // }

        Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) : Auth::user()->follow($user);
        // Auth::user()->follow($user);
        return back()->with('success','You has been follow user');
    }

    // public function following (User $user)
    // {
    //     return view('users.following',[
    //         'user' => $user,
    //         'following' => $user->follows
    //     ]);
    // }

    // public function followers(User $user)
    // {
    //     return view('users.following',[
    //         'user' => $user,
    //         'following' => $user->followers
    //     ]);
    // }
}
