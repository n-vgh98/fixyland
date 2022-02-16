@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
  Create Rules
@endsection
@section('content')
   
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Create Rules</h3>
        </div>
        <form action="{{ route('admin.rules.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
            <label for="text_2" class="form-label">{{ __('Text-2:') }}</label>
            <textarea class="form-control" id="text_2" rows="3" class="form-control @error('text_2') is-invalid @enderror"
                name="text_2" value="{{ old('text_2') }}" required autocomplete="text_2" autofocus>
            </textarea>
            @error('text_2')
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
        <div class="mb-3 m-3">
            <label for="text_4" class="form-label">{{ __('Text-4:') }}</label>
            <textarea class="form-control" id="text_4" rows="3" class="form-control @error('text_4') is-invalid @enderror"
                name="text_4" value="{{ old('text_4') }}" required autocomplete="text_4" autofocus>
            </textarea>
            @error('text_4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="text_5" class="form-label">{{ __('Text-5:') }}</label>
            <textarea class="form-control" id="text_5" rows="3" class="form-control @error('text_5') is-invalid @enderror"
                name="text_5" value="{{ old('text_5') }}" required autocomplete="text_5" autofocus>
            </textarea>
            @error('text_5')
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
        CKEDITOR.replace('text_4');
        CKEDITOR.replace('text_5');
    </script>
@endsection
