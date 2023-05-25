<?php

namespace App\Http\Controllers;

use App\Models\Rewards;
use Illuminate\Http\Request;

class ClaimRewardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('claim', [
            "rewards" => Rewards::all()
        ]);

    }
}
