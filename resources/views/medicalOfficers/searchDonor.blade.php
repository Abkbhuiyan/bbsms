@extends('layouts.medicalOfficer.master')
@section('title','Search For a Blood Donor')
@section('custom_js')
    <script src="{{asset('assets/js/bb_search.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">Find a donor details</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{route('medicalOfficer.donor.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Register a new donor</a>
        </div>
    </div>
    <div class="row filter-row">

        <div class="col-sm-6 col-md-5 col-lg-5 col-xl-3 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Search By Name</label>
                <input required name="searchByName" cus-status="active" id="searchByName" type="text" cus-url="{{route('medicalOfficer.donor.searchByName')}}" class="form-control floating" >
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 col-xl-3 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Search By email</label>
                <input required name="searchByReg" cus-status="active" id="searchByReg" type="text" cus-url1="{{route('medicalOfficer.donor.searchByReg')}}" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 col-xl-3 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Search By Phone</label>
                <input required name="searchByPhone" cus-status="active" id="searchByPhone" type="text" cus-url2="{{route('medicalOfficer.donor.searchByPhone')}}" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-2 col-xl-3 col-12">
            <button class="btn btn-success btn-block" type="submit"> Search </button>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>NID</th>
                        <th>BLood Group</th>
                        <th>Last Donation</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="searchData">
                    </tbody>
                </table>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="see-all">
{{--                        <span class="see-all-links" >{{$bloodBanks->render()}}</span>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
