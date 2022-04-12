@extends('admin.layouts.master')
@section('head')
    @include('admin.layouts.datatable.head')
@endsection
@section('title')
    Setting
@endsection
@section('content')
    <div class="card mt-4">
        <!-- Button for making new user -->
        <div class="card-header">
            <h3 class="card-title">Setting</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">percent</th>
                        <th class="text-center">max price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($settings as $setting)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $setting->karmozd }}</td>
                            <td class="text-center">{{ $setting->max_price }}</td>
                        </tr>
                        @php
                            $number++;
                        @endphp
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">percent</th>
                        <th class="text-center">max price</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>

    @if (count($settings) != 0)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Edit Setting
        </button>
    @else
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Make new setting
        </button>
    @endif
    <!-- Modal for making new setting -->
    @if (count($settings) != 0)
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Discount</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.setting.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="question">percent:</label>
                                <input type="text" value="{{ $settings[0]->karmozd }}" class="form-control" required
                                    name="percent">
                            </div>
                            <div class="form-group">
                                <label for="answer">Max Price:</label>
                                <input type="text" value="{{ $settings[0]->max_price }}" class="form-control" required
                                    name="max_price">
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
    @else
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Discount</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.setting.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="question">percent:</label>
                                <input type="text" class="form-control" required name="percent">
                            </div>
                            <div class="form-group">
                                <label for="answer">Max Price:</label>
                                <input type="text" class="form-control" required name="max_price">
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
    @endif
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
