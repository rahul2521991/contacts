<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Contact;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = new Contact;
        $mycontacts = $contacts->mycontacts();
        // echo '<pre>'; print_r($mycontacts); die;
        return view('pages.contact')->with('mycontacts',$mycontacts);;
    }

    public function registeredUser() {
        $user = new User();
        $registeredUser = $user->registeredUser();
        // echo '<pre>'; print_r($registeredUser); die;
        return view('pages.registerUser')->with('registeredUser',$registeredUser);
    }

    public function addcontact(Request $request) {
        $contact = new Contact();
        $addcontact = $contact->addContact( $request->id);
    }

    public function acceptrequest(Request $request) {
        $contact = new Contact();
        $acceptrequest = $contact->acceptrequest( $request->id);        
    }

    public function viewcontact(Request $request){
        $contact = new Contact();
        $acceptrequest = $contact->viewcontact( $request->id);  
        return $acceptrequest;
        // return view('pages.profile')->with('acceptrequest',$acceptrequest);          
    }

    public function myrequest() {
        $contact = new Contact();
        $myrequest = $contact->myrequest();
        return view('pages.myrequest')->with('myrequest',$myrequest);
    }
}
// 