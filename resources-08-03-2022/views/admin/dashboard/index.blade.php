@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
@php
$users = App\Models\User::where('status','1')->get();
$businesses = App\Models\Business::where('status','1')->get();
$events = App\Models\Event::where('status','1')->get();
$deals = App\Models\Deal::where('status','1')->get();
$properties = App\Models\Property::where('status','1')->get();
$categories = App\Models\Category::where('status','1')->get();
$loops = App\Models\Loop::where('status','1')->get();
@endphp
<style type="text/css">
    .row-md-body.no-nav {
    margin-top: 70px;
}
</style>
<div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
</div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Active Users</h4>
                    <p><b> {{count($users)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-thumbs-o-up fa-3x"></i>
                <div class="info">
                    <h4>Registered Business</h4>
                    <p><b> {{count($businesses)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Active Events</h4>
                    <p><b>{{count($events)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Active Deals</h4>
                    <p><b>{{count($deals)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-thumbs-o-up fa-3x"></i>
                <div class="info">
                    <h4>Registered Properties</h4>
                    <p><b>{{count($properties)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Active Categories</h4>
                    <p><b>{{count($categories)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Active Loops</h4>
                    <p><b> {{count($loops)}} </b></p>
                </div>
            </div>
        </div>
    </div>
@endsection