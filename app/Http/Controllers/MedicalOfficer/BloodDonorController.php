<?php

namespace App\Http\Controllers\MedicalOfficer;

use App\BloodGroup;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class BloodDonorController extends Controller
{
    public function create(){

    }

    public function save(Request $request){

    }
    public function searchByName(Request $request){
        $bloodDonors= User::where('name','like','%'.$request->name.'%')->orderBy('id','DESC')->paginate(10);
        $output='';
        if ($bloodDonors->count()>0){
            if($request->status == 'active'){
                foreach ($bloodDonors as $bloodDonor) {
                    $group = BloodGroup::findOrFail($bloodDonor->blood_group_id);
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">".asset('public/'.$bloodDonor->image)."</a>
                                <h2><a href=\"#\">$bloodDonor->name</a></h2>
                            </td>
                            <td>$bloodDonor->phone</td>
                            <td>$bloodDonor->nid_no</td>
                            <td>$group->group_name $group->rh_factor</td>                    
                            <td>$bloodDonor->last_donation_date</td>                    
                            <td>$bloodDonor->status</td>                    
                            <td >
                                    <a href=\"".route('medicalOfficer.donor.newSerology',$bloodDonor->id)."\" class=\"btn btn-info\" ><i class=\"fa fa-crosshairs\"></i>Serology </a>
                                    <span>|</span>
                                    <a href=\"".route('medicalOfficer.donor.newTransfusion',$bloodDonor->id)."\" class=\"btn btn-info\" ><i class=\"fa fa-terminal\"></i>Transfusion </a>
                            </td>
                        </tr>";
                }
            }
        }

        $data['result'] = $output;
        return json_encode($data);
    }
    public function searchByReg(Request $request){
        $bloodDonors= User::where('email','like','%'.$request->name.'%')->orderBy('id','DESC')->paginate(10);
        $output='';
        if ($bloodDonors->count()>0){
            if($request->status == 'active'){
                foreach ($bloodDonors as $bloodDonor) {
                    $group = BloodGroup::findOrFail($bloodDonor->blood_group_id);
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">".asset('public/'.$bloodDonor->image)."</a>
                                <h2><a href=\"#\">$bloodDonor->name</a></h2>
                            </td>
                            <td>$bloodDonor->phone</td>
                            <td>$bloodDonor->nid_no</td>
                            <td>$group->group_name $group->rh_factor</td>                    
                            <td>$bloodDonor->last_donation_date</td>                    
                            <td>$bloodDonor->status</td>                    
                            <td >
                                    <a href=\"".route('medicalOfficer.donor.newSerology',$bloodDonor->id)."\" class=\"btn btn-info\" ><i class=\"fa fa-crosshairs\"></i>Serology </a>
                                    <span>|</span>
                                    <a href=\"".route('medicalOfficer.donor.newTransfusion',$bloodDonor->id)."\" class=\"btn btn-info\" ><i class=\"fa fa-terminal\"></i>Transfusion </a>
                            </td>
                        </tr>";
                }
            }
        }

        $data['result'] = $output;
        return json_encode($data);
    }
    public function searchByPhone(Request $request){

        $bloodDonors= User::where('phone','like','%'.$request->name.'%')->orderBy('id','DESC')->paginate(10);
        $output='';
        if ($bloodDonors->count()>0){
            if($request->status == 'active'){
                foreach ($bloodDonors as $bloodDonor) {
                    $group = BloodGroup::findOrFail($bloodDonor->blood_group_id);
                    $output .=" <tr>
                            <td>
                                <a href=\"#\" class=\"avatar\">".asset('public/'.$bloodDonor->image)."</a>
                                <h2><a href=\"#\">$bloodDonor->name</a></h2>
                            </td>
                            <td>$bloodDonor->phone</td>
                            <td>$bloodDonor->nid_no</td>
                            <td>$group->group_name $group->rh_factor</td>                    
                            <td>$bloodDonor->last_donation_date</td>                    
                            <td>$bloodDonor->status</td>                    
                            <td >
                                    <a href=\"".route('medicalOfficer.donor.newSerology',$bloodDonor->id)."\" class=\"btn btn-info\" ><i class=\"fa fa-crosshairs\"></i>Serology </a>
                                    <span>|</span>
                                    <a href=\"".route('medicalOfficer.donor.newTransfusion',$bloodDonor->id)."\" class=\"btn btn-info\" ><i class=\"fa fa-terminal\"></i>Transfusion </a>
                            </td>
                        </tr>";
                }
            }
        }

        $data['result'] = $output;
        return json_encode($data);
    }
}
