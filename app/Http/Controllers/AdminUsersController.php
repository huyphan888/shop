<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::with('role')->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role=Role::pluck('name','id')->all();

        return view('admin.users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all();

        /* upload file */
        if ($file=$request->file('img')) {
            $input['img'] = upload($file);
        }
        /* end upload */
        $input['password'] = bcrypt($request->password);

        $user=User::create($input);
        return redirect('admin/users')->with('success', 'them user thanh cong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role=Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request,User $user)
    {
        /* password */

        if($request->password){
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }else{
            $input = $request->except('password');
        }
        /* upload file */
        if ($file=$request->file('img')) {
            $user->img?deleteUpload($user->img):"";



            $input['img'] = upload($file);

        }


        $user->update($input);


        return redirect(route('users.index'))->with('success', 'edit user thanh cong');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->img?deleteUpload($user->img):"";
        $user->delete();
        return back()->with('success','xoa thanh cong');

    }


}

