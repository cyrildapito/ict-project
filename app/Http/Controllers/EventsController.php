<?php

namespace App\Http\Controllers;

use App\Models\DonorHistory;
use App\Models\Events;
use App\Models\Profile;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function index()
    {
        return view('admin/events', [
            'events' => Events::orderby("id", "desc")->get()
        ]);
    }

    public function create(){
        return view('admin/events-create');
    }

    public function edit(int $id){
        return view('admin/events-create', Events::find($id));
    }

    public function store(Request $request){

        $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'details'   => 'required',
            'timestart' => 'required',
            'timeend'   => 'required',
            'points'    => 'required'

        ]);

        $id = $request->post('id');
        $data = $request->except(["id"]);

        Events::updateOrCreate(["id" => $id], $data);

        return redirect()->route('events')->with('success', 'A Site Successfully Created');
    }

    public function delete(int $id)
    {
        Events::where("id", $id)->delete();
        return redirect()->route('events')->with('success', 'A Site Successfully Deleted');
    }

    public function points(int $id)
    {

        $profile = Profile::find(1);
        //dd($profile->history);


        return view('admin.events-points', [
            "donors" => Profile::all(),
            "event" => Events::find($id)
        ]);
    }

    public function pointsToDonor(int $id, Request $request){

        $request->validate([
            "user_id" => "required",
            "event_id" => "required",
        ]);

        $donor = DonorHistory::create(
            $request->all()
        );

        //save transaction history
        return $donor->toJSON();

    }

}
