@extends('admin.layouts.master')
@section('head')
    @include('admin.layouts.datatable.head')
@endsection
@section('title')
    Discounts
@endsection
@section('content')
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
                        <th class="text-center">Mode</th>
                        <th class="text-center">Expire Time</th>
                        <th class="text-center">User</th>
                        <th class="text-center">percent</th>
                        <th class="text-center">max price</th>
                        <th class="text-center">Code</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($discounts as $discount)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $discount->mode == 0 ? 'Public' : 'Private' }}</td>
                            <td class="text-center">{{ $discount->expire_time }}</td>
                            <td class="text-center">
                                @if ($discount->user != null)
                                    {{ $discount->user->firstname }} {{ $discount->user->lastname }}
                                @else
                                    {{ 'All users' }}
                                @endif

                            </td>
                            <td class="text-center">{{ $discount->percent }}</td>
                            <td class="text-center">
                                {{ $discount->max_price != null ? $discount->max_price : 'Infinit' }}
                            </td>
                            <td class="text-center">
                                {{ $discount->code }}
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

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing rules --}}
                                        <form action="{{ route('admin.discount.delete', $discount->id) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $number++;
                        @endphp
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Mode</th>
                        <th class="text-center">Expire Time</th>
                        <th class="text-center">User_id</th>
                        <th class="text-center">percent</th>
                        <th class="text-center">max price</th>
                        <th class="text-center">Code</th>

                    </tr>
                </tfoot>
            </table>



        </div>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make new Discount
    </button>

    <!-- Modal for making new discount -->
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
                    <form method="post" action="{{ route('admin.discount.store') }}">
                        @csrf
                        <input type="hidden" name="mode" value="0">
                        <div class="form-group">
                            <label for="question">percent:</label>
                            <input type="text" class="form-control" required name="percent">
                        </div>
                        <div class="form-group">
                            <label for="answer">Max Price:</label>
                            <input type="text" class="form-control" required name="max_price">
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Expire Time</label>
                            <input name="expire_time" type="date">
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
