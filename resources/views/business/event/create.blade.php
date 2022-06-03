@extends('business.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('business.partials.flash')

<div class="row">
    <div class="col-12">
        <div class="card">
        	<div class="card-header">Add an event</div>
        	<div class="card-body">
        		
            <form action="{{ route('business.event.store') }}" method="POST" role="form" enctype="multipart/form-data">
            	<div class="row">
            @csrf
            	<input type="hidden" name="business_id" value="{{Auth::user()->id}}">
            	<div class="col-sm-6 col-12">
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
	            <div class="col-sm-6 col-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Event Title</h6>
	                </label>
	                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Event Image</h6>
	                </label>
	                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
	            </div>
	            <div class="col-sm-12 mb-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Event Description</h6>
	                </label>
	                <div class="col-12 p-0">
	                    <textarea class="form-control" rows="4" name="description" id="description" id="eveDesc">{{ old('description') }}</textarea>
	                </div>
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Address</h6>
	                </label>
	                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}"/>
	            </div>
	            <div class="col-sm-4">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Latitude</h6>
	                </label>
	                <input class="form-control @error('lat') is-invalid @enderror" type="text" name="lat" id="lat" value="{{ old('lat') }}"/>
	            </div>
	            <div class="col-sm-4">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Longitude</h6>
	                </label>
	                <input class="form-control @error('lon') is-invalid @enderror" type="text" name="lon" id="lon" value="{{ old('lon') }}"/>
	            </div>
	            <div class="col-sm-4">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Pin Code</h6>
	                </label>
	                <input class="form-control @error('pin') is-invalid @enderror" type="text" name="pin" id="pin" value="{{ old('pin') }}"/>
	            </div>
	            <div class="col-sm-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Start Date</h6>
	                </label>
	                <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"/>
	            </div>
	            <div class="col-sm-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">End Date</h6>
	                </label>
	                <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"/>
	            </div>
	            <div class="col-sm-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Start Time</h6>
	                </label>
	                <input class="form-control @error('start_time') is-invalid @enderror" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}"/>
	            </div>
	            <div class="col-sm-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">End Time</h6>
	                </label>
	                <input class="form-control @error('end_time') is-invalid @enderror" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}"/>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Format</h6>
	                </label>
	                <select name="format_id" id="format_id" class="form-control @error('format_id') is-invalid @enderror">
                        <option value="">Select a format</option>
                        @foreach($eventformats as $eventformat)
                            <option value="{{ $eventformat->id }}">{{ $eventformat->name }}</option>
                        @endforeach
                    </select>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Language</h6>
	                </label>
	                <select name="language_id" id="language_id" class="form-control @error('language_id') is-invalid @enderror">
                        <option value="">Select a language</option>
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </select>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Paid Event?</h6>
	                </label>
	                <select name="is_paid" id="is_paid" class="form-control @error('is_paid') is-invalid @enderror">
                        <option value="">Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Recurring Event?</h6>
	                </label>
	                <select name="is_recurring" id="is_recurring" class="form-control @error('is_recurring') is-invalid @enderror">
                        <option value="">Select an option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Price</h6>
	                </label>
	                <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price') }}"/>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Website</h6>
	                </label>
	                <input class="form-control @error('website') is-invalid @enderror" type="text" name="website" id="website" value="{{ old('website') }}"/>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Contact Email Id</h6>
	                </label>
	                <input class="form-control @error('contact_email') is-invalid @enderror" type="text" name="contact_email" id="contact_email" value="{{ old('contact_email') }}"/>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Contact Phone No</h6>
	                </label>
	                <input class="form-control @error('contact_phone') is-invalid @enderror" type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}"/>
	            </div>
	            <div class="col-sm-12 text-right">
	                <button type="submit" class="btn btn-blue text-center">Add Event</button>
	            </div>
	        </div>
	        </form>
	    </div>
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