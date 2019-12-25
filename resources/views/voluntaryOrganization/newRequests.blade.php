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
                                <th>Requester Name</th>
                                <th>Blood Group</th>
                                <th>Phone</th>
                                <th>Hospital</th>
                                <th>Required at</th>
                                <th class="text-center">Accept</th>
                                <th class="text-center">Reject</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($requests as $vOrg)
                                    <tr>
                                        <td>{{$vOrg->requestor_name}}</td>
                                        <td>{{$vOrg->bloodGroup->group_name.' '.$vOrg->bloodGroup->rh_factor}}</td>
                                        <td>{{$vOrg->phone}}</td>
                                        <td>{{$vOrg->hospital}}</td>
                                        <td>{{$vOrg->need_date}}</td>
                                        <td>
                                            <form  method="post" action="{{ route('vOrg.updateRequest',$vOrg->id) }}">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="status" value="rejected">
                                                <button class="btn btn-danger fa fa-trash " onclick="return confirm('Are you sure you want to reject??')"> Reject</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form  method="post" action="{{ route('vOrg.updateRequest',$vOrg->id) }}">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="status" value="accepted">
                                                <button class="btn btn-success fa fa-check-circle-o " onclick="return confirm('Are you sure you want to reject??')"> Accept</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $requests->render() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
 @endsection
