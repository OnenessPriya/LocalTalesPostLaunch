@extends('business.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('business.partials.flash')
<div class="row m-0">
    <div class="col-12">
      <div class="card border-0">
        <div class="card-body p-0">
          
          <div class="row m-0">
            @foreach($deals as $key => $deal)
            <div class="col-12 col-md-4 col-lg-4 col-sm-4 mb-3 pl-md-0">
              <div class="card">
                <div class="position-relative">
                  @if($deal->image!='')
                  <img src="{{URL::to('/').'/deals/'}}{{$deal->image}}" class="card-img-top" alt="Events">
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
                  <div class="row m-0 col-12 p-0">
                    <div class="col-8 col-md-8 p-0">
                      <h5 class="card-title">{{$deal->title}}
                        <span class="d-block"><i class="fas fa-map-marker-alt"></i> {{$deal->address}}</span>
                      
                      </h5>
                      <div class="card-border"></div>
                    </div>
                    <div class="col-4 col-md-4 p-0 categ-text">
                      <div class="bg-orange text-center">
                        <img src="{{URL::to('/').'/categories/'}}{{$deal->category->image}}" class="pt-2">
                        <p>{{$deal->category->title}}</p>
                      </div>
                    </div>
                  </div>
                  <p class="card-text">{!!strip_tags(substr($deal->short_description,0,200))!!}...</p>
                  <a href="{{ route('business.deal.edit', $deal['id']) }}" class="float-right text-dark"> Edit</a>
                  <a href="{{ route('business.deal.delete', $deal['id']) }}"  onclick="return confirm('Are you sure that you want to delete this deal?')" class="float-right text-dark">Delete | </a>
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
</div>
@endsection