@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
   Footer Information
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.footer_info.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.footer_info.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">Footer Information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Phone-number</th>
                        <th class="text-center">Mobile-number</th>
                        <th class="text-center">Facebook</th>
                        <th class="text-center">Instagram</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Linkedin</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                        $footer_info = $language->langable;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td>
                            {!! \Illuminate\Support\Str::limit($footer_info->address,'10') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#address{{ $footer_info->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center">
                                {{$footer_info->phone_number}}
                            </td>
                            <td class="text-center">
                                {{$footer_info->mobile_number}}
                            </td>
                            <td class="text-center">
                                {{$footer_info->facebook_link}}
                            </td>
                            <td class="text-center">
                                {{$footer_info->linkedin_link}}
                            </td>
                            <td class="text-center">
                                {{$footer_info->instagram_link}}
                            </td>
                            <td class="text-center">
                                {{$footer_info->email_link}}
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
                                        {{-- button for editing footer info  --}}
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#edit_info{{ $footer_info->id }}">
                                            Edit
                                        </button>

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing footer info --}}
                                        <form action="{{ route('admin.footer_info.delete', $footer_info->id) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- modal to show full address  --}}
                            <div class="modal fade" id="address{{ $footer_info->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Address </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{$footer_info->address}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full address --}}
                        <!-- modal for edit info -->
                        <div class="modal fade mt-5" id="edit_info{{ $footer_info->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Information</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST"
                                            action="{{ route('admin.footer_info.update', $footer_info->id) }}">
                                            @csrf
                                            
                                            <input type="hidden" name="lang" value="{{ $footer_info->language->name }}">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" name="address" rows="3">{{ $footer_info->address }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_number">Phone-number:</label>
                                                <input type="text" class="form-control" name="phone_number" value="{{ $footer_info->phone_number }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile_number">Mobile-number:</label>
                                                <input type="text" class="form-control" name="mobile_number" value="{{ $footer_info->mobile_number }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="linkedin_link">linkedin-link:</label>
                                                <input type="text" class="form-control" name="linkedin_link" value="{{ $footer_info->linkedin_link }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="facebook_link">Facebook-link:</label>
                                                <input type="text" class="form-control" name="facebook_link" value="{{ $footer_info->facebook_link }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram_link">Instagram-link:</label>
                                                <input type="text" class="form-control" name="instagram_link" value="{{ $footer_info->instagram_link }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email_link">Email-link:</label>
                                                <input type="text" class="form-control" name="email_link" value="{{ $footer_info->email_link }}">
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
                        @php
                            $number++;
                        @endphp
                        <!-- Modal for making new message -->
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Phone-number</th>
                        <th class="text-center">Mobile-number</th>
                        <th class="text-center">Facebook</th>
                        <th class="text-center">Instagram</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Linkedin</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
  
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Make New Info
    </button>

    <!-- Modal for making new information -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Footer Informatin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.footer_info.store') }}">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone-number:</label>
                            <input type="text" class="form-control" name="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">Mobile-number:</label>
                            <input type="text" class="form-control" name="mobile_number">
                        </div>
                        <div class="form-group">
                            <label for="linkedin_link">linkedin-link:</label>
                            <input type="text" class="form-control" name="linkedin_link">
                        </div>
                        <div class="form-group">
                            <label for="facebook_link">Facebook-link:</label>
                            <input type="text" class="form-control" name="facebook_link">
                        </div>
                        <div class="form-group">
                            <label for="instagram_link">Instagram-link:</label>
                            <input type="text" class="form-control" name="instagram_link">
                        </div>
                        <div class="form-group">
                            <label for="email_link">Email-link:</label>
                            <input type="text" class="form-control" name="email_link">
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
