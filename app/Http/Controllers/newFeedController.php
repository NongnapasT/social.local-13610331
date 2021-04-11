<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Post;
use Illuminate\Http\Request;

class newFeedController extends Controller
{
    //
    public function index(){
        $friends = Friend::friendships();
//        dd($friends);
        $user_ids[] = auth()->user()->id;
        $user_ids = array_merge($user_ids, $friends->pluck('user_id')->toArray());
        $user_ids = array_merge($user_ids, $friends->pluck('friend_id')->toArray());
        $user_ids = array_unique($user_ids);

        $posts = Post::with(['user','likes','comments.user'])->whereIn('user_id', $user_ids)->orderBy('created_at', 'desc')->get();

//       dd($posts->toArray());
        return view('news-feed', compact('posts'));
    }
}
