@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
   About Us
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.about_us.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.about_us.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">About Us</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">description</th>
                        <th class="text-center">photo</th>
                        <th class="text-center">meta_keywords</th>
                        <th class="text-center">meta_description</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                        $about_us = $language->langable;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($about_us->description,'30') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#description{{ $about_us->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center">
                            <button data-toggle="modal" data-target="#edit{{ $about_us->id }}">
                                    <img src="{{ asset($about_us->photo_path) }}" style="height: 60px; width:60px;"
                                        class="img-fluid" alt="{{ $about_us->alt }}" title="{{ $about_us->title }}">
                                </button>
                            </td>
                            <td class="text-center"> 
                            {!! \Illuminate\Support\Str::limit($about_us->meta_keywords,'10') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#meta_keywords{{ $about_us->id }}">
                                    Full Text  
                                </button></td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($about_us->meta_description,'10') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#meta_description{{ $about_us->id }}">
                                    Full Text 
                                </button></td>
                            <td class="text-center">
                                {{-- button for setting --}}
                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-info">Setting</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu text-center">
                                        {{-- button for editing about us  --}}
                                        <a href="{{ route('admin.about_us.edit', $about_us->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing rules --}}
                                        <form action="{{ route('admin.about_us.delete', $about_us->id) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- modal for image view-->
                        <div class="modal fade" id="edit{{ $about_us->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">about us photo</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"> 
                                        <img src="{{ asset($about_us->photo_path) }}" width="100%" height="100%">
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- modal to show full description  --}}
                            <div class="modal fade" id="description{{ $about_us->id }}" tabindex="-1" role="dialog"
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
                                                echo $about_us->description;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full description --}}
                    {{-- modal to show full meta keywords  --}}
                            <div class="modal fade" id="meta_keywords{{ $about_us->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Meta Keywords </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $about_us->meta_keywords;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full meta_keywords --}}
                    {{-- modal to show full meta_description --}}
                            <div class="modal fade" id="meta_description{{ $about_us->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Meta Description </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $about_us->meta_description;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full meta_description--}}
                    
                        @php
                            $number++;
                        @endphp
                        <!-- Modal for making new message -->
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">description</th>
                        <th class="text-center">photo</th>
                        <th class="text-center">meta_keywords</th>
                        <th class="text-center">meta_description</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
  
    <a href="{{ route('admin.about_us.create', $lang) }}" class="btn btn-primary">Make New About Us</a>
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
