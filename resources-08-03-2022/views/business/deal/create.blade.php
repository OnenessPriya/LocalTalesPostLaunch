@extends('business.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('business.partials.flash')

<div class="row m-0">
    <div class="col-12 col-md-7">
        <div class="card border-0 px-2 py-4 px-md-4 py-md-5 shadow-sm">
            <h3 class="pb-3">Add a deal</h3>
            <form action="{{ route('business.deal.store') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            	<input type="hidden" name="business_id" value="{{Auth::user()->id}}">
            	<div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Event Category</h6>
	                </label>
	                 <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
	    
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Title</h6>
	                </label>
	                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="row mt-3 px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Deal Image</h6>
	                </label>
	                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Short Description</h6>
	                </label>
	                <div class="col-12 p-0">
	                    <textarea class="form-control" rows="4" name="short_description" id="short_description" id="eveDesc">{{ old('short_description') }}</textarea>
	                </div>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Description</h6>
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
	                    <h6 class="mb-0 text-sm text-dark">Expiry Date</h6>
	                </label>
	                <input class="form-control @error('expiry_date') is-invalid @enderror" type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Price</h6>
	                </label>
	                <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Promo Code</h6>
	                </label>
	                <input class="form-control @error('promo_code') is-invalid @enderror" type="text" name="promo_code" id="promo_code" value="{{ old('promo_code') }}"/>
	            </div>
	            <div class="row px-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">How to redeem</h6>
	                </label>
	                <div class="col-12 p-0">
	                    <textarea class="form-control" rows="4" name="how_to_redeem" id="how_to_redeem" id="eveDesc">{{ old('how_to_redeem') }}</textarea>
	                </div>
	            </div>
	            <div class="row mt-3 px-3">
	                <button type="submit" class="btn btn-blue text-center">Add Deal</button>
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
    ClassicEditor
        .create( document.querySelector( '#short_description' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#how_to_redeem' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush