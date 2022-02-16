@extends('admin.layouts.master')
@section('head')
    @include("admin.layouts.datatable.head")
@endsection
@section('title')
   Rules
@endsection
@section('content')
    <section class="text-center">
        <div class="btn-group btn-group-toggle">
            <a href="{{ route('admin.rules.index', 'ar') }}" class="btn btn-primary">Arabic</a>
            <a href="{{ route('admin.rules.index', 'en') }}" class="btn btn-primary">English</a>
        </div>
    </section>
    <div class="card mt-4">
      <!-- Button for making new user -->  
        <div class="card-header">
            <h3 class="card-title">All Rules</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Text_1</th>
                        <th class="text-center">Text_2</th>
                        <th class="text-center">Text_3</th>
                        <th class="text-center">Text_4</th>
                        <th class="text-center">Text_5</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($languages as $language)
                        @php
                        $rule = $language->langable;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($rule->text_1,'30') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#text_1{{ $rule->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($rule->text_2,'30') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#text_2{{ $rule->id }}">
                                    Full Text  
                                </button>
                            </td>
                            <td class="text-center"> 
                            {!! \Illuminate\Support\Str::limit($rule->text_3,'10') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#text_3{{ $rule->id }}">
                                    Full Text  
                                </button></td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($rule->text_4,'10') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#text_4{{ $rule->id }}">
                                    Full Text 
                                </button></td>
                            <td class="text-center">
                            {!! \Illuminate\Support\Str::limit($rule->text_5,'10') !!}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#text_5{{ $rule->id }}">
                                    Full Text 
                                </button></td>

                            <td class="text-center">
                                {{-- button for setting --}}
                                <div class="btn-group text-center">
                                    <button type="button" class="btn btn-info">Setting</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu text-center">
                                        {{-- button for editing rule  --}}
                                        <a href="{{ route('admin.rules.edit', $rule->id) }}" class="btn btn-primary">
                                            Edit Rules
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        {{-- button for removing rules --}}
                                        <form action="{{ route('admin.rules.delete', $rule->id) }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger ">Delete Rules</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- modal to show full text_1  --}}
                            <div class="modal fade" id="text_1{{ $rule->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Text_1 </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $rule->text_1;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full text_1 --}}
                    {{-- modal to show full text_2  --}}
                            <div class="modal fade" id="text_2{{ $rule->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Text_2 </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $rule->text_2;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full text_2 --}}
                    {{-- modal to show full text_3 --}}
                            <div class="modal fade" id="text_3{{ $rule->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Text_3 </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $rule->text_3;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full text_3--}}
                    {{-- modal to show full text_4  --}}
                            <div class="modal fade" id="text_4{{ $rule->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Text_4 </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $rule->text_4;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full text_4 --}}
                     {{-- modal to show full text_5  --}}
                            <div class="modal fade" id="text_5{{ $rule->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Full Text_5 </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                echo $rule->text_5;
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {{-- end of modal to show full text_5 --}}

                        @php
                            $number++;
                        @endphp
                        <!-- Modal for making new message -->
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Text_1</th>
                        <th class="text-center">Text_2</th>
                        <th class="text-center">Text_3</th>
                        <th class="text-center">Text_4</th>
                        <th class="text-center">Text_5</th>
                        <th class="text-center">Options</th>
                    </tr>
                </tfoot>
            </table>



        </div>
    </div>
  
    <a href="{{ route('admin.rules.create', $lang) }}" class="btn btn-primary">Make New Rule</a>
@endsection
@section('script')
    @include('admin.layouts.datatable.script')
@endsection
