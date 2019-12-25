<?php

namespace App\Http\Controllers\MedicalOfficer;

use App\BloodGroup;
use App\BloodTransfusionHistory;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BloodDonorController extends Controller
{
    public function create(){
        $data['bloodGroups'] = BloodGroup::all();
        return view('medicalOfficers.donor.create',$data);
    }

    public function save(Request $request){
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
        return redirect()->back();
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
                                    <a href=\"".route('medicalOfficer.donor.check',$bloodDonor->id)."\" class=\"btn btn-info\" ><i class=\"fa fa-crosshairs\"></i>Check Eligibility </a>                                
                            </td>
                        </tr>";
                }
            }
        }

        $data['result'] = $output;
        return json_encode($data);
    }
    public function searchByReg(Request $request){
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
                                    <a href=\"".route('medicalOfficer.donor.check',$bloodDonor->id)."\" class=\"btn btn-info\" ><i class=\"fa fa-crosshairs\"></i>Check Eligibility </a>                                
                            </td>
                        </tr>";
                }
            }
        }

        $data['result'] = $output;
        return json_encode($data);
    }

    public function checkEligibility($id){
        $data['donor'] = User::findOrFail($id);
        $q = "select * from `blood_transfusion_histories` where `user_id`=".$id;
        $dh = DB::select($q);
        $data['donationCount'] = count($dh);
        $data['bloodGroup'] = BloodGroup::findOrFail($data['donor']->blood_group_id);
        $lastdonation = 0;

        if($data['donor']->last_donation_date != null){
            $qry = 'SELECT DATEDIFF(NOW(),"'.$data['donor']->last_donation_date.'") as days';
            $diff =  DB::select($qry);
            $lastdonation = $diff[0]->days;
        }

        $data['lastDonation'] =$lastdonation;
        return view('medicalOfficers.checkDonor',$data);
    }

    private function num_of_donation($u_id){
        $num = BloodTransfusionHistory::where('user_id',$u_id)->get();
        dd($num);
    }
}
