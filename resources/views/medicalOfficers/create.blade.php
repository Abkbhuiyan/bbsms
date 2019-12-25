@extends('layouts.medicalOfficer.master')
@section('title','Insert Donor Serology History')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Save Serology History</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('medicalOfficer.donor.saveSerology',$user_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @include('medicalOfficers._form')
                    <div class="col-sm-12 m-t-20 text-center">
                        <button type="submit" name="submit" class="btn btn-primary submit-btn">Save Report</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
