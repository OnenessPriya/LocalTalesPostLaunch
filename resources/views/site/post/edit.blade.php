@extends('site.appprofile')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('site.localloop.post.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="content"> Content <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('content') is-invalid @enderror" type="text" name="content" id="content" value="{{ old('content', $targetblog->content) }}"/>
                            <input type="hidden" name="id" value="{{ $targetblog->id }}">
                            @error('content') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="pincode"> PinCode <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('pincode') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetblog->title) }}"/>
                            <input type="hidden" name="id" value="{{ $targetblog->id }}">
                            @error('title') {{ $message }} @enderror
                        </div>
                    </div> --}}
                        {{-- <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="suburb_id"> Suburb<span class="m-l-5 text-danger"> *</span></label>
                                <select class="form-control" name="suburb_id">
                                    <option hidden selected>Select Suburb...</option>
                                    @foreach ($suburb as $index => $item)
                                    <option value="{{$item->id}}" {{ ($item->id == $targetblog->suburb_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('suburb_id') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                        </div> --}}

                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Loop</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('site.localloop.post') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
