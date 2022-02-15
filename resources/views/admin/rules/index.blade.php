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
                            <td class="text-center">{{ $rule->text_1 }}</td>
                            <td class="text-center">{{ $rule->text_2 }}</td>
                            <td class="text-center">{{ $rule->text_3 }}</td>
                            <td class="text-center">{{ $rule->text_4 }}</td>
                            <td class="text-center">{{ $rule->text_5 }}</td>

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
                                            <button type="submit" class="btn btn-danger ">Delet Rules</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
