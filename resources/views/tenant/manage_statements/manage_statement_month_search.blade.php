@extends('layouts.dashboard_layout')
@section('custom_style')
    <link href="{{ asset('assets/css/bs-datepicker.min.css') }}" rel="stylesheet">
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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Monthly Statement Search</h1>
                                <a href="{{ route('dashboard') }}"
                                    class="d-sm-inline-block btn-sm btn-primary shadow-sm"><i
                                        class="fa fa-backward mr-2"></i>
                                    Dashboard
                                </a>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                </div>
            </div>

            <!-- column -->
            <div class="col-md-12 mt-4">
                <div class="card card-body">
                    <form method="post" action="{{ route('manage_statement_search_show') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="scholarship">Select Scholarship<span class="text-danger">*</span></label>
                                <select class="form-control" name="scholarship_id" id="scholarship" required>
                                    <option value="">SELECT</option>
                                    @forelse ($scholarships as $scholarship)
                                        <option value="{{ $scholarship->id }}">{{ $scholarship->scholarship_title }}
                                        </option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <!-- select -->
                            <div class="form-group">
                                <label>Month & Year<span class="text-danger">*</span></label>
                                <input type="text" name="month_year" id="for_month" class="form-control"
                                    placeholder="yyyy-mm-dd" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <form class="offset-1" action="" method="POST">
                    <div class="form-group">
                        <label for="scholarship">Select Scholarship<span class="text-danger">*</span></label>
                        <select class="form-control" name="scholarship_id" id="scholarship" required>
                            <option value="">SELECT</option>
                            @forelse ($scholarships as $scholarship)
                                <option value="{{ $scholarship->id }}">{{ $scholarship->scholarship_title }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Start Date</label>
                            <input type="month" class="form-control" name="from" id="from">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">End Date</label>
                            <input type="month" class="form-control" name="to" id="to">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Name</label>
                            <select class="form-control" id="name">
                                <option selected disabled>Choose</option>
                                <option value="All">All</option>
                                <option value="Student">Student</option>
                                <option value="Mentor">Mentor</option>
                            </select>
                        </div>
                    </div>
                    <div class="offset-3">
                        <button type="submit" class="btn btn-primary" id="generate">Search</button>
                        <button type="reset" class="btn btn-danger" id="reset">Reset</button>
                    </div>
                </form>
            </div> --}}
        @endsection


        @section('extra_js')
            <script src="{{ asset('assets/js/bs-datepicker.min.js') }}"></script>
            <script>
                $("#for_month").datepicker({
                    format: "yyyy-mm-dd",
                    startView: "months",
                    minViewMode: "months"
                });
            </script>


            <script src="{{ asset('assets/js/statement_search.js') }}"></script>
        @endsection
