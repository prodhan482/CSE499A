<?php

namespace App\Http\Controllers;
use App\Models\Scholarship;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $scholarships = Scholarship::where('status', "ACTIVE")->where('is_delete', 0)->orderBy('id', 'DESC')->paginate(100);

        return view('home', [
            'scholarships' => $scholarships,
        ]);
    }

    public function contact_us()
    {
        return view("contact_us");
    
    }

    public function store(Request $request){

        $contact = new Contact;
        $contact->fname=$request->fname;
        $contact->lname=$request->lname;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact_us')
            ->with('success', 'Send successfully');

    }
}
