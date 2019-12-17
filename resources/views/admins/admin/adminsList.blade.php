@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">BBSMS Admins</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{route('user.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Admin</a>
        </div>
    </div>
    {{-- admin profiles section started --}}
    <div class="row doctor-grid">
       @foreach($admins as $admin)
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="#"><img alt="" src="@if($admin->image != null){{asset($admin->image)}}@else{{asset('assets/img/user/default_user.jpg')}} @endif"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.edit',$admin->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <form method="post" action="{{ route('user.destroy',$admin->id) }}" data-toggle="modal" data-target="#delete_doctor">
                                @csrf
                                @method('delete')
                                <button class="dropdown-item" onclick="return confirm('Are you confirm to delete?')"><i class="fa fa-trash-o m-r-5"></i>Delete</button>
                            </form>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">{{$admin->name}}</a></h4>
                    <div class="doc-prof">{{$admin->status}}</div>
                    <div class="user-country">
                        <i class="fa fa-phone-square"></i> {{$admin->phone}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="see-all">
                <span class="see-all-links" >{{$admins->render()}}</span>
            </div>
        </div>
    </div>
@endsection
