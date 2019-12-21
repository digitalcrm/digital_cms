<?php

namespace App\Http\Controllers;

use App\Admin;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function editprofile()
    {
        $data = Auth::user();
        return view('admin.profile.show')->with('data', $data);
    }

    public function updateprofile()
    {
        $data = Auth::user();
        return view('admin.profile.update')->with('data', $data);
    }

    public function adminUpdate(Request $request, $id)
    {
        $admindata = Admin::find($id);

        $this->validate($request,[
            'firstname' => 'required|max:255',
            // 'email' => 'required|email|unique:users'
            //mobile validate later

        ]);

//Image uploads
        $filename = '';
        if ($request->hasfile('profilepicture')) {
            $file = $request->file('profilepicture');
            $name = time() . '.' . $file->getClientOriginalExtension();   //getClientOriginalName()
            $file->move('uploads/admin/', $name);
            $filename = '/uploads/admin/' . $name;
            $admindata->picture = $filename;
        }        

        $admindata->name = $request->input('firstname');
        // $admindata->middlename = $request->input('middlename');
        // $admindata->lastname = $request->input('lastname');
        $admindata->mobile = $request->input('mobile');
        $admindata->address = $request->input('address');

        $admindata->save();
        return redirect('/admin/profile')->with('success', 'Updated Successfully...!');
    }
}
