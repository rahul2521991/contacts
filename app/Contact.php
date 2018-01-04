<?php

namespace App;

// namespace App\Contact;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Contact extends Model
{

    public function addContact($id)
    {
        $contact = new Contact;
        $contact->user_id = Auth::user()->id;
        $contact->contact_id = $id;
        $contact->status = 1;
        $contact->save();    
    }

    public function mycontacts()
    {
        $mycontact = DB::table('users')
                ->select('*')
                ->join(DB::raw("(SELECT c.* FROM users u LEFT JOIN contacts c on u.id= c.contact_id where (c.contact_id=".Auth::id()." or c.user_id=".Auth::id().")) as a"),function($join){
                $join->on("a.contact_id","=","users.id");
                })                  
                ->get();

        return $mycontact;      	
    }

    public function myrequest(){
        $mycontact = DB::table('users')
        ->select('*')
        ->join(DB::raw("(SELECT c.* FROM users u LEFT JOIN contacts c on u.id= c.contact_id where c.contact_id=".Auth::id()." AND c.status=1) as a"),function($join){
        $join->on("a.user_id","=","users.id");
        })                  
        ->get();

        return $mycontact;   
    }

    public function acceptrequest($id){
    	// echo $id.'>>>>>>>'; die;
		$retval = DB::table('contacts')
		            ->where([['contact_id', Auth::id()],['user_id', $id]])
		            ->update(['status' => 2]);
		return $retval;            
    }

    public function viewcontact($id) {
    	$userprofile = DB::table('users')->select('*')->where('id', $id)->get();

    	$arr1 = DB::table('contacts')
    	->where([['user_id',Auth::id()],['status',2]])->pluck('contact_id');
    	
    	$arr2 = DB::table('contacts')
    	->where([['user_id',$id],['status',2]])->pluck('contact_id');    
    	$result = array_intersect($arr1,$arr2);


    	$mutualfriends = DB::table('users')->select('name')->whereIn('id', $result)->get();
    	
    		$userprofile[0]->{"mutualfriend"} = $mutualfriends;
    	return $userprofile;
    }       
}