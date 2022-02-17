@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    All question for {{ $form->subcategory->name }} service
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">All question for {{ $form->subcategory->name }} service</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">question</th>
                        <th class="text-center">type</th>
                        <th class="text-center">answers</th>
                        <th class="text-center">status</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($form->questions as $question)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $question->label }}</td>
                            <td class="text-center">
                                @if ($question->input_type == 0)
                                    {{ 'Text' }}
                                @else
                                    {{ 'select' }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($question->input_type == 1)
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#show{{ $question->id }}">
                                        Show Answers
                                    </button>
                                @endif
                            </td>

                            <td class="text-center">
                                @if ($question->status == 1)
                                    <form action="{{ route('admin.forms.questions.deactive', $question) }}" method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Active</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.forms.questions.activate', $question) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Deactive</button>
                                    </form>
                                @endif
                            </td>

                            <td class="text-center">
                                {{-- button for Options --}}
                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-info">Setting</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <!-- Button for making editing question -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit{{ $question->id }}">
                                        edit question
                                    </button>

                                    <div class="dropdown-menu text-center">
                                        {{-- button for removing account --}}
                                        <form action="{{ route('admin.forms.questions.destroy', $question) }}"
                                            method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delet Question</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $number++;
                        @endphp

                        {{-- modal for editing question --}}
                        <div class="modal fade" id="edit{{ $question->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="mt-5" method="post"
                                            action="{{ route('admin.forms.questions.update', $question) }}"
                                            enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-group">
                                                <label for="label">Question</label>
                                                <input type="text" value="{{ $question->label }}" required
                                                    class="form-control" id="label" name="label">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Type</label>
                                                <select required name="input_type" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                    <option onselect="textfunction()" value="0">{{ 'Text' }}
                                                    </option>
                                                    <option onselect="selectfunction()" value="1">{{ 'Select' }}
                                                    </option>
                                                </select>
                                            </div>
                                            @php
                                                $x = 1;
                                                $option = "option_$x";
                                            @endphp
                                            @while ($x < 21)
                                                <div class="form-group">
                                                    <label for="option_{{ $x }}">Option
                                                        {{ $x }}</label>
                                                    <input value="{{ $question->$option }}" type="text"
                                                        class="form-control" id="option_{{ $x }}"
                                                        name="option_{{ $x }}">
                                                </div>
                                                @php
                                                    $x++;
                                                @endphp
                                            @endwhile
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            <input type="hidden" name="form_id" value="{{ $form->id }}">
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- modal for showing question --}}
                        <div class="modal fade" id="show{{ $question->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="mt-5" method="post" enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-group">
                                                <label for="label">Question</label>
                                                <input readonly type="text" value="{{ $question->label }}" required
                                                    class="form-control" id="label" name="label">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Type</label>
                                                <select disabled required name="input_type" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                    <option onselect="textfunction()" value="0">{{ 'Text' }}
                                                    </option>
                                                    <option onselect="selectfunction()" value="1">{{ 'Select' }}
                                                    </option>
                                                </select>
                                            </div>
                                            @php
                                                $x = 1;
                                                $option = "option_$x";
                                            @endphp
                                            @while ($x < 21)
                                                <div class="form-group">
                                                    <label for="option_{{ $x }}">Option
                                                        {{ $x }}</label>
                                                    <input readonly value="{{ $question->$option }}" type="text"
                                                        class="form-control" id="option_{{ $x }}"
                                                        name="option_{{ $x }}">
                                                </div>
                                                @php
                                                    $x++;
                                                @endphp
                                            @endwhile
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                            <input type="hidden" name="form_id" value="{{ $form->id }}">
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">question</th>
                        <th class="text-center">type</th>
                        <th class="text-center">answers</th>
                        <th class="text-center">status</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
    <!-- Button for making new question -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make new question
    </button>


    <!-- Modal for making new question -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-5" method="post" action="{{ route('admin.forms.questions.store') }}"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="label">Question</label>
                            <input type="text" required class="form-control" id="label" name="label">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select onchange="checker()" required name="input_type" class="form-control"
                                id="exampleFormControlSelect1">
                                <option id=' textoption' value="0">{{ 'Text' }}</option>
                                <option id='selectoption' value="1">{{ 'Select' }}</option>
                            </select>
                        </div>
                        @php
                            $x = 1;
                        @endphp
                        @while ($x < 21)
                            <div class="form-group">
                                <label for="option_{{ $x }}">Option {{ $x }}</label>
                                <input type="text" class="form-control" id="option_{{ $x }}"
                                    name="option_{{ $x }}">
                            </div>
                            @php
                                $x++;
                            @endphp
                        @endwhile
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        <input type="hidden" name="form_id" value="{{ $form->id }}">
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
