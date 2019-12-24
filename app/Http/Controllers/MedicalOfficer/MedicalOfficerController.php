<?php

namespace App\Http\Controllers\MedicalOfficer;

use App\Http\Controllers\Controller;
use App\Http\Resources\User;
use Illuminate\Http\Request;

class MedicalOfficerController extends Controller
{
    public function index(){

        return view('medicalOfficers.dashboard');
    }

    public function searhcDonor(){
        return view('medicalOfficers.searchDonor');
    }
    public function newSerology($id){
        dd($id);
    }
    public function newTransfusion($user){
        dd($user);
    }
}
