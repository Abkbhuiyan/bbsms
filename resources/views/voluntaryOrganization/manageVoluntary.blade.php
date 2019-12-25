@extends('layouts.voluntaryOrganization.master')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View Voluntary</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Donor Name</th>
                                <th>Blood Group</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            @php ($i = 1)

                            <tbody>
                                @foreach($viewVoluntaryOrganizations as $vOrg)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$vOrg->name}}</td>
                                        <td>{{$vOrg->bloodGroup->group_name.' '.$vOrg->bloodGroup->rh_factor}}</td>
                                        <td>{{$vOrg->phone}}</td>
                                        <td>{{$vOrg->address}}</td>
                                        <td>
                                            <a class="btn btn-primary fa fa-edit" href="{{ route('vOrg.editDonor',$vOrg->id) }}">Edit</a>
                                            <form  method="post" action="{{ route('vOrg.deleteDonor',$vOrg->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger fa fa-trash " onclick="return confirm('Are you confirm to delete?')"> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $viewVoluntaryOrganizations->render() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
 @endsection
