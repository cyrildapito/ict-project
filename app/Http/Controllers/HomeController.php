<?php

namespace App\Http\Controllers;


use App\Models\Events;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //get current events
        $events = Events::orderby("id", "desc")->limit(10)->get();

        return view('home', [ "events" => $events ]);
    }

}
