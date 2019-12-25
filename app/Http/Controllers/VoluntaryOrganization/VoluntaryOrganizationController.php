<?php

namespace App\Http\Controllers\VoluntaryOrganization;

use App\BloodGroup;
use App\Http\Controllers\Controller;
use App\OrganizationDonorDatabase;
use App\PrivateBloodRequest;
use App\VoluntaryOrganization;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;

class VoluntaryOrganizationController extends Controller
{
    public function index(){
        return view('voluntaryOrganization.dashboard');
    }
  public function create(){

      return view('voluntaryOrganization.create');
  }

  protected function voluntaryValidation($request){
      $this->validate($request, [
          'group_type'      => 'required',
          'group_name'      => 'required',
          'group_contact'   => 'required',
          'admin_contact'   => 'required',
          'district'        => 'required',
          'address'         => 'required',
          'logo'            => 'required',
          'website_address' => 'required',
          'username'        => 'required',
          'website_address' => 'required',
          'email'           => 'required|email|unique:voluntary_organizations',
          'password'        => 'required|min:6|confirmed',
      ]);

  }

  protected function logoUpload($request){
      $logoImage = $request->file('logo');
      $imageName  = $logoImage->getClientOriginalName();
      $directory = 'assets/vOrg/img/';
      $imageUrl  = $directory.$imageName;
      $logoImage ->move($directory, $imageName);
      return $imageUrl;
  }

   protected function voluntaryInfoSave($request,$imageUrl)
   {
       $voluntaryOrganization = new VoluntaryOrganization();
       $voluntaryOrganization->group_type      = $request->group_type;
       $voluntaryOrganization->group_name      = $request->group_name;
       $voluntaryOrganization->group_contact   = $request->group_contact;
       $voluntaryOrganization->admin_contact   = $request->admin_contact;
       $voluntaryOrganization->district        = $request->district;
       $voluntaryOrganization->address         = $request->address;
       $voluntaryOrganization->logo            = $imageUrl;
       $voluntaryOrganization->website_address = $request->website_address;
       $voluntaryOrganization->username        = $request->username;
       $voluntaryOrganization->email        = $request->email;
       $voluntaryOrganization->password        = bcrypt($request->password);
       $voluntaryOrganization->status          = 'pending';
//       dd($voluntaryOrganization);
       $voluntaryOrganization->save();

 }

  public function store(Request $request){

      $this->voluntaryValidation($request);
      $imageUrl= $this->logoUpload($request);
      $this->voluntaryInfoSave($request, $imageUrl);
      session()->flash('successMessage','Voluntary Organization Added Successfully');
      return redirect()->back();
  }

  public function addVoluntary(){
        $data['bloodGroups'] = BloodGroup::all();
    return view('voluntaryOrganization.addVoluntary',$data);
  }

  public function newVoluntary(Request $request){

      $addVoluntary = new OrganizationDonorDatabase();
      $addVoluntary->name           = $request->name;
      $addVoluntary->phone          = $request->phone;
      $addVoluntary->address        = $request->address;
      $addVoluntary->blood_group_id = $request->blood_group_id;
      $addVoluntary->org_id         = auth()->user()->id;
      $addVoluntary->save();
      session()->flash('successMessage','Yor Doner has been added');
      return redirect()->route('vOrg.manageVoluntary');

  }
 public function manageVoluntary(){
        $viewVoluntaryOrganizations = OrganizationDonorDatabase::with('bloodGroup')->where('org_id',auth()->user()->id)->paginate(8);
      //  dd($viewVoluntaryOrganizations);
     return view('voluntaryOrganization.manageVoluntary',['viewVoluntaryOrganizations'=>$viewVoluntaryOrganizations]);
 }

 public function editDonor($id){
        $data['orgDatabase'] = OrganizationDonorDatabase::findOrFail($id);
        $data['bloodGroups'] = BloodGroup::all();
        return view('voluntaryOrganization.edit',$data);
 }

 public function updateDonor(Request $request, $id){
        $orgDb = OrganizationDonorDatabase::findOrFail($id);
         $orgDb->name           = $request->name;
         $orgDb->phone          = $request->phone;
         $orgDb->address        = $request->address;
         $orgDb->blood_group_id = $request->blood_group_id;
         //dd($orgDb);
         $orgDb->save();
     session()->flash('successMessage','Donor info successfully updated');
     return redirect()->route('vOrg.manageVoluntary');
 }

 public function deleteDonor(Request $request, $id){
        $orDb = OrganizationDonorDatabase::findOrFail($id);
        $orDb->delete();
         session()->flash('successMessage','Donor info successfully deleted');
        return redirect()->route('vOrg.manageVoluntary');
 }

 public function newRequests(){
    $data['requests'] = PrivateBloodRequest::with('bloodGroup')->where('org_id',auth()->user()->id)->where('status','pending')->paginate(8);

    return view('voluntaryOrganization.newRequests',$data);
 }
public function oldRequests(){
    $data['requests'] = PrivateBloodRequest::with('bloodGroup')->where('org_id',auth()->user()->id)
        ->where('status','rejected')
        ->orWhere('status','accepted')
        ->paginate(10);

    return view('voluntaryOrganization.oldRequests',$data);
}
public function updateRequest(Request $request, $id){
    $rq = PrivateBloodRequest::findOrFail($id);
    $rq->status = $request->status;
    $rq->save();
    session()->flash('successMessage','Status Changed');
    return redirect()->back();
}
}
