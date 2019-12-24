<?php

namespace App\Http\Controllers\BloodBank;

use App\BloodBank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BloodBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('bloodBanks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'email' => 'required|email|unique:blood_banks',
            'password' => 'required|min:6|confirmed',
        ]);
        $bloodBank = new BloodBank();
        $bloodBank->name = $request->name;
        $bloodBank->hospital_approval_number = $request->hospital_approval_number;
        $bloodBank->address = $request->address;
        $bloodBank->latitude = $request->latitude;
        $bloodBank->longitude = $request->longitude;
        $bloodBank->email = $request->email;
        $bloodBank->password = bcrypt($request->password);
        $bloodBank->status = 'pending';
        $bloodBank->save();
        session()->flash('successMessage','You registration is successful! Please wait until verification');
        return redirect()->route('bloodBank.login');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
