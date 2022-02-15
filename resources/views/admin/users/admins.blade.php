@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    All Admins
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">All admins Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Setting</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">
                                @if ($user->status == 1)
                                    <form action="{{ route('admin.users.deactive', $user) }}" method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Active</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.users.activate', $user) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Deactive</button>
                                    </form>
                                @endif
                            </td>
                            <td class="text-center">
                                {{-- button for changing roll --}}

                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-primary">{{ $user->role_name }}</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu text-center">
                                        {{-- button promoting to super admin --}}
                                        <form action="{{ route('admin.users.changetosuperadmin', $user) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Change to Super Admin</button>
                                        </form>
                                        {{-- button promoting to  admin --}}
                                        <form action="{{ route('admin.users.changetoadmin', $user) }}"
                                            class="mt-2" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Change to Admin</button>
                                        </form>

                                        <form action="{{ route('admin.users.changetouser', $user) }}"
                                            class="mt-2" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Change to User</button>
                                        </form>

                                        <form action="{{ route('admin.users.changetotechnician', $user) }}"
                                            class="mt-2" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Change to technician</button>
                                        </form>




                                    </div>
                                </div>
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
                                        <a class="dropdown-item" href="#">Edit Account</a>

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing account --}}
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delet Account</button>
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
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Setting</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
