@extends('business.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('business.partials.flash')

<div class="row m-0">
    <div class="col-12 col-md-7">
        <div class="card border-0 px-2 py-4 px-md-4 py-md-5 shadow-sm">
            <h3 class="pb-3">Add an event</h3>
            <form action="{{ route('business.event.store') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            	<input type="hidden" name="business_id" value="{{Auth::user()->id}}">
            	<div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Event Category</h6>
	                </label>
	                <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
	    
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Event Title</h6>
	                </label>
	                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="row mt-3 px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Event Image</h6>
	                </label>
	                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Event Description</h6>
	                </label>
	                <div class="col-12 p-0">
	                    <textarea class="form-control" rows="4" name="description" id="description" id="eveDesc">{{ old('description') }}</textarea>
	                </div>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Address</h6>
	                </label>
	                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Latitude</h6>
	                </label>
	                <input class="form-control @error('lat') is-invalid @enderror" type="text" name="lat" id="lat" value="{{ old('lat') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Longitude</h6>
	                </label>
	                <input class="form-control @error('lon') is-invalid @enderror" type="text" name="lon" id="lon" value="{{ old('lon') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Pin Code</h6>
	                </label>
	                <input class="form-control @error('pin') is-invalid @enderror" type="text" name="pin" id="pin" value="{{ old('pin') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Start Date</h6>
	                </label>
	                <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Start Time</h6>
	                </label>
	                <input class="form-control @error('start_time') is-invalid @enderror" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">End Date</h6>
	                </label>
	                <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">End Time</h6>
	                </label>
	                <input class="form-control @error('end_time') is-invalid @enderror" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Website</h6>
	                </label>
	                <input class="form-control @error('website') is-invalid @enderror" type="text" name="website" id="website" value="{{ old('website') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Contact Email Id</h6>
	                </label>
	                <input class="form-control @error('contact_email') is-invalid @enderror" type="text" name="contact_email" id="contact_email" value="{{ old('contact_email') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Contact Phone No</h6>
	                </label>
	                <input class="form-control @error('contact_phone') is-invalid @enderror" type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}"/>
	            </div>
	            <div class="row mt-3 px-3">
	                <button type="submit" class="btn btn-blue text-center">Add Event</button>
	            </div>
	        </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush