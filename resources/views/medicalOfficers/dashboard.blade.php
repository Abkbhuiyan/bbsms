@extends('layouts.medicalOfficer.master')
@section('title','Blood Bank Dashboard')
@section('custom_js')
    <script src="{{asset('assets/js/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
                <span class="dash-widget-bg1"><i class="fa fa-tint" aria-hidden="true"></i></span>
                <div class="dash-widget-info text-right">
                    <h3></h3>
                    <span class="widget-title1">Total Blood Transfusion<i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
                <span class="dash-widget-bg2"><i class="fa fa-user-md"></i></span>
                <div class="dash-widget-info text-right">
                    <h3></h3>
                    <span class="widget-title2">Active Medical Officers <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
                <span class="dash-widget-bg4"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                <div class="dash-widget-info text-right">
                    <h3></h3>
                    <span class="widget-title4">Inactive Medical Officers <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>

@endsection
