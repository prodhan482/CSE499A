@extends('layouts.web')
@section('custom_style')
@endsection

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

<style>
    tr td:last-child {
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
                            <!-- <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Md. Prodhan</td>
                                    <td>1821</td>
                                    <td>01791928169</td>
                                    <td>200/-</td>
                                    <td>Md. Prodhan</td>
                                    <td>Paid</td>
                                    <td>March</td>
                                    <td></td>
                                    <td>Got it.</td>
                                </tr>
                            </tbody> -->
                            <tbody>
                                @forelse($statements as $statement)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $statement->student->name }}</td>
                                    <td>{{ $statement->student->sid }}</td>
                                    <td>{{ $statement->student->phone }}</td>
                                    <td>{{ $statement->approved_amount }}</td>
                                    {{-- <td>{{ $statement->account->account_title }}</td> --}}
                                    @php
                                    $payee = explode('\\', $statement->account->accountable_type);
                                    @endphp

                                    <td>{{ $statement->account->account_title }} - {{ $payee[2] }}</td>

                                    <td>{{ $statement->status }}</td>
                                    <td>{{ (new DateTime($statement->month_year))->format('M-Y') }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($statement->note, 40, $end = '...') }}
                                    </td>

                                    <!-- <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('manage_statement_details', $statement->id) }}" data-toggle="tooltip" data-placement="top" title="View Details"><i class="fa fa-eye"></i></a>

                                    <a class="btn btn-sm btn-warning" href="{{ route('manage_statement_edit', $statement->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                </td> -->

                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('extra_js')
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

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