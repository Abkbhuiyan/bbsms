<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MedicalOfficer;
use Illuminate\Http\Request;

class MedicalOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['medicalOfficers'] = MedicalOfficer::with('bloodBank')->where('status','active')->paginate(5);
        return view('admins.medicalOfficer.index',$data);
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
     * @param  \App\MedicalOfficer  $medcialOfficer
     * @return \Illuminate\Http\Response
     */
    public function show(MedcialOfficer $medcialOfficer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MedicalOfficer  $medcialOfficer
     * @return \Illuminate\Http\Response
     */
    public function edit(MedcialOfficer $medcialOfficer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MedicalOfficer  $medcialOfficer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedcialOfficer $medcialOfficer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MedicalOfficer  $medcialOfficer
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedcialOfficer $medcialOfficer)
    {
        //
    }

    public  function requests(){
        $data['medicalOfficers'] = MedicalOfficer::with('bloodBank')->where('status','pending')->paginate(5);
        return view('admins.medicalOfficer.requests',$data);
    }
    public  function rejectedDonors(){
        $data['medicalOfficers'] = MedicalOfficer::with('bloodBank')->where('status','rejected')->paginate(5);
        return view('admins.medicalOfficer.requests',$data);
    }
    public function updateRequest(Request $request, MedicalOfficer $medicalOfficer)
    {
        //dd($medicalOfficer);
        $medicalOfficer->status = $request->status;
        $medicalOfficer->approved_by = auth()->user()->id;
        $medicalOfficer->save();
        return redirect()->back();
    }
}
