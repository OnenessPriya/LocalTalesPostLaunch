@extends('site.appprofile')
@section('title') Dashboard @endsection
@section('content')
<div class="row m-0">
    <div class="col-12 col-md-7">
        <div class="card border-0 px-2 py-4 px-md-4 py-md-5 shadow-sm">
            <h3 class="pb-3">Update Profile</h3>
            <form action="{{ route('site.dashboard.updateProfile') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Name</h6>
	                </label>
	                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ Auth::user()->name }}"/>
                            @error('name') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Mobile No</h6>
	                </label>
	                <input class="form-control @error('mobile') is-invalid @enderror" type="text" name="mobile" id="mobile" value="{{ Auth::user()->mobile }}"/>
                            @error('mobile') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Country</h6>
	                </label>
	                <input class="form-control" type="text" name="country" id="country" value="{{ Auth::user()->country }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Address</h6>
	                </label>
	                <input class="form-control" type="text" name="address" id="address" value="{{ Auth::user()->address }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">City</h6>
	                </label>
	                <input class="form-control" type="text" name="city" id="city" value="{{ Auth::user()->city }}"/>
	            </div>
	            <div class="row mt-3 px-3">
	                <button type="submit" class="btn btn-blue text-center">Update</button>
	            </div>
	        </form>
        </div>
    </div>
</div>
@endsection