@extends('layouts.admin.master')
@section('title','Update Blood Bank Info')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Update Blood Bnak Info</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('bloodBank.update',$blood_bank->id)}}" method="post" >
                @csrf
                @method('put')
                <div class="row">
                    @include('admins.bloodBank._form')
                    <div class="col-sm-12 m-t-20 text-center">
                        <button type="submit" name="submit" class="btn btn-primary submit-btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
