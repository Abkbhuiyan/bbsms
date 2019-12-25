<?php

namespace App\Http\Controllers\Admin;

use App\BloodGroup;
use App\Http\Controllers\Controller;
use App\User;
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
        $data['bloodDonors'] = User::where('status','active')->paginate(5);
        return view('admins.bloodDonor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['bloodGroups'] = BloodGroup::all();
        return view('admins.bloodDonor.create',$data);
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
        ]);
        $bloodDonor = $request->except('_token');
        $bloodDonor['password'] = bcrypt('123456');
        $bloodDonor['status'] = 'active';
        User::create($bloodDonor);
        session()->flash('successMessage','Blood Donor Successfully Created!');
        return redirect()->route('bloodDonor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function show(User $bloodDonor)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $bloodDonor)
    {
        dd($bloodDonor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $bloodDonor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $bloodDonor)
    {
        $bloodDonor->delete();
        session()->flash('successMessage','Blood Donor Successfully Deleted!');
        return redirect()->route('admins.bloodDonor.index');
    }

    public  function requests(){
        $data['bloodDonors'] = User::where('status','pending')->paginate(5);
        return view('admins.bloodDonor.requests',$data);
    }
    public  function rejectedDonors(){
        $data['bloodDonors'] = User::where('status','rejected')->paginate(5);
        return view('admins.bloodDonor.rejectedDonors',$data);
    }
    public function updateRequest(Request $request, User $bloodDonor)
    {
        $bloodDonor->status = $request->status;
        $bloodDonor->approved_by = $request->approved_by;
        $bloodDonor->save();
        return redirect()->back();
    }
}
