@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    edit subcategory description
@endsection
@section('content')
    <div class="card mt-4">
        <!-- Button for making new user -->
        <div class="card-header">
            <h3 class="card-title">edit subcategory description</h3>
        </div>
        <form action="{{ route('admin.services.subcategory.description.update', $desc->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3 m-3">
                <label for="text_1" class="form-label">{{ __('Text-1:') }}</label>
                <textarea class="form-control" id="text_1" rows="3"
                    class="form-control @error('text_1') is-invalid @enderror" name="text_1" value="{{ old('text_1') }}"
                    required autocomplete="text_1" autofocus>{{ $desc->text_1 }}
                                                                                </textarea>
                @error('text_1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 m-3">
                <label for="text_2" class="form-label">{{ __('Text-2:') }}</label>
                <textarea class="form-control" id="text_2" rows="3"
                    class="form-control @error('text_2') is-invalid @enderror" name="text_2" value="{{ old('text_2') }}"
                    autocomplete="text_2" autofocus>@if ($desc->text_2 != null)
    {{ $desc->text_2 }}
    @endif
                                                                                </textarea>
                @error('text_2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 m-3">
                <label for="text_3" class="form-label">{{ __('Text-3:') }}</label>
                <textarea class="form-control" id="text_3" rows="3"
                    class="form-control @error('text_3') is-invalid @enderror" name="text_3" value="{{ old('text_3') }}"
                    autocomplete="text_3" autofocus>@if ($desc->text_3 != null)
    {{ $desc->text_3 }}
    @endif
                                                                                </textarea>
                @error('text_3')
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
        CKEDITOR.replace('text_1');
        CKEDITOR.replace('text_2');
        CKEDITOR.replace('text_3');
    </script>
@endsection
