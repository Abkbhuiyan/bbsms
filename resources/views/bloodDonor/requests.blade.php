@extends('layouts.admin.master')
@section('title','Approved Blood Banks List')
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">Current Blood Banks Requests</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{route('bloodBank.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Blood Bank</a>
        </div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Blood Bank Name</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Blood Registration Number</label>
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
                        <th>Blood Bank Name</th>
                        <th>Registration Number</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Approve</th>
                        <th>Reject</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bloodBanks as $bloodBank)
                        <tr>
                            <td>
                                <a href="{{route('bloodBank.show',$bloodBank->id)}}" class="avatar">R</a>
                                <h2><a href="{{route('bloodBank.show',$bloodBank->id)}}">{{$bloodBank->name}}</a></h2>
                            </td>
                            <td>{{$bloodBank->hospital_approval_number}}</td>
                            <td>{{$bloodBank->address}}</td>
                            <td>{{$bloodBank->email}}</td>
                            <td >
                                <form method="post" action="{{ route('bloodBank.updateRequest',$bloodBank->id) }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="active" name="status" id="" >
                                    <input type="hidden" value="2" name="approved_by" id="" >
                                    <button class="btn btn-info fa fa-check-circle m-r-5" onclick="return confirm('Are you confirm to approve the request?')"> Approve</button>
                                </form>
                            </td>
                            <td >
                                <form method="post" action="{{route('bloodBank.updateRequest',$bloodBank->id) }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="rejected" name="status" id="" >
                                    <input type="hidden" value="2" name="approved_by" id="" >
                                    <button class="btn  btn-outline-secondary fa fa-ban m-r-5" onclick="return confirm('Are you confirm that you want to reject the request?')"> Reject</button>
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
                        <span class="see-all-links" >{{$bloodBanks->render()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
