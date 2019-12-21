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

        $total = count($users);

        if (count($users) > 0) {
            $usertable = '<table id="example1" class="table table-bordered table-striped">';
            $usertable .= '<thead>';
            $usertable .= '<tr>';
            $usertable .= '<th width="30">         
                                <div class="custom-control custom-checkbox text-center pl-3">
                                <input type="checkbox" class="checkbox custom-control-input" id="check_all">
                                <label class="custom-control-label ml-2" for="check_all">SelectAll</label>
                                </div>
                            </th>';
            $usertable .= '<th>Name</th>';
            $usertable .= '<th>Email</th>';
            $usertable .= '<th>Email Verification</th>';
            $usertable .= '<th>Created</th>';
            $usertable .= '<th>Status</th>';
            $usertable .= '<th>Action</th>';
            $usertable .= '</tr>';
            $usertable .= '</thead>';

            $usertable .= '<tfoot>';
            $usertable .= '<tr>';
            $usertable .= '<td colspan="7">
            <button class="btn btn-sm btn-outline-secondary font-weight-normal delete-all" data-url="#"><i class="fa fa-trash mr-1" aria-hidden="true"></i>DeleteAll</button> 
            </td>';      
            $usertable .= '</tr>';
            $usertable .= '</tfoot>';
            $usertable .= '<tbody>';
 
    // start for each
            foreach($users as $user){

                $emailverification = ($user->email_verified_at) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>';
                $userstatus = ($user->status) ? 'Active' : 'Blocked';
                $btnstatus = ($user->status == 1) ? "Block" : "Active";
                $bstatus = ($user->status == 0) ? 1 : 0;
                $userimg = ($user->picture != '') ? $user->picture : 'uploads/default/user.png';

                //table row start
                $usertable .= '<tr>';

                //select field start
                $usertable .= '<td>';
                $usertable .= '<div class="custom-control custom-checkbox">
                <input type="checkbox" class="checkbox custom-control-input" id="'. $user->id .'" data-id="'.$user->id.'">
                <label class="custom-control-label ml-2" for="'.$user->id.'"></label>
                </div>'; 
                $usertable .= '</td>';
                //select field end

                $usertable .= '<td><a href="' . url('admin/user-list/' . $user->id) . '"><img src="' . url($userimg) . '" width="30" height="30">&nbsp;' . $user->name . '</a>&nbsp;</td>';
                // $usertable .= '<td>' . '<a href="' . url('admin/user-list/' . $user->id) . '">'. $user->name .'</a></td>';

                $usertable .= '<td><a href="#">' . $user->email . '</a></td>';

                $usertable .= '<td>' . $emailverification . '</td>';
                $usertable .= '<td>' . $user->created_at->toDateString() . '</td>';
                $usertable .= '<td>' . $userstatus . '</td>';
                        $usertable .='<td>';
                            $usertable .='<div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                              <span class="caret"></span>
                                              <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                              <li><a href="#">Edit</a></li>

                                              <li><a href="' . url('admin/user-list/block/' . $user->id . '/' . $bstatus) . '" onclick="event.preventDefault(); document.getElementById("block-form").submit();">' . $btnstatus . '</a>
                                              
                                              <form id="block-form" action="' . url('admin/user-list/block/' . $user->id . '/' . $bstatus) . '" method="POST" style="display: none;">
                                              @csrf
                                              </form>
                                              </li>
                                              <li><a href="' . url('admin/user-list/delete/' . $user->id) . '">Delete</a></li>
                                            </ul>
                                          </div>';
                        $usertable .= '</td>';
                $usertable .= '</tr>';
            }
        // end for each
            $usertable .= '</tbody>';
            $usertable .= '</table>';

        } else{
            $usertable = 'No records available';
        }

        $data['total'] = $total;
        $data['table'] = $usertable;

        // return view('admin.userList',compact('users'));
        return view('admin.userList.userList')->with('data', $data);
    }


    public function block($id, $bstatus)
    {
        $userdata = User::find($id);
        
        $userdata->status = $bstatus;

        $blockRes = $userdata->save();

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
        return redirect('admin/user-list')->with('success', 'Deleted Successfully...!');
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
