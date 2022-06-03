@extends('business.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('business.partials.flash')
<div class="row">
    <div class="col-12">
        <div class="tile">
            <div class="tile-body">
            <div class="col-12 text-right">
              <button class="btn btn-blue text-center w-auto"><i class="fas fa-plus"></i> Add advertisement</button>  
            </div>
            <!--<a href="{{route('business.advertisement.create')}}">Add new advertisement</a>-->
            <br>
            @forelse($data as $key => $advertisement)
            <div class="col-12 col-md-4 col-lg-4 col-sm-4 mb-3">
              <div class="card save-grid">
                <div class="position-relative">
                  @if($advertisement->image!='')
                  <figure>
                    <img src="{{URL::to('/').'/advertisements/'}}{{$advertisement->image}}" class="card-img-top" alt="Events">
                  </figure>
                  @endif
                </div>
                <div class="card-body event-body">
                  <h5 class="card-title">{{$advertisement->title}}</h5>
                  <p class="card-text">{!!strip_tags(substr($advertisement->description, 0, 200))!!}...</p>
                  <a href="{{ route('business.advertisement.edit', $advertisement['id']) }}" class="text-dark">Edit</a> | <a href="{{ route('business.advertisement.delete', $advertisement['id']) }}" onclick="return confirm('Are you sure that you want to delete this advertisement?')" class="text-danger">Delete</a>
                </div>
              </div>
            </div>
            @empty
            <div class="col-12 text-center no-data">No Ads Found</div>
            @endforelse
      </div>
    </div>
</div>
@endsection



