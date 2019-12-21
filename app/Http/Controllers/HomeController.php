<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
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
        $this->middleware(['auth','verified']);//verfication add
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function editprofile()
    {
        $data = Auth::user();
        return view('user.profile.show')->with('data',$data);
    }

    public function updateprofile(Request $request)
    {
        $data = Auth::user();

        return view('user.profile.update')->with('data', $data);
    }

    public function userUpdate(Request $request, $id) // for update
    {
        $userdata = User::find($id);

        $this->validate($request, [
            'firstname' => 'required|max:255',
        ]);

        $filename = '';
        if ($request->hasfile('profilepicture')) {
            $file = $request->file('profilepicture');
            $name = time() . '.' . $file->getClientOriginalExtension();   //getClientOriginalName()
            $file->move('uploads/user/', $name);
            $filename = '/uploads/user/' . $name;
            $userdata->picture = $filename;
        }

        $userdata->name = $request->input('firstname');
        $userdata->middlename = $request->input('middlename');
        $userdata->lastname = $request->input('lastname');

        $userdata->save();
        return redirect('/user/profile')->with('success', 'Updated Successfully...!');
    }
}
