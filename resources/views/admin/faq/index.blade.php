@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
   Faq
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.faq.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.faq.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Faq</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Question</th>
                        <th class="text-center">Answer</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                        $faq = $language->langable;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($faq->question,'30') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#question{{ $faq->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($faq->answer,'30') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#answer{{ $faq->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center">{{ $faq->category->title }}</td>
                            <td class="text-center">
                                {{-- button for setting --}}
                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-info">Setting</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu text-center">
                                        {{-- button for editing faq  --}}
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#edit_faq{{ $faq->id }}">
                                            Edit
                                        </button>

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing rules --}}
                                        <form action="{{ route('admin.faq.delete', $faq->id) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- modal for question -->
                        <div class="modal fade" id="question{{ $faq->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Question </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{$faq->question}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-- modal for answer -->
                        <div class="modal fade" id="answer{{ $faq->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Answer </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{$faq->answer}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal for edit faq -->
                        <div class="modal fade mt-5" id="edit_faq{{ $faq->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">update faq</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST"
                                            action="{{ route('admin.faq.update', $faq->id) }}">
                                            @csrf
                                            
                                            <input type="hidden" name="lang" value="{{ $faq->language->name }}">
                                            <div class="form-group">
                                                <label for="question">Question:</label>
                                                <input type="text" class="form-control" name="question" value="{{ $faq->question }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="answer">Answer:</label>
                                                <input type="text" class="form-control" name="answer" value="{{ $faq->answer }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category:</label>
                                                <select class="form-control" name="category">
                                                @php
                                                    $languages = App\Models\Lang::where([['langable_type', 'App\Models\FaqCategory'], ['name', $lang]])->get();
                                                    @endphp
                                                    @foreach ($languages as $language)
                                                        @php
                                                        $category = $language->langable;
                                                        @endphp
                                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="meta_keywords">Meta Keywords</label>
                                                <textarea class="form-control" name="meta_keywords" rows="3">{{ $faq->meta_keywords }}</textarea>
                                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="meta_description">Meta Description</label>
                                                <textarea class="form-control" name="meta_description" rows="3">{{ $faq->meta_description }}</textarea>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        @php
                            $number++;
                        @endphp
                        <!-- Modal for making new message -->
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Question</th>
                        <th class="text-center">Answer</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make new Faq
    </button>

    <!-- Modal for making new category -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.faq.store') }}">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        <div class="form-group">
                                <label for="question">Question:</label>
                                <input type="text" class="form-control" name="question">
                            </div>

                            <div class="form-group">
                                <label for="answer">Answer:</label>
                                <input type="text" class="form-control" name="answer">
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" name="category">
                                @php
                                $languages = App\Models\Lang::where([['langable_type', 'App\Models\FaqCategory'], ['name', $lang]])->get();
                                @endphp
                                @foreach ($languages as $language)
                                    @php
                                    $category = $language->langable;
                                    @endphp
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords" rows="3"></textarea>
                                    
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="3"></textarea>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
