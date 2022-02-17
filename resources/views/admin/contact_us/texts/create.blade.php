@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
  Create Contact Us Texts
@endsection
@section('content')
   
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Create Contact Us Texts</h3>
        </div>
        <form action="{{ route('admin.contact_us.texts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 m-3">
            <label for="title_1" class="form-label">{{ __('Title-1:') }}</label>
            <input type="text" name="title_1" id="title_1" required class="form-control">
            @error('title_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="text_1" class="form-label">{{ __('Text-1:') }}</label>
            <textarea class="form-control" id="text_1" rows="3" class="form-control @error('text_1') is-invalid @enderror"
                name="text_1" value="{{ old('text_1') }}" required autocomplete="text_1" autofocus>
            </textarea>
            @error('text_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="title_2" class="form-label">{{ __('Title-2:') }}</label>
            <input type="text" name="title_2" id="title_2" required class="form-control">
            @error('title_2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="text_2" class="form-label">{{ __('Text-2:') }}</label>
            <textarea class="form-control" id="text_2" rows="3" class="form-control @error('text_2') is-invalid @enderror"
                name="text_2" value="{{ old('text_2') }}" required autocomplete="text_2" autofocus>
            </textarea>
            @error('text_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="title_3" class="form-label">{{ __('Title-3:') }}</label>
            <input type="text" name="title_3" id="title_3" required class="form-control">
            @error('title_3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="text_3" class="form-label">{{ __('Text-3:') }}</label>
            <textarea class="form-control" id="text_3" rows="3" class="form-control @error('text_3') is-invalid @enderror"
                name="text_3" value="{{ old('text_3') }}" required autocomplete="text_3" autofocus>
            </textarea>
            @error('text_3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" name="lang" value="{{$lang}}">
        <div class="m-3" style="text-align: left;">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
        </form>
    </div>
  

@endsection
@section('script')
    <script src="{{ asset('panel/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('text_1');
        CKEDITOR.replace('text_2');
        CKEDITOR.replace('text_3');
    </script>
@endsection
