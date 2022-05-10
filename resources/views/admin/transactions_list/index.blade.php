@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
    Transactions List
@endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Transactions List</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Customer Name</th>
                        <th class="text-center">Technician Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Total Price</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Factor</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($archives as $archive)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">{{ $archive->id }}</td>
                            <td class="text-center">{{ $archive->order->user->firstname }}{{ $archive->order->user->lastname }}</td>
                            <td class="text-center">{{ $archive->technician->firstname }}{{ $archive->technician->lastname }}</td>
                            @if( $archive->status == 1 )
                                <td class="text-center">
                                    <span class="badge bg-warning"> Doing</span>
                                </td>
                            @elseif ( $archive->status == 2 )
                                <td class="text-center">
                                    <span class="badge bg-success"> Done </span>
                                </td>
                            @elseif ( $archive->status == 3 )
                                <td class="text-center">
                                    <span class="badge bg-danger"> Canceled </span>
                                </td>
                            @endif
                            <td class="text-center"> {{ $archive->total_price }} </td>
                            <td class="text-center">{{ $archive->created_at->toDateString() }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#factor{{ $archive->id }}">
                                        Factor 
                                </button>
                            </td>
                        </tr>
                        {{-- modal to show full factor  --}}
                            <div class="modal fade" id="factor{{ $archive->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Factor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="service_cost">Service Cost:</label>
                                                <input type="text" class="form-control" name="service_cost" value="{{ $archive->service_cost }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="stuff_cost">Stuff Cost:</label>
                                                <input type="text" class="form-control" name="stuff_cost" value="{{ $archive->stuff_cost }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="transport_cost">Transport Cost:</label>
                                                <input type="text" class="form-control" name="transport_cost" value="{{ $archive->transport_cost }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="final_price">Final Price:</label>
                                                <input type="text" class="form-control" name="final_price" value="{{ $archive->final_price }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="total_price">Total Price:</label>
                                                <input type="text" class="form-control" name="total_price" value="{{ $archive->total_price }}" disabled>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full factor  --}}
                        @php
                            $number++;
                        @endphp
                        <!-- Modal for making new message -->
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Customer Name</th>
                        <th class="text-center">Technician Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Total Price</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Factor</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>

@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
