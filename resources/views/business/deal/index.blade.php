@extends('business.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('business.partials.flash')
<div class="row">
    <div class="col-12">


        <div class="tile">
            <div class="tile-body">
            <div class="row m-0">
                 @foreach($deals as $key => $deal)
                <div class="col-12 col-md-4 col-lg-4 col-sm-4 mb-3">
                  <div class="card save-grid">
                    <div class="position-relative">
                      @if($deal->image!='')
                      <figure>
                        <div class="category-tag">
                          <img src="{{URL::to('/').'/categories/'}}{{$deal->category->image}}">
                          <p>{{$deal->category->title}}</p>
                        </div>
                        <img src="{{URL::to('/').'/deals/'}}{{$deal->image}}" class="card-img-top" alt="Events">
                      </figure>
                      @endif
                      <div class="img-retting">
                        <!-- <ul>
                          <li><img src="./images/event-star.png"> <span>4.5</span> (60 reviews)</li>
                          <li>|</li>
                          <li><i class="far fa-comment-dots"></i> 40 Comments</li>
                        </ul> -->
                      </div>
                    </div>
                    <div class="card-body event-body">
                      <h5 class="card-title">{{$deal->title}}</h5>
                      <h6><i class="fas fa-map-marker-alt"></i> {{$deal->address}}</h6>
                      <p class="card-text">{!!strip_tags(substr($deal->short_description,0,200))!!}...</p>
                      <a href="{{ route('business.deal.edit', $deal['id']) }}" class="text-dark">Edit</a> | <a href="{{ route('business.deal.delete', $deal['id']) }}" onclick="return confirm('Are you sure that you want to delete this deal?')" class="text-danger">Delete</a>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection



