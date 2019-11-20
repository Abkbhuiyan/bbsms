<?php

namespace App\Http\Controllers\Admin;

use App\BloodGroup;
use App\Http\Controllers\Controller;
use App\BloodDonor;
use Illuminate\Http\Request;

class BloodDonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bloodDonors'] = BloodDonor::where('status','active')->paginate(5);
        return view('bloodDonor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['groups'] = BloodGroup::all();
        return view('bloodDonor.create',$data);
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
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'blood_group_id' =>'required',
        ]);
        $bloodDonor = $request->except('_token','password');
        if($request->has('password')){
            $bloodDonor['password'] = bcrypt($request->password);
        }else{
            $bloodDonor['password'] = bcrypt('123456');
        }
        if(!$request->has('status')){
            $bloodDonor['status'] = 'active';
        }
   // dd($bloodDonor);
        BloodDonor::create($bloodDonor);
        session()->flash('successMessage','Blood Donor Successfully Created!');
        return redirect()->route('bloodDonor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BloodDonor  $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function show(BloodDonor $bloodDonor)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BloodDonor  $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodDonor $bloodDonor)
    {
        dd($bloodDonor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BloodDonor  $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodDonor $bloodDonor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BloodDonor  $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDonor $bloodDonor)
    {
        $bloodDonor->delete();
        session()->flash('successMessage','Blood Donor Successfully Deleted!');
        return redirect()->route('bloodDonor.index');
    }

    public  function requests(){
        $data['bloodDonors'] = BloodDonor::where('status','pending')->paginate(5);
        return view('bloodDonor.requests',$data);
    }
    public function updateRequest(Request $request, BloodDonor $bloodDonor)
    {
        $bloodDonor->status = $request->status;
        $bloodDonor->approved_by = $request->approved_by;
        $bloodDonor->save();
        return redirect()->back();
    }
}
