@extends('layouts.admin.master')
@section('title','Rejected Voluntary OrganizationList')
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">Rejected/Banned Voluntary Organizations</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{route('voluntaryOrganization.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> New Organization</a>
        </div>
    </div>

    <div class="row filter-row">
        <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Search By Name</label>
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
                        <th>Organization Name</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Website Address</th>
                        <th>Contact</th>
                        <th>Admin Contact</th>
                        <th class="text-right">Approve</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vOrgs as $vOrg)
                        <tr>
                            <td>
                                <a href="{{route('voluntaryOrganization.show',$vOrg->id)}}" class="avatar"><img src="@if($vOrg->logo != null){{asset($vOrg->logo)}}@else{{asset('assets/vorg/img/default.jpg')}}@endif" alt=""></a>
                                <h2><a href="{{route('voluntaryOrganization.show',$vOrg->id)}}">{{$vOrg->group_name}}</a></h2>
                            </td>
                            <td>{{$vOrg->address}}</td>
                            <td>{{$vOrg->district}}</td>
                            <td>{{$vOrg->website_address}}</td>
                            <td>{{$vOrg->group_contact}}</td>
                            <td>{{$vOrg->admin_contact}}</td>
                            <td >

                                <form method="post" action="{{ route('voluntaryOrganization.updateRequest',$vOrg->id) }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="active" name="status" id="" >
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
                        <span class="see-all-links" >{{$vOrgs->render()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
