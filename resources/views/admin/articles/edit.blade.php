@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
  Edit Article
@endsection
@section('content')
   
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Edit Article</h3>
        </div>
        <form action="{{ route('admin.articles.update',$article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 m-3">
            <label for="title" class="form-label">{{ __('Title:') }}</label>
            <input type="text" name="title" id="title" required class="form-control" value="{{$article->title}}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="slug" class="form-label">{{ __('Slug:') }}</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{$article->slug}}">
            @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label style="display: inline-block;
                    max-width: 100%;
                    margin-bottom: 5px;
                    font-weight: bold;
                    ">Category Name:</label>
            <select class="form-control" name="category">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 m-3">
            <label style="display: inline-block;
                    max-width: 100%;
                    margin-bottom: 5px;
                    font-weight: bold;
                    ">Status:</label>
             <div class="radio">
                <label class="mr-4 ml-4">
                    <input type="radio" id="0" name="status" value="0" {{ $article->status == "0" ? 'checked' : '' }}>Deactive
                </label>
                <label class="mr-4 ml-4">
                    <input type="radio" id="1" name="status" value="1" {{ $article->status == "1" ? 'checked' : '' }}>Active 
                </label>
            </div>
        </div>
        <div class="mb-3 m-3">
            <label for="v_link_1" class="form-label">{{ __('Video Link-1:') }}</label>
            <input type="text" name="v_link_1" id="v_link_1" required class="form-control" value="{{$article->v_link_1}}">
            @error('v_link_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="v_link_2" class="form-label">{{ __('Video Link-2:') }}</label>
            <input type="text" name="v_link_2" id="v_link_2" required class="form-control" value="{{$article->v_link_2}}">
            @error('v_link_2')
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
            <input type="text" name="photo_alt" id="photo_alt" required class="form-control" value="{{$article->photo_alt}}">
            @error('photo_alt')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="photo_name" class="form-label">{{ __('Photo Name:') }}</label>
            <input type="text" name="photo_name" id="photo_name" required class="form-control" value="{{$article->photo_name}}">
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
                {{$article->meta_keywords}}
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
                {{$article->meta_description}}
            </textarea>
            @error('meta_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 m-3">
            <label for="text_1" class="form-label">{{ __('Text-1:') }}</label>
            <textarea class="form-control" id="text_1" rows="3" class="form-control @error('text_1') is-invalid @enderror"
                name="text_1" value="{{ old('text_1') }}" required autocomplete="text_1" autofocus>
                {{$article->text_1}}
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
                {{$article->text_2}}
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
                name="text_3" value="{{ old('text_3') }}" required autocomplete="text_1" autofocus>
                {{$article->text_3}}
            </textarea>
            @error('text_3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" name="lang" value="{{$article->language->name}}">
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
