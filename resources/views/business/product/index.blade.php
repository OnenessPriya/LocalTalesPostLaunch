@extends('business.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('business.partials.flash')
<div class="row">
    <div class="col-12">


        <div class="col-12">
            <div class="tile">
                <div class="tile-body">
                <a href="{{route('business.product.create')}}">Add new Product</a>
                <br>
            @foreach($product as $key => $event)
            <div class="col-12 col-md-4 col-lg-4 col-sm-4 mb-3">
              <div class="card save-grid">
                <div class="position-relative">
                  @if($event->image!='')
                  <figure>
                    <div class="category-tag">
                      <img src="{{URL::to('/').'/categories/'}}{{$event->category->image}}">
                      <p>{{$event->category->title}}</p>
                    </div>
                    <br><br>
                    <div class="subcategory-tag">
                        <img src="{{URL::to('/').'/subcategories/'}}{{$event->subcategory->image}}">
                        <p>{{$event->subcategory->title}}</p>
                      </div>
                    <img src="{{URL::to('/').'/product/'}}{{$event->image}}" class="card-img-top" alt="Events">
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
                  <h5 class="card-title">{{$event->name}}</h5>
                  <h6><i class="fas fa-rupees"></i> {{$event->price}}</h6>
                  <p class="card-text">{{strip_tags(substr($event->description,0,200))}}...</p>
                  <a href="{{ route('business.product.delete', $event['id']) }}" onclick="return confirm('Are you sure that you want to delete this product?')" class="text-danger">Delete</a> | <a href="{{ route('business.product.edit', $event['id']) }}" class="text-dark">Edit</a>
                </div>
              </div>
            </div>
            @endforeach


      </div>
    </div>
</div>
@endsection
