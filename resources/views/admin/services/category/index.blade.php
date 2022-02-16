@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    All Service Categories
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.services.category.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.services.category.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">All Service Categories Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">name</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Image Alt</th>
                        <th class="text-center">Image Title</th>
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
                            $category = $language->langable;
                        @endphp

                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">
                                {{ $category->name }}
                            </td>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#edit{{ $category->id }}">
                                    <img src="{{ asset($category->photo_path) }}" style="height: 60px; width:60px;"
                                        class="img-fluid" alt="{{ $category->alt }}"
                                        title="{{ $category->title }}">
                                </button>
                            </td>
                            <td class="text-center">{{ $category->alt }}</td>
                            <td class="text-center">{{ $category->title }}</td>
                            <td class="text-center">{{ $category->language->name == 'en' ? 'English' : 'Arabic' }}
                            </td>

                            <td class="text-center">
                                @if ($category->status == 1)
                                    <form action="{{ route('admin.services.category.deactive', $category) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Active</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.services.category.activate', $category) }}"
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
                                        {{-- button for removing account --}}
                                        <form action="{{ route('admin.services.category.destroy', $category) }}"
                                            method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delet subcategory</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $number++;
                        @endphp

                        <!-- Modal for editing  subcategory -->
                        <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
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
                                            action="{{ route('admin.services.category.update', $category->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="name">category name</label>
                                                <input type="text" value="{{ $category->name }}" required name="name"
                                                    class="form-control" id="name">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">File</label>
                                                <input type="file" name="image" class="form-control-file"
                                                    id="exampleFormControlFile1">
                                            </div>

                                            <div class="form-group">
                                                <label for="alt">Alt for Image</label>
                                                <input value="{{ $category->alt }}" type="text" required name="alt"
                                                    class="form-control" id="alt">
                                            </div>

                                            <div class="form-group">
                                                <label for="Titile">Titile for Image</label>
                                                <input type="text" value="{{ $category->title }}" required name="title"
                                                    class="form-control" id="Titile">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Language</label>
                                                <select required name="language" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                    <option value="en"
                                                        {{ $category->language->name == 'en' ? 'selected' : '' }}>
                                                        English</option>
                                                    <option value="ar"
                                                        {{ $category->language->name == 'ar' ? 'selected' : '' }}>
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
                        <th class="text-center">name</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Image Alt</th>
                        <th class="text-center">Image Title</th>
                        <th class="text-center">Language</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
    <!-- Button for making new category -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make new Category
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
                    <form class="mt-5" method="post" action="{{ route('admin.services.category.store') }}"
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
