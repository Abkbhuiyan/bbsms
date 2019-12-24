@extends('layouts.bloodBank.master')
@section('title','Your current medical officers!')
@section('custom_js')
<script src="{{asset('assets/js/bb_search.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">Current Medical Officers</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{route('bloodBank.mo.new')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> New MO</a>
        </div>
    </div>
    <form action="{{route('bloodBank.active')}}" method="get">
    <div class="row filter-row">

            <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 col-12">
                <div class="form-group form-focus">
                    <label class="focus-label">MO name</label>
                    <input required name="searchByName" cus-status="active" id="searchByName" type="text" cus-url="{{route('bloodBank.mo.searchByName')}}" class="form-control floating" >
                </div>
            </div>

            <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 col-12">
                <div class="form-group form-focus">
                    <label class="focus-label">BMA Approval No</label>
                    <input required name="searchByReg" cus-status="active" id="searchByReg" type="text" cus-url1="{{route('bloodBank.mo.searchByReg')}}" class="form-control floating">
                </div>
            </div>
            <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2 col-12">
                <button class="btn btn-success btn-block" type="submit"> Search </button>
            </div>
    </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive" >
                <table class="table table-striped custom-table mb-0 datatable" id="tSearch">
                    <thead>
                    <tr>
                        <th>Blood Bank Name</th>
                        <th>BMA Approval No</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Approval Status</th>
                        <th>Action</th>
                        <th class="text-right">More</th>
                    </tr>
                    </thead>
                    <tbody id="searchData">
                    @foreach($medical_officers as $medical_officer)
                        <tr>
                            <td>
{{--                                <a href="{{route('bloodBank.mo.show',$medical_officer->id)}}" class="avatar">R</a>--}}
                                <a href="#" class="avatar">R</a>
{{--                                <h2><a href="{{route('bloodBank.mo.show',$medical_officer->id)}}">{{$medical_officer->name}}</a></h2>--}}
                                <h2><a href="#">{{$medical_officer->name}}</a></h2>
                            </td>
                            <td>{{$medical_officer->bmo_no}}</td>
                            <td>{{$medical_officer->address}}</td>
                            <td>{{$medical_officer->email}}</td>
                            <td>{{$medical_officer->status}}</td>
                            <td>
                                <form method="post" action="{{ route('bloodBank.mo.update',$medical_officer->id) }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="job_status" value="inactive">
                                    <button class="btn btn-danger m-r-5" onclick="return confirm('Are you confirm to inactivate?')"> Inactive</button>
                                </form>
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('bloodBank.edit',$medical_officer->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <form method="post" action="{{ route('bloodBank.destroy',$medical_officer->id) }}">
                                            @csrf
                                            @method('put')
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
                        <span class="see-all-links" >{{$medical_officers->links()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
