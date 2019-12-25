<?php

namespace App\Http\Controllers\MedicalOfficer;

use App\BloodTransfusionHistory;
use App\DonorSerologyHistory;
use App\Http\Controllers\Controller;
use App\Http\Resources\User;
use App\SerologyTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MedicalOfficerController extends Controller
{
    public function index(){

        return view('medicalOfficers.dashboard');
    }

    public function searhcDonor(){
        return view('medicalOfficers.searchDonor');
    }

    public function newSerology($id){
        $data['user_id'] = $id;
        $data['serologyTests'] = SerologyTest::all();
       return view('medicalOfficers.create',$data);
    }

    public  function saveSerology(Request $request){

            for ($i=1;$i<8;$i++){
                $data['user_id'] = $request->user_id;
                $t = $i;
                //$serologyHistory->test_id = $request->$t;
                $a = 'result'.$i;
                $r = $request->$a;
                $data['result'] = $r.'.';
                $data['test_id'] = $t;
                $data['medical_officer_id'] = auth()->user()->id;
                DonorSerologyHistory::create($data);
            }
        session()->flash('successMessage','Serology results added.');
        return redirect()->route('medicalOfficer.donor.check',$request->user_id);
    }
    public function newTransfusion($id){
        $data['user_id'] = $id;
        return view('medicalOfficers.transfusionCreate',$data);
    }

    public function saveTransfusion(Request $request){
        //dd($request->all());
        $request->validate([
           'donated_to'=>'required',
           'transfusion_type'=>'required',
        ]);

        $dth = new BloodTransfusionHistory();
        $dth->user_id = $request->user_id;
        $dth->donated_to = $request->donated_to;
        $dth->transfusion_type = $request->transfusion_type;
        $dth->mo_id = auth()->user()->id;
        $dth->save();
        $donor = \App\User::findOrFail($request->user_id);
        $donor->last_donation_date = date('Y-m-d');
        $donor->save();
        session()->flash('successMessage','Serology results added.');
        return redirect()->route('medicalOfficer.donor.check',$request->user_id);
    }

    public function myHistory(){
        $trn = BloodTransfusionHistory::where('mo_id', auth()->user()->id)->paginate(5);
        $donors =  array();
        foreach ($trn as $t){
            $d = \App\User::findOrFail($t->user_id);
            array_push($donors,$d);
        }
        $data['transfusions'] = $trn;
        $data['donors'] = $donors;
        return view('medicalOfficers.myTransfusionHistory',$data);
    }

}
