@extends('layouts.voluntaryOrganization.master')

@section('title')
 Edit Donor
@endsection

@section('content')
  <div class="row">
      <div class="col-lg-8 offset-2">
          <form action="{{route('vOrg.updateDonor',$orgDatabase->id)}}" method="post">
              @csrf
              @method('put')
              <div class="card mb-5">
                  <div class="card-header bg-success">
                      <h1 class="text-center">Edit Donor</h1>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <label>Name:</label>
                          <input type="text" value="{{$orgDatabase->name}}" name="name" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Phone Number:</label>
                          <input type="text" name="phone" value="{{$orgDatabase->phone}}" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Address:</label>
                          <textarea type="text" name="address" class="form-control">{{$orgDatabase->address}}</textarea>
                      </div>
                      <div class="form-group">
                          <label>Blood Group</label>
                          <select name="blood_group_id" class="form-control">
                              <option>---Select Blood Group---</option>
                              @foreach($bloodGroups as $bloodGroup)
                                  <option @if($orgDatabase->blood_group_id == $bloodGroup->id){{'selected'}}@endif value="{{$bloodGroup->id}}">{{$bloodGroup->group_name .''.$bloodGroup->rh_factor}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <button type="submit" name="btn" class="btn btn-success btn-block">Add Donor</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
@endsection
