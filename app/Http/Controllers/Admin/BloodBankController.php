<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\BloodBank;
use Illuminate\Http\Request;

class BloodBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = BloodBank::where('status','active');
        if(isset($request->searchByName) && $request->searchByName != null){
            $query = $query->where('name','like','%'.$request->searchByName.'%');
        }
        if(isset($request->searchByReg) && $request->searchByReg != null){
            $query = $query->where('hospital_approval_number','like','%'.$request->searchByReg.'%');
        }
        $data['bloodBanks'] = $query->orderBy('id','DESC')->paginate(10);
        return view('admins.bloodBank.index',$data);
        //return view('bloodBank.bloodBanksList',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.bloodBank/create');
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
            'email' => 'required|unique:blood_banks',
            'password' => 'required|confirmed',
            'status' => 'required',
            'address' => 'required',
            'hospital_approval_number' => 'required|unique:blood_banks',
            'latitude' =>'max:90|min:-90',
            'longitude' => 'max:180|min:-180'
        ]);

        $blood_bank = $request->except('password','_token','password_confirmation');
        $blood_bank['password'] = bcrypt($request->password);

        BloodBank::create($blood_bank);
        session()->flash('successMessage','Blood bank Successfully Created!');
        return redirect()->route('bloodBank.index');
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
    public function edit(BloodBank $bloodBank)
    {
        $data['blood_bank'] = $bloodBank;
        return view('admins.bloodBank.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodBank $bloodBank)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' =>'max:90|min:-90',
            'longitude' => 'max:180|min:-180'
        ]);

        if($request->has('password')){
            $bloodBank->password = $request->password;
        }
        if($request->has('approved_by')){
            $bloodBank->approved_by = $request->approved_by;
        }
        if($request->has('status')){
            $bloodBank->status = $request->status;
        }
        if($request->has('address')){
            $bloodBank->address = $request->address;
        }
        if($request->has('longitude')){
            $bloodBank->longitude = $request->longitude;
        }
        if($request->has('latitude')){
            $bloodBank->latitude = $request->latitude;
        }
        if($request->has('name')){
            $bloodBank->name = $request->name;
        }

        $bloodBank->save();
        return redirect()->route('bloodBank.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodBank $bloodBank)
    {
        $bloodBank->delete();
        session()->flash('successMessage','Blood bank Successfully Deleted!');
        return redirect()->route('bloodBank.index');
    }

    public  function requests(){
        $data['bloodBanks'] = BloodBank::where('status','pending')->paginate(5);
        return view('admins.bloodBank.requests',$data);
    }
    public  function rejectedBloodBanks(){
        $data['bloodBanks'] = BloodBank::where('status','rejected')->paginate(5);
        return view('admins.bloodBank.rejected',$data);
    }
    public function updateRequest(Request $request, BloodBank $bloodBank)
    {
        $bloodBank->status = $request->status;
        $bloodBank->approved_by = $request->approved_by;
        $bloodBank->save();
        return redirect()->back();
    }

    public function searchByName(Request $request){
        $bloodBanks= BloodBank::where('name','like','%'.$request->name.'%')->where('status',$request->status)->orderBy('id','DESC')->paginate(10);
        $output='';
        if ($bloodBanks->count()>0){
            if($request->status == 'active'){
                foreach ($bloodBanks as $bloodBank) {
                    $output .=" <tr>
                            <td>
                                <a href=\"".route('bloodBank.show',$bloodBank->id)."\" class=\"avatar\">R</a>
                                <h2><a href=\"".route('bloodBank.show',$bloodBank->id)."\">$bloodBank->name</a></h2>
                            </td>
                            <td>$bloodBank->hospital_approval_number</td>
                            <td>$bloodBank->address</td>
                            <td>$bloodBank->email</td>                    
                            <td class=\"text-right\">
                                <div class=\"dropdown dropdown-action\">
                                    <a href=\"#\" class=\"action-icon dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fa fa-ellipsis-v\"></i></a>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\" href=\"".route('bloodBank.edit',$bloodBank->id)."\"><i class=\"fa fa-pencil m-r-5\"></i> Edit</a>
                                        <form method=\"post\" action=\" ".route('bloodBank.destroy',$bloodBank->id)." \">                     
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
            if($request->status == 'pending'){
                foreach($bloodBanks as $bloodBank){
                    $output .= "<tr>
                            <td>
                                <a href=\"".route('bloodBank.show',$bloodBank->id)."\" class=\"avatar\">R</a>
                                <h2><a href=\"".route('bloodBank.show',$bloodBank->id)."\">$bloodBank->name</a></h2>
                            </td>
                            <td>$bloodBank->hospital_approval_number</td>
                            <td>$bloodBank->address</td>
                            <td>$bloodBank->email</td>
                            <td >
                                <form method=\"post\" action=\"".route('bloodBank.updateRequest',$bloodBank->id)."\">
                                     <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                     <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" value=\"active\" name=\"status\" id=\"\" >
                                    <input type=\"hidden\" value=\"2\" name=\"approved_by\" id=\"\" >
                                    <button class=\"btn btn-info fa fa-check-circle m-r-5\" onclick=\"return confirm('Are you confirm to approve the request?')\"> Approve</button>
                                </form>
                            </td>
                            <td >
                                <form method=\"post\" action=\"{{route('bloodBank.updateRequest',$bloodBank->id) }}\">
                                    <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                    <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" value=\"rejected\" name=\"status\" id=\"\" >
                                    <input type=\"hidden\" value=\"2\" name=\"approved_by\" id=\"\" >
                                    <button class=\"btn  btn-outline-secondary fa fa-ban m-r-5\" onclick=\"return confirm('Are you confirm that you want to reject the request?')\"> Reject</button>
                                </form>
                            </td>

                        </tr>";
                }
            }
            if($request->status == 'rejected'){
                foreach($bloodBanks as $bloodBank){
                    $output .= "<tr>
                            <td>
                                <a href=\"".route('bloodBank.show',$bloodBank->id)."\" class=\"avatar\">R</a>
                                <h2><a href=\"".route('bloodBank.show',$bloodBank->id)."\">$bloodBank->name</a></h2>
                            </td>
                            <td>$bloodBank->hospital_approval_number</td>
                            <td>$bloodBank->address</td>
                            <td>$bloodBank->email</td>
                            <td >
                                <form method=\"post\" action=\"".route('bloodBank.updateRequest',$bloodBank->id)."\">
                                     <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                     <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" value=\"active\" name=\"status\" id=\"\" >
                                    <input type=\"hidden\" value=\"2\" name=\"approved_by\" id=\"\" >
                                    <button class=\"btn btn-info fa fa-check-circle m-r-5\" onclick=\"return confirm('Are you confirm to approve the request?')\"> Approve</button>
                                </form>
                            </td>
                        </tr>";
                }
            }


       }

         $data['result'] = $output;
        return json_encode($data);
    }
    public function searchByReg(Request $request){
        $bloodBanks= BloodBank::where('hospital_approval_number','like','%'.$request->name.'%')->where('status',$request->status)->orderBy('id','DESC')->paginate(10);
        $output='';
        if ($bloodBanks->count()>0){
            if($request->status == 'active'){
                foreach ($bloodBanks as $bloodBank) {
                    $output .=" <tr>
                            <td>
                                <a href=\"".route('bloodBank.show',$bloodBank->id)."\" class=\"avatar\">R</a>
                                <h2><a href=\"".route('bloodBank.show',$bloodBank->id)."\">$bloodBank->name</a></h2>
                            </td>
                            <td>$bloodBank->hospital_approval_number</td>
                            <td>$bloodBank->address</td>
                            <td>$bloodBank->email</td>                    
                            <td class=\"text-right\">
                                <div class=\"dropdown dropdown-action\">
                                    <a href=\"#\" class=\"action-icon dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fa fa-ellipsis-v\"></i></a>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\" href=\"".route('bloodBank.edit',$bloodBank->id)."\"><i class=\"fa fa-pencil m-r-5\"></i> Edit</a>
                                        <form method=\"post\" action=\" ".route('bloodBank.destroy',$bloodBank->id)." \">                     
                                            <input type=\"hidden\" name=\"_token\" value=\"PoHVUjujf2I78xEpFSzV7Cf1vTPBiULUrJTuXJhZ\">   
                                             <input type=\"hidden\" name=\"_method\" value=\"delete\">   
                                            <button class=\"dropdown-item fa fa-trash-o m-r-5\" onclick=\"return confirm('Are you confirm to delete?')\"> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>";
                }
            }
            if($request->status == 'pending'){
                foreach($bloodBanks as $bloodBank){
                    $output .= "<tr>
                            <td>
                                <a href=\"".route('bloodBank.show',$bloodBank->id)."\" class=\"avatar\">R</a>
                                <h2><a href=\"".route('bloodBank.show',$bloodBank->id)."\">$bloodBank->name</a></h2>
                            </td>
                            <td>$bloodBank->hospital_approval_number</td>
                            <td>$bloodBank->address</td>
                            <td>$bloodBank->email</td>
                            <td >
                                <form method=\"post\" action=\"".route('bloodBank.updateRequest',$bloodBank->id)."\">
                                     <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                     <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" value=\"active\" name=\"status\" id=\"\" >
                                    <input type=\"hidden\" value=\"2\" name=\"approved_by\" id=\"\" >
                                    <button class=\"btn btn-info fa fa-check-circle m-r-5\" onclick=\"return confirm('Are you confirm to approve the request?')\"> Approve</button>
                                </form>
                            </td>
                            <td >
                                <form method=\"post\" action=\"{{route('bloodBank.updateRequest',$bloodBank->id) }}\">
                                    <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                    <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" value=\"rejected\" name=\"status\" id=\"\" >
                                    <input type=\"hidden\" value=\"2\" name=\"approved_by\" id=\"\" >
                                    <button class=\"btn  btn-outline-secondary fa fa-ban m-r-5\" onclick=\"return confirm('Are you confirm that you want to reject the request?')\"> Reject</button>
                                </form>
                            </td>

                        </tr>";
                }


            }
            if($request->status == 'rejected'){
                foreach($bloodBanks as $bloodBank){
                    $output .= "<tr>
                            <td>
                                <a href=\"".route('bloodBank.show',$bloodBank->id)."\" class=\"avatar\">R</a>
                                <h2><a href=\"".route('bloodBank.show',$bloodBank->id)."\">$bloodBank->name</a></h2>
                            </td>
                            <td>$bloodBank->hospital_approval_number</td>
                            <td>$bloodBank->address</td>
                            <td>$bloodBank->email</td>
                            <td >
                                <form method=\"post\" action=\"".route('bloodBank.updateRequest',$bloodBank->id)."\">
                                     <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\">   
                                     <input type=\"hidden\" name=\"_method\" value=\"put\"> 
                                    <input type=\"hidden\" value=\"active\" name=\"status\" id=\"\" >
                                    <input type=\"hidden\" value=\"2\" name=\"approved_by\" id=\"\" >
                                    <button class=\"btn btn-info fa fa-check-circle m-r-5\" onclick=\"return confirm('Are you confirm to approve the request?')\"> Approve</button>
                                </form>
                            </td>
                        </tr>";
                }
            }
       }

         $data['result'] = $output;
        return json_encode($data);
    }
}
