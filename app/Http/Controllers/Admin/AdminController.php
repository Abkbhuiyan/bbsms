<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admins'] = Admin::paginate(5);
        return view('admins.admin.adminsList',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required|max:15',
            'status' => 'required',
            'image'=>'mimes:jpeg,png|max:2048',
        ]);

        $user = $request->except('_token','password','image');
        $user['password'] = bcrypt($request->password);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = base64_encode(time().rand(000,999)).'.'.$file->getClientOriginalExtension();
            $path = 'assets/img/user';
            $file->move($path,$file_name);
            $user['image'] = $path.'/'.$file_name;
        }
        //dd($user);
        Admin::create($user);
        session()->flash('successMessage','Admin Successfully Created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $user)
    {
       $data['user'] = $user;
       return view('admins.admin.edit',$data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if(file_exists($admin->image))
        {
            unlink($admin->image);
        }

        $admin->delete();
        session()->flash('successMessage','Admin Successfully Deleted!');
        return redirect()->back();
    }
}
