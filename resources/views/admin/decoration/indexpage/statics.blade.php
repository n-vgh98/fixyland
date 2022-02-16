@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    All index statics Table
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.decoration.index.statics.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.decoration.index.statics.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">All index statics Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Value</th>
                        <th class="text-center">Language</th>
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
                            $static = $language->langable;
                        @endphp

                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $static->title }}</td>
                            <td class="text-center">{{ $static->value }}</td>
                            <td class="text-center">{{ $static->language->name == 'en' ? 'English' : 'Arabic' }}</td>

                            <td class="text-center">
                                @if ($static->status == 1)
                                    <form action="{{ route('admin.decoration.index.statics.deactive', $static) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Active</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.decoration.index.statics.activate', $static) }}"
                                        method="post">
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
                                    <div class="dropdown-menu text-center">
                                        <button data-toggle="modal" class="btn btn-primary"
                                            data-target="#edit{{ $static->id }}">update
                                            static</button>
                                        {{-- button for removing account --}}
                                        <form action="{{ route('admin.decoration.index.statics.destroy', $static) }}"
                                            method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delet static</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $number++;
                        @endphp

                        <!-- Modal for editing  static -->
                        <div class="modal fade" id="edit{{ $static->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">update static</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="mt-5" method="post"
                                            action="{{ route('admin.decoration.index.statics.update', $static->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-group">
                                                <label for="title">title</label>
                                                <input value="{{ $static->title }}" type="text" required name="title"
                                                    class="form-control" id="title">
                                            </div>

                                            <div class="form-group">
                                                <label for="value">value</label>
                                                <input type="text" value="{{ $static->value }}" required name="value"
                                                    class="form-control" id="value">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Language</label>
                                                <select required name="language" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                    <option value="en"
                                                        {{ $static->language->name == 'en' ? 'selected' : '' }}>
                                                        English</option>
                                                    <option value="ar"
                                                        {{ $static->language->name == 'ar' ? 'selected' : '' }}>
                                                        Arabic</option>
                                                </select>
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
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Value</th>
                        <th class="text-center">Language</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
    <!-- Button for making new user -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make new static
    </button>


    <!-- Modal for making new static -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create static</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-5" method="post"
                        action="{{ route('admin.decoration.index.statics.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" required name="title" class="form-control" id="title">
                        </div>

                        <div class="form-group">
                            <label for="value">value</label>
                            <input type="text" required name="value" class="form-control" id="value">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Language</label>
                            <select required name="language" class="form-control" id="exampleFormControlSelect1">
                                <option value="en">English</option>
                                <option value="ar">Arabic</option>
                            </select>
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
