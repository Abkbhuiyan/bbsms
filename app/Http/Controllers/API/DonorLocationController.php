<?php

namespace App\Http\Controllers\API;

use App\DonorLocation;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class DonorLocationController extends BaseController
{
    public function update(Request $request, DonorLocation $donorLocation ){
       // $donorLocation = new DonorLocation();
       // $donorLocation = DonorLocation::where('user_id',$donor_id)->first();
       // $success['donor'] =  $donorLocation;
       // return $this->sendResponse($success,'test');
        $input = $request->all();

        $validator = Validator::make($input,[
           'lattitude' => 'required',
           'longitude' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $donorLocation->lattitude = $input['lattitude'];
        $donorLocation->longitude = $input['longitude'];
       // dd($input['lattitude']);
        $donorLocation->save();
        return $this->sendResponse(new \App\Http\Resources\DonorLocation($donorLocation), 'Location updated successfully.');
    }
}
