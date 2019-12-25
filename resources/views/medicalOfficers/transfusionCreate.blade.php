@extends('layouts.medicalOfficer.master')
@section('title','Insert Donor Transfusion History')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Save Transfusion Info</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('medicalOfficer.donor.saveTransfusion',$user_id)}}" method="post" enctype="multipart/form-data">
                <caption class="text text-danger">All fileds are required *</caption>
                @csrf
                <div class="row">
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Donated To<span class="text-danger"></span></label>
                            <input type="text" class="form-control" name="donated_to" value="{{old('donated_to')}}">
                            @error('donated_to')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Transfusion Type<span class="text-danger"></span></label>
                            <input type="text" class="form-control" name="transfusion_type" value="{{old('transfusion_type')}}">
                            @error('transfusion_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 m-t-20 text-center">
                        <button type="submit" name="submit" class="btn btn-primary submit-btn">Save Report</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
