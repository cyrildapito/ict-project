<?php

namespace App\Http\Controllers;


class HistoryController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {



        return view('history');
    }
}
