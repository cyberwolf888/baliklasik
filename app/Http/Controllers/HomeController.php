<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('frontend/home');
    }

    public function plan()
    {
        return view('frontend/plan');
    }

    public function gallery()
    {
        return view('frontend/gallery');
    }

    public function contact()
    {
        return view('frontend/contact');
    }

    public function send_contact(Request $request)
    {
        return redirect()->back()->with('success','Your message has been sent.');
    }
}

