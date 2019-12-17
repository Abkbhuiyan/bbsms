@extends('layouts.admin.master')
@section('title','Approved Blood Banks List')
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">Approved Voluntary Organizations</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{route('voluntaryOrganization.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Voluntary Organization</a>
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
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vOrgs as $vOrg)
                        <tr>
                            <td>
                                <a href="{{route('vOrg.show',$vOrg->id)}}" class="avatar"><img src="@if($vOrg->logo != null){{asset($vOrg->logo)}}@else{{asset('assets/vorg/img/default.jpg')}}@endif" alt=""></a>
                                <h2><a href="{{route('vOrg.show',$vOrg->id)}}">{{$vOrg->group_name}}</a></h2>
                            </td>
                            <td>{{$vOrg->address}}</td>
                            <td>{{$vOrg->district}}</td>
                            <td>{{$vOrg->website_address}}</td>
                            <td>{{$vOrg->group_contact}}</td>
                            <td>{{$vOrg->admin_contact}}</td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('vOrg.edit',$vOrg->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <form method="post" action="{{ route('vOrg.destroy',$vOrg->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item fa fa-trash-o m-r-5" onclick="return confirm('Are you confirm to delete?')"> Delete</button>
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
                        <span class="see-all-links" >{{$vOrgs->render()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
