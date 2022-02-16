@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
  Edit About Us
@endsection
@section('content')
   
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Create Rules</h3>
        </div>
        <form action="{{ route('admin.about_us.update',$about_us->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 m-3">
            <label for="description" class="form-label">{{ __('Description:') }}</label>
            <textarea class="form-control" id="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
                {{$about_us->description}}
            </textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="photo_path" class="form-label">{{ __('Photo:') }}</label>
            <input type="file" name="photo_path" id="photo_path" required class="form-control">
            @error('photo_path')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="photo_alt" class="form-label">{{ __('Photo Alt:') }}</label>
            <input type="text" name="photo_alt" id="photo_alt" required class="form-control" value="{{$about_us->photo_alt}}">
            @error('photo_alt')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="photo_name" class="form-label">{{ __('Photo Name:') }}</label>
            <input type="text" name="photo_name" id="photo_name" required class="form-control" value="{{$about_us->photo_name}}">
            @error('photo_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="meta_keywords" class="form-label">{{ __('Meta Keywords:') }}</label>
            <textarea class="form-control" id="meta_keywords" rows="3" class="form-control @error('meta_keywords') is-invalid @enderror"
                name="meta_keywords" value="{{ old('meta_keywords') }}" required autocomplete="meta_keywords" autofocus>
                {{$about_us->meta_keywords}}
            </textarea>
            @error('meta_keywords')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="meta_description" class="form-label">{{ __('Meta Description:') }}</label>
            <textarea class="form-control" id="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror"
                name="meta_description" value="{{ old('meta_description') }}" required autocomplete="meta_description" autofocus>
                {{$about_us->meta_description}}
            </textarea>
            @error('meta_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="m-3" style="text-align: left;">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
        </form>
    </div>
  

@endsection
@section('script')
    <script src="{{ asset('panel/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
