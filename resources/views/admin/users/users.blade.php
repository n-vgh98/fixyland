@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    All Customers
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">All Customers Table</h3>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edituser{{ $user->id }}">
                                            Edit Information
                                        </button>

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

                        <!-- Modal for editing  user -->
                        <div class="modal fade mt-5" id="edituser{{ $user->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">update {{ $user->firstname }}
                                            {{ $user->lastname }} information</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('admin.users.update', $user) }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="firstname">first name</label>
                                                <input type="text" value="{{ $user->firstname }}" class="form-control"
                                                    id="firstname" name="firstname">
                                            </div>

                                            <div class="form-group">
                                                <label for="lastname">last name</label>
                                                <input type="text" value="{{ $user->lastname }}" class="form-control"
                                                    id="lastname" name="lastname">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Email address</label>
                                                <input type="email" value="{{ $user->email }}" name="email"
                                                    class="form-control" id="exampleFormControlInput1"
                                                    placeholder="name@example.com">
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" value="{{ $user->phone }}" class="form-control"
                                                    id="phone" name="phone">
                                            </div>

                                            <div class="form-group">
                                                <label for="password">password</label>
                                                <input type="text" class="form-control" id="password" name="password">
                                            </div>



                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Role</label>
                                                <select name="role" class="form-control" id="exampleFormControlSelect1">
                                                    @if ($user->role_name == 'superadmin')
                                                        <option selected value="superadmin">Super Admin</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                        <option value="technician">Technician</option>
                                                    @elseif($user->role_name == 'admin')
                                                        <option value="superadmin">Super Admin</option>
                                                        <option selected value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                        <option value="technician">Technician</option>
                                                    @elseif($user->role_name == 'user')
                                                        <option value="superadmin">Super Admin</option>
                                                        <option value="admin">Admin</option>
                                                        <option selected value="user">User</option>
                                                        <option value="technician">Technician</option>
                                                    @elseif($user->role_name == 'technician')
                                                        <option value="superadmin">Super Admin</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                        <option selected value="technician">Technician</option>
                                                    @endif
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
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Setting</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
    <!-- Button for making new user -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make new user
    </button>


    <!-- Modal for making new user -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.users.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="firstname">first name</label>
                            <input type="text" required class="form-control" id="firstname" name="firstname">
                        </div>

                        <div class="form-group">
                            <label for="lastname">last name</label>
                            <input type="text" required class="form-control" id="lastname" name="lastname">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" required name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" required class="form-control" id="phone" name="phone">
                        </div>

                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="text" required class="form-control" id="password" name="password">
                        </div>



                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Role</label>
                            <select required name="role" class="form-control" id="exampleFormControlSelect1">
                                <option value="superadmin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="technician">Technician</option>
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
