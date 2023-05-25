<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function index()
    {
        $user = User::find(Auth::id());
        $data = collect(["email" => $user->email]);

        if($user->profile){
            $data = $data->union($user->profile->toArray());
        }

        if($data->get('image') == null) $data = $data->merge(['image' => 'default.jpg']);

        return view('profile', $data->all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'bdate' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $data = $request->except(['id']);

        Profile::updateOrCreate([
            "id" => $request->post('id')
        ], $data);

        return redirect()->route('profile')->with("success", "Profile has been successfully updated");
    }


    public function uploadPicture(Request $request)
    {

        $request->validate([
            'upload' => 'required|mimes:png,jpg,jpeg|max:2048',
            'id' => 'required'
        ]);

        if($request->file('upload')){
            $file= $request->file('upload');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('profiles'), $filename);

            Profile::where("id", $request->post('id'))
                ->update([
                    "image" => $filename
                ]);
        }


        return redirect()->route('profile')->with('success', 'Profile Image successfully uploaded');

    }

}
