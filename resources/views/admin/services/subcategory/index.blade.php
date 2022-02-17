@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    All Service subcategories
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">All Service subcategories Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">name</th>
                        <th class="text-center">category name</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Image Alt</th>
                        <th class="text-center">Image Title</th>
                        <th class="text-center">Language</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Popular</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $subcategory->name }}</td>
                            <td class="text-center">{{ $subcategory->category->name }}</td>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#edit{{ $subcategory->id }}">
                                    <img src="{{ asset($subcategory->photo_path) }}" style="height: 60px; width:60px;"
                                        class="img-fluid" alt="{{ $subcategory->alt }}"
                                        title="{{ $subcategory->title }}">
                                </button>
                            </td>
                            <td class="text-center">{{ $subcategory->alt }}</td>
                            <td class="text-center">{{ $subcategory->title }}</td>
                            <td class="text-center">
                                {{ $subcategory->category->language->name == 'en' ? 'English' : 'Arabic' }}
                            </td>

                            <td class="text-center">
                                @if ($subcategory->status == 1)
                                    <form action="{{ route('admin.services.subcategory.deactive', $subcategory) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Active</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.services.subcategory.activate', $subcategory) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Deactive</button>
                                    </form>
                                @endif
                            </td>

                            <td class="text-center">
                                @if ($subcategory->popular == 1)
                                    <form action="{{ route('admin.services.subcategory.hate', $subcategory) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Popular</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.services.subcategory.popular', $subcategory) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Not Popular</button>
                                    </form>
                                @endif
                            </td>

                            <td class="text-center">
                                {{-- button for Options --}}
                                <div class="btn-group text-center ">

                                    @if ($subcategory->form == null)
                                        <form method="post" action="{{ route('admin.forms.store') }}">
                                            @csrf
                                            <input type="hidden" name="subcategory_id" value="{{ $subcategory->id }}">
                                            <button type="submit" class="btn btn-warning" data-toggle="modal"
                                                data-target="#makeform{{ $subcategory->id }}">
                                                Make Form
                                            </button>
                                        </form>

                                    @elseif(count($subcategory->form->questions) == 0)
                                        <a class="btn btn-success"
                                            href="{{ route('admin.forms.questions.show', $subcategory->form->id) }}">
                                            Make First Question</a>
                                    @else
                                        <a class="btn btn-success" href="{{ route('admin.forms.questions.show', $subcategory->form->id) }}">
                                            See Questions</a>
                                    @endif

                                    <button type="button" class="btn btn-info">Setting</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu text-center">
                                        @if ($subcategory->description == null)
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.services.subcategory.description.create', $subcategory->id) }}">Make
                                                Descriptions</a>
                                        @else
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.services.subcategory.description.edit', $subcategory->description) }}">update
                                                Descriptions</a>
                                        @endif
                                        {{-- button for removing subcategory --}}
                                        <form class="mt-3"
                                            action="{{ route('admin.services.subcategory.destroy', $subcategory) }}"
                                            method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delet subcategory</button>
                                        </form>

                                        @if ($subcategory->form != null)
                                            {{-- button for removing form --}}
                                            <form class="mt-3"
                                                action="{{ route('admin.forms.destroy', $subcategory->form) }}"
                                                method="post">
                                                @method("delete")
                                                @csrf
                                                <button type="submit" class="btn btn-danger ">Delet Form</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $number++;
                        @endphp

                        <!-- Modal for editing  subcategory -->
                        <div class="modal fade" id="edit{{ $subcategory->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">update subcategory</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="mt-5" method="post"
                                            action="{{ route('admin.services.subcategory.update', $subcategory->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="name">subcategory name</label>
                                                <input type="text" value="{{ $subcategory->name }}" required name="name"
                                                    class="form-control" id="name">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Category</label>
                                                <select required name="category_id" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $subcategory->category->name == $category->name ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">File</label>
                                                <input type="file" name="image" class="form-control-file"
                                                    id="exampleFormControlFile1">
                                            </div>

                                            <div class="form-group">
                                                <label for="alt">Alt for Image</label>
                                                <input value="{{ $subcategory->alt }}" type="text" required name="alt"
                                                    class="form-control" id="alt">
                                            </div>

                                            <div class="form-group">
                                                <label for="Titile">Titile for Image</label>
                                                <input type="text" value="{{ $subcategory->title }}" required
                                                    name="title" class="form-control" id="Titile">
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
                        <th class="text-center">name</th>
                        <th class="text-center">category name</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Image Alt</th>
                        <th class="text-center">Image Title</th>
                        <th class="text-center">Language</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Popular</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
    <!-- Button for making new subcategory -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make new Category
    </button>


    <!-- Modal for making new subcategory -->
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
                    <form class="mt-5" method="post" action="{{ route('admin.services.subcategory.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" required name="name" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">File</label>
                            <input type="file" required name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="form-group">
                            <label for="alt">Alt for Image</label>
                            <input type="text" required name="alt" class="form-control" id="alt">
                        </div>

                        <div class="form-group">
                            <label for="title">title for Image</label>
                            <input type="text" required name="title" class="form-control" id="title">
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
