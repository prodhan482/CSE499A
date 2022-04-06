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

@section('page_errors')
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
@endsection


@section('content')
    <section class="content">

        <div class="container-fluid px-lg-4">
            <div class="row">
                <div class="col-md-12 mt-lg-4 mt-4">
                    <!-- Page Heading -->
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="col-md-12 mt-lg-4 mt-4">
                                <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">
                                        {{ (new DateTime($month_year))->format('F-Y') }} : Statement List
                                    </h1>

                                    <a href="{{ route('manage_statement_search') }}"
                                        class="btn-sm btn-primary shadow-sm"><i class="fa fa-search mr-2"></i>
                                        Search again
                                    </a>
                                </div>
                            </div>
                            @if ($statements->count() != null)
                                <a type="button" class="btn-sm btn-success float-right" data-toggle="modal"
                                    data-target="#status_change_modal"
                                    data-scholarship_id_u="{{ $statements->first()->scholarship_id }}"
                                    data-month_year_u="{{ $statements->first()->month_year }}"><i
                                        class="fa fa-check mr-2"></i>Mark all as PAID</a>
                            @endif
                            <!-- title -->
                        </div>
                    </div>
                </div>

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
                                        <th>Cost</th>
                                        <th>Total</th>
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
                                            <td>{{ $statement->approved_cost }}</td>
                                            <td>{{ $statement->approved_amount + $statement->approved_cost }}</td>
                                            @php
                                                $payee = explode('\\', $statement->account->accountable_type);
                                            @endphp

                                            <td>{{ $statement->account->account_title }} - {{ $payee[2] }}</td>

                                            <td>{{ $statement->status }}</td>
                                            <td>{{ (new DateTime($statement->month_year))->format('M-Y') }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($statement->note, 40, $end = '...') }}
                                            </td>

                                            <td>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('manage_statement_details', $statement->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="View Details"><i
                                                        class="fa fa-eye"></i></a>

                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('manage_statement_edit', $statement->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
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


    {{-- ------------------------change status Modal---------------------------- --}}
    <div class="modal fade" id="status_change_modal" tabindex="-1" aria-labelledby="status_change_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-secondary" id="status_change_modal">ATTENTION!!</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ route('manage_statement_payment_status_change') }}" method="POST">
                        @csrf
                        <div class="text-center my-3">
                            <i class="fas fa-edit fa-4x text-warning" aria-hidden="true"></i>
                        </div>
                        <div class="text-center">
                            <h5 class=" font-weight-bold text-danger">{{ (new DateTime($month_year))->format('F-Y') }}
                            </h5>
                            <h5 class=" font-weight-bold">Make payment status "PAID" for all for ?</h5>
                        </div>

                        <input type="hidden" id="scholarship_id_u" name="scholarship_id_u" value="">
                        <input type="hidden" id="month_year_u" name="month_year_u" value="">
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Continue</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- ------------------------Delete User Modal---------------------------- --}}
    <div class="modal fade" id="delete_warning_modal" tabindex="-1" aria-labelledby="delete_warning_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="delete_warning_modal">ATTENTION!!</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ route('manage_scholarships_delete') }}" method="POST">
                        @csrf
                        <div class="text-center my-3">
                            <i class="fas fa-trash fa-4x text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="text-center display-5 font-weight-bold">
                            Are You Sure ?
                        </div>

                        <input type="hidden" id="scholarship_id_d" name="scholarship_id_d" value="">
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    {{-- ------------Change STATUS Script-------------- --}}
    <script>
        $('#status_change_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var scholarship_id = button.data('scholarship_id_u')
            var month_year = button.data('month_year_u')
            console.log(scholarship_id);
            var modal = $(this)
            modal.find('.modal-body #scholarship_id_u').val(scholarship_id)
            modal.find('.modal-body #month_year_u').val(month_year)
        })
    </script>


    {{-- ------------Delete Script-------------- --}}

    <script>
        $('#delete_warning_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var scholarship_id = button.data('scholarship_id_d')
            console.log(scholarship_id);
            var modal = $(this)
            modal.find('.modal-body #scholarship_id_d').val(scholarship_id)
        })
    </script>

    <!-- jQuery -->
    {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap 4 -->
    {{-- <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 15,
                "responsive": false,
                "scrollX": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
