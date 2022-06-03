@extends('business.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('business.partials.flash')

<div class="row">
    <div class="col-12 col-md-7">
        <div class="card">
        	<div class="card-header">Add an Product</div>
        	<div class="card-body">

            <form action="{{ route('business.product.store') }}" method="POST" role="form" enctype="multipart/form-data">
            	<div class="row">
            @csrf
            	<input type="hidden" name="business_id" value="{{Auth::user()->id}}">
            	<div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Product Category</h6>
	                </label>
	                <select name="cat_id" id="cat_id" class="form-control">
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>

	            </div>
                <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Product SubCategory</h6>
	                </label>
	                <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                        <option value="">Select a SubCategory</option>
                        @foreach($subcategories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>

	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Product Title</h6>
	                </label>
	                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message ?? '' }} @enderror
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Product Image</h6>
	                </label>
	                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
	            </div>
	            <div class="col-sm-12 mb-3">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Product Description</h6>
	                </label>
	                <div class="col-12 p-0">
	                    <textarea class="form-control" rows="4" name="desc" id="desc" id="eveDesc">{{ old('desc') }}</textarea>
	                </div>
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Product Short Description</h6>
	                </label>
	                <input class="form-control @error('short_desc') is-invalid @enderror" type="text" name="short_desc" id="short_desc" value="{{ old('short_desc') }}"/>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Price</h6>
	                </label>
	                <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price') }}"/>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Offer Price</h6>
	                </label>
	                <input class="form-control @error('offer_price') is-invalid @enderror" type="text" name="offer_price" id="offer_price" value="{{ old('offer_price') }}"/>
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Pin Code</h6>
	                </label>
	                <input class="form-control @error('pincode') is-invalid @enderror" type="text" name="pincode" id="pincode" value="{{ old('pincode') }}"/>
	            </div>

	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Meta Title</h6>
	                </label>
	                <input class="form-control @error('meta_title') is-invalid @enderror" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"/>
	            </div>
	            <div class="col-sm-6">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Meta Key</h6>
	                </label>
	                <input class="form-control @error('meta_keyword') is-invalid @enderror" type="text" name="meta_keyword" id="meta_keyword" value="{{ old('meta_keyword') }}"/>
	            </div>
	            <div class="col-sm-12">
	                <label class="mb-1">
	                    <h6 class="mb-0 text-sm text-dark">Meta Description</h6>
	                </label>
	                <input class="form-control @error('meta_desc') is-invalid @enderror" type="text" name="meta_desc" id="meta_desc" value="{{ old('meta_desc') }}"/>
	            </div>








	            <div class="col-sm-12">
	                <button type="submit" class="btn btn-blue text-center">Add Product</button>
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
