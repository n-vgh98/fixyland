@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    Transactions List
@endsection
@section('content')
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Transactions List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($contact_us as $contact)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $contact->email }}</td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($contact->request_title,'25') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#title{{ $contact->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center"> 
                            {!! \Illuminate\Support\Str::limit($contact->request_description,'25') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#description{{ $contact->id }}">
                                    Full Text  
                                </button></td>
                        </tr>
                        {{-- modal to show full request title  --}}
                            <div class="modal fade" id="title{{ $contact->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $contact->request_title;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full request title  --}}
                    {{-- modal to show full  request description   --}}
                            <div class="modal fade" id="description{{ $contact->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Description </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $contact->request_description;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full request description  --}}
                        @php
                            $number++;
                        @endphp
                        <!-- Modal for making new message -->
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Description</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
