<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    protected $fillable = ['user_id','friend_id'];

    public static function friendship($userid){
        return (new static())
            ->where(function ($query) use ($userid){
                return $query->where('user_id',$userid)
                    ->where('friend_id',auth()->user()->id);
        })
            ->orwhere(function ($query) use ($userid){
                return $query->where('user_id',auth()->user()->id)
                    ->where('friend_id',$userid);
        })
            ->first();
    }

    public static function friendships(){
        return (new static())
            ->Where (function ($query){
                return $query->Where('user_id',auth()->user()->id)
                    ->orWhere('friend_id',auth()->user()->id);
            })
            ->get();
    }

}
