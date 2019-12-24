<?php

namespace App\Http\Controllers\BloodBank;

use App\Http\Controllers\Controller;
use App\MedicalOfficer;
use Illuminate\Http\Request;

class MedicalOfficerController extends Controller
{
    public function index(Request $request)
    {
        $query = MedicalOfficer::where('job_status','active')->where('blood_bank_id',auth()->user()->id);
        if(isset($request->searchByName) && $request->searchByName != null){
            $query = $query->where('name','like','%'.$request->searchByName.'%');
        }
        if(isset($request->searchByReg) && $request->searchByReg != null){
            $query = $query->where('bmo_no','like','%'.$request->searchByReg.'%');
        }
        $data['medical_officers'] = $query->orderBy('id','DESC')->paginate(10);
        return view('bloodBanks.mo.activeMo',$data);
    }
    public function inactiveIndex(Request $request)
    {
        $query = MedicalOfficer::where('job_status','inactive')->where('blood_bank_id',auth()->user()->id);
        if(isset($request->searchByName) && $request->searchByName != null){
            $query = $query->where('name','like','%'.$request->searchByName.'%');
        }
        if(isset($request->searchByReg) && $request->searchByReg != null){
            $query = $query->where('bmo_no','like','%'.$request->searchByReg.'%');
        }
        $data['medical_officers'] = $query->orderBy('id','DESC')->paginate(10);
        return view('bloodBanks.mo.inactiveMo',$data);
    }
    public function newMo(){
        return view('bloodBanks.mo.create');
    }
    public function saveMo(Request $request){
        $request->validate([
            'name' => 'required',
            'bmo_no' => 'required|unique:medical_officers',
            'email' => 'required|unique:medical_officers',
            'address' => 'required',
        ]);
        $mo = new MedicalOfficer();
        $mo->name = $request->input('name');
        $mo->email = $request->input('email');
        $mo->bmo_no = $request->input('bmo_no');
        $mo->address = $request->input('address');
        $mo->password = bcrypt($mo->email);
        $mo->blood_bank_id = auth()->user()->id;
        $mo->save();
        session()->flash('successMessage','Mo added! the authority will check the provided information.');
        return redirect()->back();
    }

    public  function updateStatus(Request $request, MedicalOfficer $medicalOfficer){
        $medicalOfficer->job_status = $request->job_status;
        $medicalOfficer->save();
        session()->flash('successMessage','Job Status Updated!');
        return redirect()->back();
    }

    public function searchByName(Request $request){
        $medical_officers= MedicalOfficer::where('name','like','%'.$request->name.'%')->where('job_status',$request->status)->orderBy('id','DESC')->paginate(10);
        $output='';
        if ($medical_officers->count()>0){
            if($request->status == 'active'){
                foreach ($medical_officers as $medical_officer) {
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">R</a>
                                <h2><a href=\"#\">$medical_officer->name</a></h2>
                            </td>
                            <td>$medical_officer->bmo_no</td>
                            <td>$medical_officer->address</td>
                            <td>$medical_officer->email</td>
                            <td>$medical_officer->status</td>
                            <td>
                                <form method=\"post\" action=\"". route('bloodBank.mo.update',$medical_officer->id) ."\">
                                    <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                     <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" name=\"job_status\" value=\"inactive\">
                                    <button class=\"btn btn-danger m-r-5\" onclick=\"return confirm('Are you confirm to inactivate?')\"> Inactive</button>
                                </form>
                            </td>
                            <td class=\"text-right\">
                                <div class=\"dropdown dropdown-action\">
                                    <a href=\"#\" class=\"action-icon dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fa fa-ellipsis-v\"></i></a>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\" href=\" ".route('bloodBank.mo.edit',$medical_officer->id) ."\"><i class=\"fa fa-pencil m-r-5\"></i> Edit</a>
                                        <form method=\"post\" action=\"". route('bloodBank.mo.destroy',$medical_officer->id)."\">
                                         <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                             <input type=\"hidden\" name=\"_method\" value=\"delete\"> 
                                            <button class=\"dropdown-item fa fa-trash-o m-r-5\" onclick=\"return confirm('Are you confirm to delete?')\"> Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>";
                }
            }
            if($request->status == 'inactive'){
                foreach ($medical_officers as $medical_officer) {
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">R</a>
                                <h2><a href=\"#\">$medical_officer->name</a></h2>
                            </td>
                            <td>$medical_officer->bmo_no</td>
                            <td>$medical_officer->address</td>
                            <td>$medical_officer->email</td>
                            <td>$medical_officer->status</td>
                            <td>
                                <form method=\"post\" action=\"". route('bloodBank.mo.update',$medical_officer->id) ."\">
                                    <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                     <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" name=\"job_status\" value=\"active\">
                                    <button class=\"btn btn-danger m-r-5\" onclick=\"return confirm('Are you confirm to activate?')\"> Inactive</button>
                                </form>
                            </td>
                            <td class=\"text-right\">
                                <div class=\"dropdown dropdown-action\">
                                    <a href=\"#\" class=\"action-icon dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fa fa-ellipsis-v\"></i></a>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\" href=\" ".route('bloodBank.mo.edit',$medical_officer->id) ."\"><i class=\"fa fa-pencil m-r-5\"></i> Edit</a>
                                        <form method=\"post\" action=\"". route('bloodBank.mo.destroy',$medical_officer->id)."\">
                                         <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                             <input type=\"hidden\" name=\"_method\" value=\"delete\"> 
                                            <button class=\"dropdown-item fa fa-trash-o m-r-5\" onclick=\"return confirm('Are you confirm to delete?')\"> Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>";
                }
            }
        }

        if($request->status == 'rejected'){
            $medical_officers= MedicalOfficer::where('name','like','%'.$request->name.'%')->where('status',$request->status)->orderBy('id','DESC')->paginate(10);
            if($medical_officers->count()>0){
                foreach ($medical_officers as $medical_officer) {
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">R</a>
                                <h2><a href=\"#\">$medical_officer->name</a></h2>
                            </td>
                            <td>$medical_officer->bmo_no</td>
                            <td>$medical_officer->address</td>
                            <td>$medical_officer->email</td>
                            <td>$medical_officer->status</td>
                        </tr>";
                }
            }
        }
        $data['result'] = $output;
        return json_encode($data);
    }
    public function searchByReg(Request $request){
        $medical_officers= MedicalOfficer::where('bmo_no','like','%'.$request->name.'%')->where('job_status',$request->status)->orderBy('id','DESC')->paginate(10);
        $output='';
        if ($medical_officers->count()>0){
            if($request->status == 'active'){
                foreach ($medical_officers as $medical_officer) {
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">R</a>
                                <h2><a href=\"#\">$medical_officer->name</a></h2>
                            </td>
                            <td>$medical_officer->bmo_no</td>
                            <td>$medical_officer->address</td>
                            <td>$medical_officer->email</td>
                            <td>$medical_officer->status</td>
                            <td>
                                <form method=\"post\" action=\"". route('bloodBank.mo.update',$medical_officer->id) ."\">
                                    <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                     <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" name=\"job_status\" value=\"inactive\">
                                    <button class=\"btn btn-danger m-r-5\" onclick=\"return confirm('Are you confirm to inactivate?')\"> Inactive</button>
                                </form>
                            </td>
                            <td class=\"text-right\">
                                <div class=\"dropdown dropdown-action\">
                                    <a href=\"#\" class=\"action-icon dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fa fa-ellipsis-v\"></i></a>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\" href=\" ".route('bloodBank.mo.edit',$medical_officer->id) ."\"><i class=\"fa fa-pencil m-r-5\"></i> Edit</a>
                                        <form method=\"post\" action=\"". route('bloodBank.mo.destroy',$medical_officer->id)."\">
                                         <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                             <input type=\"hidden\" name=\"_method\" value=\"delete\"> 
                                            <button class=\"dropdown-item fa fa-trash-o m-r-5\" onclick=\"return confirm('Are you confirm to delete?')\"> Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>";
                }
            }
            if($request->status == 'inactive'){
                foreach ($medical_officers as $medical_officer) {
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">R</a>
                                <h2><a href=\"#\">$medical_officer->name</a></h2>
                            </td>
                            <td>$medical_officer->bmo_no</td>
                            <td>$medical_officer->address</td>
                            <td>$medical_officer->email</td>
                            <td>$medical_officer->status</td>
                            <td>
                                <form method=\"post\" action=\"". route('bloodBank.mo.update',$medical_officer->id) ."\">
                                    <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                     <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" name=\"job_status\" value=\"active\">
                                    <button class=\"btn btn-danger m-r-5\" onclick=\"return confirm('Are you confirm to activate?')\"> Inactive</button>
                                </form>
                            </td>
                            <td class=\"text-right\">
                                <div class=\"dropdown dropdown-action\">
                                    <a href=\"#\" class=\"action-icon dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fa fa-ellipsis-v\"></i></a>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\" href=\" ".route('bloodBank.mo.edit',$medical_officer->id) ."\"><i class=\"fa fa-pencil m-r-5\"></i> Edit</a>
                                        <form method=\"post\" action=\"". route('bloodBank.mo.destroy',$medical_officer->id)."\">
                                         <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                             <input type=\"hidden\" name=\"_method\" value=\"delete\"> 
                                            <button class=\"dropdown-item fa fa-trash-o m-r-5\" onclick=\"return confirm('Are you confirm to delete?')\"> Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>";
                }
            }
        }

        if($request->status == 'rejected'){
            $medical_officers= MedicalOfficer::where('bmo_no','like','%'.$request->name.'%')->where('status',$request->status)->orderBy('id','DESC')->paginate(10);
            if($medical_officers->count()>0){
                foreach ($medical_officers as $medical_officer) {
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">R</a>
                                <h2><a href=\"#\">$medical_officer->name</a></h2>
                            </td>
                            <td>$medical_officer->bmo_no</td>
                            <td>$medical_officer->address</td>
                            <td>$medical_officer->email</td>
                            <td>$medical_officer->status</td>
                        </tr>";
                }
            }
        }
        $data['result'] = $output;
        return json_encode($data);
    }
}
