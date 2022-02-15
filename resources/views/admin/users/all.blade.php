@extends('admin.layouts.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('panel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel=" stylesheet" href="{{ asset('panel/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">All Users Table</h3>
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
                            <td class="text-center">{{ $user->role_name }}</td>

                            <td class="text-center">h</td>
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
    <!-- DataTables  & Plugins -->

    <script src="{{ asset('panel/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('panel/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
