@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    All scores
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.scores.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.scores.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">All Scores Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">mode</th>
                        <th class="text-center">title</th>
                        <th class="text-center">score</th>
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
                            $score = $language->langable;
                        @endphp

                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">
                                @if ($score->mode == 'vbad')
                                    {{ 'Very Bad' }}
                                @elseif($score->mode == 'bad')
                                    {{ 'Bad' }}
                                @elseif($score->mode == 'normal')
                                    {{ 'Normal' }}
                                @elseif($score->mode == 'good')
                                    {{ 'Good' }}
                                @elseif($score->mode == 'vgood')
                                    {{ 'Very Good' }}
                                @endif

                            </td>
                            <td class="text-center">{{ $score->name }}</td>
                            <td class="text-center">{{ $score->score }}</td>
                            <td class="text-center">{{ $score->language->name == 'en' ? 'English' : 'Arabic' }}</td>

                            <td class="text-center">
                                @if ($score->status == 1)
                                    <form action="{{ route('admin.scores.deactive', $score) }}" method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Active</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.scores.activate', $score) }}" method="post">
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

                                        {{-- button for editing account --}}
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit{{ $score->id }}">
                                            Edit Information
                                        </button>

                                        {{-- button for removing score --}}
                                        <form action="{{ route('admin.scores.destroy', $score) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delet Score</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $number++;
                        @endphp

                        <!-- Modal for editing  score -->
                        <div class="modal fade" id="edit{{ $score->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">update Score</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="mt-5" method="post"
                                            action="{{ route('admin.scores.update', $score->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">name of attribute</label>
                                                <input type="text" value="{{ $score->name }}" required name="name"
                                                    class="form-control" id="name">
                                            </div>

                                            <div class="form-group">
                                                <label for="score">score of attribute</label>
                                                <input type="number" value="{{ $score->score }}" required name="score"
                                                    class="form-control" id="score">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect12">Mode</label>
                                                <select required name="mode" class="form-control"
                                                    id="exampleFormControlSelect12">
                                                    <option {{ $score->mode == 'vbad' ? 'selected' : ' ' }} value="vbad">
                                                        Very Bad
                                                    </option>
                                                    <option {{ $score->mode == 'bad' ? 'selected' : ' ' }} value="bad">
                                                        Bad</option>
                                                    <option {{ $score->mode == 'normal' ? 'selected' : ' ' }}
                                                        value="normal">Normal</option>
                                                    <option {{ $score->mode == 'good' ? 'selected' : ' ' }} value="good">
                                                        Good</option>
                                                    <option {{ $score->mode == 'vgood' ? 'selected' : ' ' }}
                                                        value="vgood">Very Good</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Language</label>
                                                <select required name="language" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                    <option value="en"
                                                        {{ $score->language->name == 'en' ? 'selected' : '' }}>
                                                        English</option>
                                                    <option value="ar"
                                                        {{ $score->language->name == 'ar' ? 'selected' : '' }}>
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
                        <th class="text-center">mode</th>
                        <th class="text-center">title</th>
                        <th class="text-center">score</th>
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
        Make new Attribute
    </button>


    <!-- Modal for making new score -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Score</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-5" method="post" action="{{ route('admin.scores.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">name of attribute</label>
                            <input type="text" required name="name" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="score">score of attribute</label>
                            <input type="number" required name="score" class="form-control" id="score">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect12">Mode</label>
                            <select required name="mode" class="form-control" id="exampleFormControlSelect12">
                                <option value="vbad">Very Bad</option>
                                <option value="bad">Bad</option>
                                <option value="normal">Normal</option>
                                <option value="good">Good</option>
                                <option value="vgood">Very Good</option>
                            </select>
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
