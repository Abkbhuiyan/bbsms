@extends('layouts.voluntaryOrganization.master')

@section('title')
 add-voluntary
@endsection

@section('content')
  <div class="row">
      <div class="col-lg-8 offset-2">
          <form action="{{route('vOrg.newVoluntary')}}" method="post">
              @csrf
              <div class="card mb-5">
                  <div class="card-header bg-success">
                      <h1 class="text-center">Add Donor</h1>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <label>Name:</label>
                          <input type="text" name="name" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Phone Number:</label>
                          <input type="text" name="phone" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Address:</label>
                          <textarea type="text" name="address" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <label>Blood Group</label>
                          <select name="blood_group_id" class="form-control">
                              <option>---Select Blood Group---</option>
                              @foreach($bloodGroups as $bloodGroup)
                                  <option value="{{$bloodGroup->id}}">{{$bloodGroup->group_name .''.$bloodGroup->rh_factor}}</option>
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
