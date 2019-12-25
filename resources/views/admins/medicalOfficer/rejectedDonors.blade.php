@extends('layouts.admin.master')
@section('title','Pending Medical Officers List')
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">All MO Requests</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                    <tr>
                        <th> Name</th>
                        <th>BMA Approval No</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Requestor</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medicalOfficers as $medicalOfficer)
                        <tr>
                            <td>
                                <a href="#" class="avatar">R</a>
                                <h2><a href="#">{{$medicalOfficer->name}}</a></h2>
                            </td>
                            <td>{{$medicalOfficer->bmo_no}}</td>
                            <td>{{$medicalOfficer->phone}}</td>
                            <td>{{$medicalOfficer->email}}</td>
                            <td>{{$medicalOfficer->address}}</td>
                            <td>{{$medicalOfficer->bloodBank->name}}</td>

                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form method="post" action="{{ route('medicalOfficer.updateRequest',$medicalOfficer->id) }}">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" value="active" name="status" id="" >
                                            <button class="btn btn-success fa fa-check-circle m-r-5" onclick="return confirm('Are you confirm to approve the Medical Officer?')">Approve</button>
                                        </form>
                                        <span></span>
                                        <form method="post" action="{{ route('medicalOfficer.updateRequest',$medicalOfficer->id) }}">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" value="rejected" name="status" id="" >
                                            <button class="btn btn-danger fa fa-check-circle m-r-5" onclick="return confirm('Are you confirm to reject the medical officer?')">Reject</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="see-all">
                        <span class="see-all-links" >{{$medicalOfficers->render()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
