<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\VoluntaryOrganization;
use Illuminate\Http\Request;

class VoluntaryOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vOrgs'] = VoluntaryOrganization::where('status','active')->paginate(5);
        return view('admins.vOrg.index',$data);
        //return view('vOrg.vOrgsList',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.vOrg/create');
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
            'group_name' => 'required',
            'district' => 'required',
            'group_contact' => 'required',
            'admin_contact' => 'required',
            'group_type' => 'required',
            'email' => 'required|unique:voluntary_organizations',
            'address' => 'required',
            'website_address' => 'required',
            'username' => 'required',
        ]);
        $vOrg = $request->except('_token','password_confirmation');
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $file_name = base64_encode(time().rand(000,999)).'.'.$file->getClientOriginalExtension();
            $path = 'assets/vOrg/img';
            $file->move($path,$file_name);
            $vOrg['logo'] = $path.'/'.$file_name;
        }

        $vOrg['password'] = bcrypt('bbsms123');
        $vOrg['status'] = 'active';


        VoluntaryOrganization::create($vOrg);
        session()->flash('successMessage','Organization Added!');
        return redirect()->route('vOrg.index');
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
    public function edit(VoluntaryOrganization $vOrg)
    {
        $data['vOrg'] = $vOrg;
        return view('admins.vOrg.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vOrg $vOrg)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' =>'max:90|min:-90',
            'longitude' => 'max:180|min:-180'
        ]);

        if($request->has('password')){
            $vOrg->password = $request->password;
        }
        if($request->has('approved_by')){
            $vOrg->approved_by = $request->approved_by;
        }
        if($request->has('status')){
            $vOrg->status = $request->status;
        }
        if($request->has('address')){
            $vOrg->address = $request->address;
        }
        if($request->has('longitude')){
            $vOrg->longitude = $request->longitude;
        }
        if($request->has('latitude')){
            $vOrg->latitude = $request->latitude;
        }
        if($request->has('name')){
            $vOrg->name = $request->name;
        }

        $vOrg->save();
        return redirect()->route('vOrg.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param VoluntaryOrganization $vOrg
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(VoluntaryOrganization $vOrg)
    {
        $vOrg->delete();
        session()->flash('successMessage','Voluntary Organization Deleted!');
        return redirect()->route('vOrg.index');
    }

    public  function requests(){
        $data['vOrgs'] = VoluntaryOrganization::where('status','pending')->paginate(5);
        return view('admins.vOrg.requests',$data);
    }
    public  function rejectedVOrgs(){
        $data['vOrgs'] = VoluntaryOrganization::where('status','rejected')->paginate(5);
        return view('admins.vOrg.rejected',$data);
    }
    public function updateRequest(Request $request, $id)
    {
        $vOrg = VoluntaryOrganization::findOrFail($id);
        $vOrg->status = $request->status;
        $vOrg->approved_by = auth()->guard('admin')->id();
        $vOrg->save();
        return redirect()->back();
    }
}
