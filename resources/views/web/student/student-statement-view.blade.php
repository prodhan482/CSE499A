@extends('layouts.dashboard_layout')
@section('custom_style')
    {{-- <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        tr td:last-child {
            /* width: 9%; */
            white-space: nowrap;
        }

        .color {
            background: linear-gradient(to right, #ec2F4B, #009FFF);
            color: white;
            font-weight: bold;
        }

    </style>
@endsection

{{-- @section('page_errors')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection --}}


@section('content')
    <section class="content">

        <div class="container-fluid px-lg-4">
            <div class="row">
                <!-- column -->

                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="color">
                                        <th>SL#</th>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>Payee - (Mentor/Student)</th>
                                        <th>Status</th>
                                        <th>Month</th>
                                        <th>Note</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($statements as $statement)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $statement->student->name }}</td>
                                            <td>{{ $statement->student->sid }}</td>
                                            <td>{{ $statement->student->phone }}</td>
                                            <td>{{ $statement->approved_amount }}</td>
                                            {{-- @php
                                                $payee = explode('\\', $statement->account->accountable_type);
                                            @endphp --}}

                                            {{-- <td>{{ $statement->account->account_title }} - {{ $payee[2] }}</td> --}}

                                            <td>{{ $statement->status }}</td>
                                            <td>{{ (new DateTime($statement->month_year))->format('M-Y') }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($statement->note, 40, $end = '...') }}
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endsection
