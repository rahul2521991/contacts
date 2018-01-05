<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function registeredUser()
    {
        $users = DB::table('users')
                ->select('users.id','users.*','a.status')
                ->leftJoin(DB::raw("(SELECT IF(user_id=".Auth::id().",contact_id,user_id) as uid,status FROM contacts where (contact_id=".Auth::id()." or user_id=".Auth::id().")) as a"),function($join){
                $join->on("a.uid","=","users.id");
                })
                ->where('users.id', '!=', Auth::id())                    
                ->get(); 
                
        return $users; 
    }    
}
