@extends('layouts.dashboard_layout')
@section('custom_style')
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Student List</h1>
                                <div class="col-md-6">

                                    <label for="gender">Student List by Catagory <span
                                            class="text-danger font-weight-bold"></span></label>

                                    <div>

                                        
                                        {{-- <select class="form-control" required>
                                        <option value="">SELECT</option>
                                        @foreach ($data as $degree)
                                            <option value="{{ $degree->level_id }}">{{ $degree->level }}</option>
                                        @endforeach

                                        @foreach ($data as $degree)

                                        <option value="">ALL</option>
                                                    
                                                    <option value="">SSC</option>
                                                    <option value="">HSC</option>
                                                 
                                                    <option value="">Bachelors</option>
                                                   
                                                    <option value="">Diploma</option>
                                                    <option value="">Masters</option>
                                        <option value="{{$degree->level_id="5"}}">Masters</option> 
                                         @endforeach


                                    </select> --}}
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- title -->
                </div>
            </div>
        </div>
        {{-- --------------------------------Table Starts----------------------------------------- --}}

        <!-- column -->
        <div class="col-md-12 mt-4">
            <div class="card py-3">
                <form action="{{ route('manage_students_index') }}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="col-md-3">
                            <select class="form-control" name="level" id="level" required>
                                <option selected disabled>
                                    Educational Level
                                </option>
                                <option value="School">School</option>
                                <option value="College">College</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Bachelors">Bachelors</option>
                                <option value="Masters">Masters</option>
                            </select>
                        </div><br>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary rounded" name="search"
                                id="search">Search</i></button>
                            <button type="reset" class="btn btn-danger" name="reset"
                                id="reset">Reset</button>
                        </div>
                    </div>
                </form><br>

                <div class="table-responsive">
                    <table id="exapmle" class="table table-striped zero-configuration">
                        <thead>
                            <tr class="text-white font-weight-bold"
                                style="background: linear-gradient(to right, #ec2F4B, #009FFF);">
                                <th>SL#</th>
                                <th>Name</th>
                                <th>Id</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Educational Level</th>


                            </tr>
                        </thead>
                        <?php $count = 0; ?>
                        @foreach ($data as $degree)
                            <tbody>

                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $degree->student->name }}</td>
                                    <td>{{ $degree->student->sid }}</td>
                                    <td>{{ $degree->student->phone }}</td>
                                    <td>{{ $degree->student->email }}</td>
                                    {{-- <td>{{ $student_data->sid }}</td>
                                    <td>{{ $student_data->phone }}</td>
                                    <td>{{ $student_data->email }}</td> --}}

                                    <td>{{ $degree->level }}</td>

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('extra_js')
    {{-- <script src="{{ asset('/plugins/tables/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script> --}}
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });

            // DataTable
            var table = $('#example').DataTable({
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;

                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });
        });
    </script>

    <script>
        $("#search").on("click", function(){
            var link = document.getElementById("level").value;

            $.ajax({
                url:window.location.href = "manage_students_info/"+ link
            });
        });
    </script>
@endsection
