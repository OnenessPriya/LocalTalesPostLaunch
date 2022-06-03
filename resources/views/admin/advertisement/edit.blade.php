@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('admin.partials.flash')

<div class="row">
    <div class="col-12 col-md-7">
        <div class="card">
        	<div class="card-header">Edit advertisement</div>
        	<div class="card-body">
            <form action="{{ route('admin.business.advertisement.update') }}" method="POST" role="form" enctype="multipart/form-data">
            <div class="row">
            @csrf
            	<input type="hidden" name="id" value="{{$targetAd->id}}">
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Title</h6>
	                </label>
	                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') ? old('title') : $targetAd->title }}"/>
                    @error('title') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Description</h6>
	                </label>
	                <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description">{{ old('description') ? old('description') : $targetAd->description }}</textarea>
                    @error('description') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Page</h6>
	                </label>
	                <input class="form-control @error('page') is-invalid @enderror" type="text" name="page" id="page" value="{{ old('page') ? old('page') : $targetAd->page }}"/>
                    @error('page') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Slot</h6>
	                </label>
	                <input class="form-control @error('slot_id') is-invalid @enderror" type="text" name="slot_id" id="slot_id" value="{{ old('slot_id') ? old('slot_id') : $targetAd->slot_id }}"/>
                    @error('slot_id') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Image</h6>
	                </label>
                    <img src="{{URL::to('/').'/advertisements/'}}{{$targetAd->image}}" alt="" height="100">
	                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                    @error('image') {{ $message }} @enderror
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Redirect link</h6>
	                </label>
	                <input class="form-control @error('redirect_link') is-invalid @enderror" type="text" name="redirect_link" id="redirect_link" value="{{ old('redirect_link') ? old('redirect_link') : $targetAd->redirect_link }}"/>
                    @error('redirect_link') {{ $message ?? '' }} @enderror
	            </div>
                <div class="col-12">Target</div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Postcode</h6>
	                </label>
	                <input class="form-control @error('target_postcode') is-invalid @enderror" type="text" name="target_postcode" id="target_postcode" value="{{ old('target_postcode') ? old('target_postcode') : $targetAd->target_postcode }}"/>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">City</h6>
	                </label>
	                <input class="form-control @error('target_city') is-invalid @enderror" type="text" name="target_city" id="target_city" value="{{ old('target_city') ? old('target_city') : $targetAd->target_city }}"/>
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">State</h6>
	                </label>
	                <input class="form-control @error('target_state') is-invalid @enderror" type="text" name="target_state" id="target_state" value="{{ old('target_state') ? old('target_state') : $targetAd->target_state }}"/>
	            </div>
                <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Start Date</h6>
	                </label>
	                <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" id="start_date" value="{{ old('start_date') ? old('start_date') : $targetAd->start_date }}"/>
	            </div>
                <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">End Date</h6>
	                </label>
	                <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" id="end_date" value="{{ old('end_date') ? old('end_date') : $targetAd->end_date }}"/>
	            </div>
	            <div class="col-sm-12">
                    <br><br><br>
	                <button type="submit" class="btn btn-primary pull-right">Update Advertisement</button>
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
