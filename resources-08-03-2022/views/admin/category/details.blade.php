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
                <div class="tile-body">
                    <p>Deal List - {{ empty($category['title'])? null:$category['title'] }}</p>
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
                            @foreach($category->deals as $key => $deal)
                                <tr>
                                    <td>{{ $deal->id }}</td>
                                    <td>{{ $deal->title }}</td>
                                    <td>
                                        @php 
                                            $desc = strip_tags($deal['description']);
                                            $length = strlen($desc);
                                            if($length>50)
                                            {
                                                $desc = substr($desc,0,50)."...";
                                            }else{
                                                $desc = substr($desc,0,50);
                                            }
                                        @endphp
                                        {!! $desc !!}
                                    </td>
                                    <td>
                                        @if($deal->image!='')
                                        <img style="width: 150px;height: 100px;" src="{{URL::to('/').'/deals/'}}{{$deal->image}}">
                                        @endif
                                    </td>
                                    <td>{{ date("d-M-Y",strtotime($deal->expiry_date)) }}</td>
                                    <td>${{ $deal->price }}</td>
                                    <td>{{$deal->promo_code}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <p>Event List - {{ empty($category['title'])? null:$category['title'] }}</p>
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> Title </th>
                                <th> Description </th>
                                <th> Image </th>
                                <th> Start Date </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->events as $key => $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>
                                        @php 
                                            $desc = strip_tags($event['description']);
                                            $length = strlen($desc);
                                            if($length>50)
                                            {
                                                $desc = substr($desc,0,50)."...";
                                            }else{
                                                $desc = substr($desc,0,50);
                                            }
                                        @endphp
                                        {!! $desc !!}
                                    </td>
                                    <td>
                                        @if($event->image!='')
                                        <img style="width: 150px;height: 100px;" src="{{URL::to('/').'/events/'}}{{$event->image}}">
                                        @endif
                                    </td>
                                    <td>{{ date("d-M-Y",strtotime($event->start_date)) }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection