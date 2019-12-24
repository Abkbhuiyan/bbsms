@extends('layouts.bloodBank.master')
@section('title','Add New Medical Officer')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add New Medical Officer</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('bloodBank.mo.save')}}" method="post" >
                @csrf
                <div class="row">
                    @include('bloodBanks.mo._form')
                    <div class="col-sm-12 m-t-20 text-center">
                        <button type="submit" name="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
