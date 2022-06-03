@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
                    <tbody>
                        <tr>
                            <td>Advertisement Name</td>
                            <td>{{ empty($ad['title'])? null:$ad['title'] }}</td>
                        </tr>

                        <tr>
                            <td>Image</td>
                            <td>@if($ad->image='')
                                <img style="width: 150px;height: 100px;" src="{{URL::to('/').'/advertisements/'}}{{$ad->image}}">

                                        @else

                                            <img src="{{asset('businesses/placeholder-image.png')}}" height='100' width='100'>
                                            @endif</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ empty($business->ad['description'])? null:($ad->business['description']) }}</td>
                        </tr>

                        <tr>
                            <td>Postcode</td>
                            <td>{{ empty($ad['target_postcode'])? null:$ad['target_postcode'] }}</td>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <td>{{ empty($ad['start_date'])? null:($ad['start_date']) }}</td>
                        </tr>
                        <tr>
                            <td>End Date</td>
                            <td>{{ empty($ad['end_date'])? null:($ad['end_date']) }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <p>Business List - {{ empty($ad['business_name'])? null:$ad['business_name'] }}</p>
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Image </th>
                                <th> Expiry Date </th>
                                <th> Price</th>
                                <th> Promo Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ dd($ad->business->id) }} --}}

                                <tr>
                                    <td>{{ $ad->business->id }}</td>
                                    <td>{{ $ad->business->name }}</td>
                                    <td>

                                        {!! $ad->business->desc !!}
                                    </td>
                                    <td>
                                        @if($ad->business->image='')
                                        <img style="width: 150px;height: 100px;" src="{{URL::to('/').'/business/'}}{{$ad->business->image}}">

                                        @else

                                            <img src="{{asset('businesses/placeholder-image.png')}}" height='100' width='100'>
                                            @endif</td>
                                    </td>
                                    <td>{{ date("d-M-Y",strtotime($ad->business->establish_year)) }}</td>
                                    <td>${{ $ad->business->price }}</td>
                                    <td>{{$ad->business->promo_code}}</td>

                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
