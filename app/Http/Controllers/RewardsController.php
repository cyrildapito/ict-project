<?php

namespace App\Http\Controllers;

use App\Models\Rewards;
use Illuminate\Http\Request;

class RewardsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware('role:ROLE_ADMIN');
    }

    public function index(){
        return view("admin.rewards", [
            "rewards" => Rewards::all()
        ]);
    }

    public function create(){
        return view("admin.rewards-create");
    }

    public function edit(int $id){
        return view("admin.rewards-create", Rewards::find($id));
    }

    public function store(Request $request){

        $request->validate([
            "name" => "required",
            "description" => "required",
            "points" => "required",
            "upload" => "required|mimes:jpg,gif,jpeg,png|max:2048"
        ]);

        $filename = "";
        if($request->file('upload')){
            $file= $request->file('upload');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('rewards'), $filename);
        }

        $id = $request->post('id');

        $data = collect($request->except(['id']));

        if(!empty($filename)) $data = $data->merge(["image" => $filename])->toArray();

        Rewards::updateOrCreate(["id" => $id], $data);

        return redirect()->route('rewards')->with("success", "New Rewards Created");
    }

    public function delete(int $id){
        Rewards::where("id", $id)->delete();
        return redirect()->route('rewards')->with("success", "Rewards Successfully Deleted");
    }

}
