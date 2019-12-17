@extends('layouts.admin.master')
@section('title','Pending Blood Donors List')
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">Rejected Donors List</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{route('bloodDonor.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Blood Donor</a>
        </div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Donor Name</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Email</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Phone</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-12">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                    <tr>
                        <th>Donor Name</th>
                        <th>NID No</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Re-approve</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bloodDonors as $bloodDonor)
                        <tr>
                            <td>
                                <a href="{{route('bloodDonor.show',$bloodDonor->id)}}" class="avatar">R</a>
                                <h2><a href="{{route('bloodDonor.show',$bloodDonor->id)}}">{{$bloodDonor->name}}</a></h2>
                            </td>
                            <td>{{$bloodDonor->nid_no}}</td>
                            <td>{{$bloodDonor->phone}}</td>
                            <td>{{$bloodDonor->email}}</td>
                            <td >
                                <form method="post" action="{{ route('bloodDonor.updateRequest',$bloodDonor->id) }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="active" name="status" id="" >
                                    <input type="hidden" value="2" name="approved_by" id="" >
                                    <button class="btn btn-info fa fa-check-circle m-r-5" onclick="return confirm('Are you confirm to approve the request?')">Active</button>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="see-all">
                        <span class="see-all-links" >{{$bloodDonors->render()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
