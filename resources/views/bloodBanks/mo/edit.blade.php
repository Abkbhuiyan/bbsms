@extends('layouts.bloodBank.master')
@section('title','Update Medical Officer Info')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Update MO Info</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('bloodBank.mo.update',$mo->id)}}" method="post">
                @csrf
                <div class="row">
                    @include('admins.bloodDonor._form')
                    <div class="col-sm-12 m-t-20 text-center">
                        <button type="submit" name="submit" class="btn btn-primary submit-btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
