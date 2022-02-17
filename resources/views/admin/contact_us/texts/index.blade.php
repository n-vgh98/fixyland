@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
   Contact Us Texts
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.contact_us.texts.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.contact_us.texts.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Contact Us Texts</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Title-1</th>
                        <th class="text-center">Text-1</th>
                        <th class="text-center">Title-1</th>
                        <th class="text-center">Text-2</th>
                        <th class="text-center">Title-1</th>
                        <th class="text-center">Text-3</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                        $contact_text = $language->langable;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $contact_text->title_1 }}</td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($contact_text->text_1,'25') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#text_1{{ $contact_text->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center">{{ $contact_text->title_2 }}</td>
                            <td class="text-center"> 
                            {!! \Illuminate\Support\Str::limit($contact_text->text_2,'25') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#text_2{{ $contact_text->id }}">
                                    Full Text  
                                </button></td>
                            <td class="text-center">{{ $contact_text->title_3 }}</td>
                            <td class="text-center"> 
                            {!! Str::limit($contact_text->text_3 , "25")  !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#text3{{ $contact_text->id }}">
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
                                        {{-- button for editing contact us  --}}
                                        <a href="{{ route('admin.contact_us.texts.edit', $contact_text->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing contact us --}}
                                        <form action="{{ route('admin.contact_us.texts.delete', $contact_text->id) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- modal to show full text-1  --}}
                            <div class="modal fade" id="text_1{{ $contact_text->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Text-1 </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $contact_text->text_1;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full text-1  --}}
                    {{-- modal to show full  text-2   --}}
                            <div class="modal fade" id="text_2{{ $contact_text->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Text-2 </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $contact_text->text_2;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full text-2 --}}
                    {{-- modal to show full text-3 --}}
                            <div class="modal fade" id="text3{{ $contact_text->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Text-3</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $contact_text->text_3;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full text-3--}}
                    
                        @php
                            $number++;
                        @endphp
                        <!-- Modal for making new message -->
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Title-1</th>
                        <th class="text-center">Text-1</th>
                        <th class="text-center">Title-1</th>
                        <th class="text-center">Text-2</th>
                        <th class="text-center">Title-1</th>
                        <th class="text-center">Text-3</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
  
    <a href="{{ route('admin.contact_us.texts.create', $lang) }}" class="btn btn-primary">Make New Text</a>
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
