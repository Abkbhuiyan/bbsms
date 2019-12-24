@extends('layouts.admin.master')
@section('title','Approved Blood Banks List')
@section('custom_js')
<script src="{{asset('assets/js/bb_search.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">Current Blood Banks</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{route('bloodBank.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Blood Bank</a>
        </div>
    </div>
    <form action="{{route('bloodBank.index')}}" method="get">
    <div class="row filter-row">

            <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 col-12">
                <div class="form-group form-focus">
                    <label class="focus-label">Blood Bank Name</label>
                    <input required name="searchByName" cus-status="active" id="searchByName" type="text" cus-url="{{route('bloodBank.searchByName')}}" class="form-control floating" >
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 col-12">
                <div class="form-group form-focus">
                    <label class="focus-label">Blood Bank RegistrationNumber</label>
                    <input required name="searchByReg" cus-status="active" id="searchByReg" type="text" cus-url1="{{route('bloodBank.searchByReg')}}" class="form-control floating">
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
                        <th>Registration Number</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="searchData">
                    @foreach($bloodBanks as $bloodBank)
                        <tr>
                            <td>
                                <a href="{{route('bloodBank.show',$bloodBank->id)}}" class="avatar">R</a>
                                <h2><a href="{{route('bloodBank.show',$bloodBank->id)}}">{{$bloodBank->name}}</a></h2>
                            </td>
                            <td>{{$bloodBank->hospital_approval_number}}</td>
                            <td>{{$bloodBank->address}}</td>
                            <td>{{$bloodBank->email}}</td>
                          {{--  <td class="text-center">
                                <div class="dropdown action-label">
                                    <a class="custom-badge status-purple dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        New
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">New</a>
                                        <a class="dropdown-item" href="#">Pending</a>
                                        <a class="dropdown-item" href="#">Approved</a>
                                        <a class="dropdown-item" href="#">Declined</a>
                                    </div>
                                </div>
                            </td>--}}
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('bloodBank.edit',$bloodBank->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <form method="post" action="{{ route('bloodBank.destroy',$bloodBank->id) }}">
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
                        <span class="see-all-links" >{{$bloodBanks->links()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
