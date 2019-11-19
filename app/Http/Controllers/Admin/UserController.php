<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admins'] = User::paginate(5);
        return view('admin.adminsList',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create');
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
            $file_name = encrypt(time().rand(00000,99999)).'.'.$file->getClientOriginalExtension();
            $path = 'assets/img/user';
            $file->move($path,$file_name);
            $user['image'] = $path.'/'.$file_name;
        }
        //dd($user);
        User::create($user);
        session()->flash('successMessage','Admin Successfully Created!');
        return redirect()->route('admin.dashboard');
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
    public function edit(User $user)
    {
       $data['user'] = $user;
       return view('admin.edit',$data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(file_exists($user->image))
        {
            unlink($user->image);
        }

        $user->delete();
        session()->flash('successMessage','Admin Successfully Deleted!');
        return redirect()->route('admin.dashboard');
    }
}
