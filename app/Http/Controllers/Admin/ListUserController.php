<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class ListUserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::orderBy('id','desc')->get();

        return view('admin.userList.userList')->with('users', $users);
    }


    public function block($id, $bstatus)
    {
      // dd($id, $bstatus);
        $userdata = User::findorFail($id);
        
        $userdata->status = $userdata->status === 0 ? 1 : 0;

        $userdata->save();

        return redirect('admin/user-list/')->with('success', 'Updated Successfully...!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //User profile show
        $data = User::find($id);
        return view('admin.userprofile.profile')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->status? : $request['status']=0;
        // return redirect(route(''));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $userdata = User::find($id);
        // $userdata->delete();
        // return redirect('admin/user-list')->with('success', 'Deleted Successfully...!');
    }

   public function delete($id)//for deleting distinct users by id
    {
        $userdata = User::find($id);
        $userdata->delete();
        return redirect('admin/user-list')->with('success', 'Deleted Successfully and moved in Trash...!');
    }

    public function userTrash()//for show trashed data of Users
    {
        $userdata = User::onlyTrashed()->get();
        // $total = count($userdata);
        // return view('admin.trash.userbin', compact('userdata','total'));
        return view('admin.trash.userbin', compact('userdata'));
    }

    public function userRestore($id)
    {
        // dd($id);
        $userdata = User::onlyTrashed()->where('id',$id)->restore();
        return redirect('admin/users/trash')->with('User', 'Restored Successfully');
    }

    public function userRestoreAll($id)
    {
        dd($id);
        // return $request->all($id);
        $userdata = User::withTrashed()->find($id)->restore();

        return redirect('admin/users/trash')->with('User', 'Restored Successfully');
    }
}
