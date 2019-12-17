@extends('layouts.admin.master')
@section('title','Add a new Voluntary Organization')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Voluntary Organization</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('voluntaryOrganization.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @include('admins.vOrg._form')
                    <div class="col-sm-12 m-t-20 text-center">
                        <button type="submit" name="submit" class="btn btn-primary submit-btn">Save Organization Info</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
