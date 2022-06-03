@extends('admin.app')
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
                <hr>
                <form action="{{ route('admin.localtrade.question.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Question <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('question') is-invalid @enderror" type="text" name="question" id="question" value="{{ old('question') ? old('question') : $data->question }}" placeholder="eg: What is your postcode" autofocus/>
                            <p class="text-danger small">@error('question') {{ $message ?? '' }} @enderror</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Type <span class="m-l-5 text-danger"> *</span></label>
                            <br>
                            <input type="radio" name="type" id="type1" value="text" {{ ($data->type == "text") ? 'checked' : '' }}>
                            <label for="type1" class="mr-3">Small text</label>

                            <input type="radio" name="type" id="type2" value="textarea" {{ ($data->type == "textarea") ? 'checked' : '' }}>
                            <label for="type2" class="mr-3">Bigger text</label>

                            <br>

                            <input type="radio" name="type" id="type3" value="select" {{ ($data->type == "select") ? 'checked' : '' }}>
                            <label for="type3" class="mr-3">Select-options (Answer required)</label>

                            <input type="radio" name="type" id="type4" value="radio" {{ ($data->type == "radio") ? 'checked' : '' }}>
                            <label for="type4" class="mr-3">Radio-options (Answer required)</label>
                            <p class="text-danger small">@error('type') {{ $message ?? '' }} @enderror</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') ? old('name') : $data->name }}" placeholder="eg: postcode"/>
                            <p class="text-danger small">@error('name') {{ $message ?? '' }} @enderror</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Option</label>
                            <input class="form-control @error('answer') is-invalid @enderror" type="text" name="answer" id="answer" value="{{ old('answer') ? old('answer') : $data->answer }}" placeholder="Use only for Select-options/ Radio-options | Comma seperated | eg: option1, option2, option3"/>
                            <p class="text-danger small">@error('answer') {{ $message ?? '' }} @enderror</p>
                        </div>
                        {{-- <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                            <input name="image" type="file" id="upload" onchange="" hidden>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label class="control-label">Blog Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
                        </div> --}}
                    </div>
                    <div class="tile-footer">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save This</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.localtrade.question.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
