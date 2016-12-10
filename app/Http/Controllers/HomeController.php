<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
}

