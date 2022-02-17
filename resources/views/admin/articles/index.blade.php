@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
   Articles
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.articles.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.articles.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Articles</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Text</th>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                        $article = $language->langable;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $article->title }}</td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($article->text_1,'30') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#description{{ $article->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center">
                            <button data-toggle="modal" data-target="#edit{{ $article->id }}">
                                    <img src="{{ asset($article->photo_path) }}" style="height: 60px; width:60px;"
                                        class="img-fluid" alt="{{ $article->alt }}" title="{{ $article->title }}">
                                </button>
                            </td>
                            <td class="text-center">{{$article->category->title}}</td>
                            <td class="text-center">
                            @if ($article->status == '0')
                                <span class="badge badge-pill badge-danger">Deactive</span>
                            @else
                                <span class="badge badge-pill badge-success">Active</span>
                            @endif
                            </td>
                            <td class="text-center">
                                {{-- button for setting --}}
                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-info">Setting</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu text-center">
                                        {{-- button for editing Article  --}}
                                        <a href="{{ route('admin.articles.edit',[ $article->id , $article->language->name]) }}" class="btn btn-primary">
                                            Edit
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing rules --}}
                                        <form action="{{ route('admin.articles.delete', $article->id) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- modal for image view-->
                        <div class="modal fade" id="edit{{ $article->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">article photo</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"> 
                                        <img src="{{ asset($article->photo_path) }}" width="100%" height="100%">
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- modal to show full description  --}}
                            <div class="modal fade" id="description{{ $article->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full description </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $article->text_1;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full description --}}
                    
                        @php
                            $number++;
                        @endphp
                        <!-- Modal for making new message -->
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Text</th>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
  
    <a href="{{ route('admin.articles.create', $lang) }}" class="btn btn-primary">Make New About Us</a>
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
