@extends('site.appprofile')
@section('title') Dashboard @endsection
@section('content')

  <div class="row">
    <div class="col-12">
          
          <div class="row">
            @foreach($events as $key => $event)
            <div class="col-12 col-md-4 col-lg-4 col-sm-4 mb-3">
              <div class="card save-grid">
                <div class="position-relative">
                  @if($event->event->image!='')
                  <figure>
                    <div class="category-tag">
                      <img src="{{URL::to('/').'/categories/'}}{{$event->event->category->image}}">
                      <p>{{$event->event->category->title}}</p>
                    </div>
                    <img src="{{URL::to('/').'/events/'}}{{$event->event->image}}" class="card-img-top" alt="Events">
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
                  <h5 class="card-title">{{$event->event->title}}</h5>
                  <h6><i class="fas fa-map-marker-alt"></i> {{$event->event->address}}</h6>
                  <p class="card-text">{{strip_tags(substr($event->event->description,0,200))}}...</p>
                  <a href="{!! URL::to('event-details/'.$event->event->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $event->event->title))) !!}" target="_blank" class="text-dark">View Details</a> | <a href="{{ route('site.dashboard.event.delete', $event->event->id) }}" onclick="return confirm('Are you sure that you want to remove this event?')" class="text-danger">Delete</a>
                  
                  
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
    </div>
  </div>

@endsection