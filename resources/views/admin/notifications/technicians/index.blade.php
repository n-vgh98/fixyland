@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    Technicians notifications
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Technicians Notifications Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Receivers</th>
                        <th class="text-center">Text</th>
                        <th class="text-center">Mode</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Time</th>
                        <th class="text-center">Setting</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($notifications as $notification)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $notification->receivers }}</td>
                            <td class="text-center">
                                {{ Illuminate\Support\Str::limit($notification->text, 20, '(...)') }}
                            </td>
                            <td class="text-center">
                                @if ($notification->mode == 0)
                                    {{ 'Public' }}
                                @else
                                    {{ 'Private' }}
                                @endif
                            </td>
                            <td class="text-center">
                                {{ $notification->sender->firstname }} {{ $notification->sender->lastname }}
                            </td>

                            <td class="text-center">
                                {{ $notification->created_at }}
                            </td>

                            <td class="text-center">
                                {{-- button for setting --}}
                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-info">Actions</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu text-center">

                                        {{-- button for editing account --}}
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#shownotification{{ $notification->id }}">
                                            Show notification
                                        </button>
                                        <div class="dropdown-divider"></div>
                                        {{-- button for editing account --}}
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editnotification{{ $notification->id }}">
                                            Edit notification
                                        </button>

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing notification --}}
                                        <form action="{{ route('admin.notifications.destroy', $notification) }}"
                                            method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delet Notification</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $number++;
                        @endphp

                        <!-- Modal for showing  message -->
                        <div class="modal fade mt-5" id="shownotification{{ $notification->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Notification Text</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Notification Text</label>
                                            <textarea disabled class="form-control" name="text"
                                                id="exampleFormControlTextarea1"
                                                rows="3">{{ $notification->text }}</textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for editing  message -->
                        <div class="modal fade mt-5" id="editnotification{{ $notification->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">update notification</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post"
                                            action="{{ route('admin.notifications.update', $notification) }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                                <textarea class="form-control" name="text"
                                                    id="exampleFormControlTextarea1"
                                                    rows="3">{{ $notification->text }}</textarea>
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
                        <th class="text-center">Receivers</th>
                        <th class="text-center">Text</th>
                        <th class="text-center">Mode</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Time</th>
                        <th class="text-center">Setting</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
    <!-- Button for making new user -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make new Notification
    </button>


    <!-- Modal for making new message -->
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.notifications.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Notification Text</label>
                            <textarea class="form-control" name="text" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">For:</label>
                            <select required name="receivers" class="form-control" id="exampleFormControlSelect1">
                                <option value="SuperAdmins">Super Admins</option>
                                <option value="Admins">Admins</option>
                                <option value="Customers">Customers</option>
                                <option value="Technicians">Technicians</option>
                                <option value="AllUsers">All Users</option>
                            </select>
                        </div>
                        <input type="hidden" value="public" name="mode">
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
