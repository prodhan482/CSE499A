@extends('layouts.web')

@section('custom_styles')
    {{-- Start added for user profile photo crop --}}
    <script src="{{ asset('js/user_profile_photo_crop/jquery.min.js') }}"></script>
    <script src="{{ asset('js/user_profile_photo_crop/croppie.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/user_profile_photo_crop/croppie.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- END added for user profile photo crop --}}
    <style>
        .blink_me {
            animation: blinker 1500ms linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: .65;
            }
        }

        .theme {
            background: #fa8231;
            color: #fff;
            "

        }

    </style>
@endsection

@section('content')
    <section class="page-title title-bg8">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Dashboard</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>


    <section class="candidate-details pt-100 pb-100">
        <div class="container">
            <div class="row">


                {{-- Student Dashboard Section --}}
                @include('web.student.sidebar-menu')
                {{-- Student Dashboard Section --}}

                <div class="col-lg-8">
                    @include('include.messages')

                    <div class="candidate-profile">
                        <div class="profile-thumb">
                            <span data-bs-toggle="modal"
                                data-bs-target="#user_profile_photo_modal{{ auth()->user()->id }}" title="Upload Photo"
                                style="cursor:pointer">
                                <img src="{{ auth()->user()->photo_url != null ? url('storage/' . auth()->user()->photo_url) : asset('/assets/img/null/avatar.jpg') }}"
                                    class="rounded-circle img-fluid" width="150" alt="User-Profile-Image">
                            </span><br>

                            <button type="button" class="btn theme m-2" data-bs-toggle="modal"
                                data-bs-target="#user_profile_photo_modal{{ auth()->user()->id }}"> <i
                                    class="fas fa-camera"></i> Update Photo</button>

                            {{-- <h2><i class="bx bxs-camera" data-bs-toggle="modal"
                                    data-bs-target="#user_profile_photo_modal{{ auth()->user()->id }}" title="Upload Photo"
                                    style="cursor:pointer"></i><span class="" style="font-size:14px">Update
                                    Photo</span></h2> --}}
                            <h3>{{ Auth::user()->name }}</h3>
                            @if ($student_data)
                                <p>Student ID: {{ $student_data->sid }}</p>
                            @endif
                            <p>Scholarship Candidate</p>

                        </div>
                        <ul>
                            <li>
                                <a href="">
                                    <i class='bx bxs-phone'></i>
                                    {{ Auth::user()->phone }}
                                </a>
                            </li>
                            <li>
                                <a href="email:{{ Auth::user()->email }}">
                                    <i class='bx bxs-envelope'></i>
                                    <span class="">{{ Auth::user()->email }}</span>
                                </a>
                            </li>
                        </ul>

                        @cannot('student-can')
                            <div class="candidate-social blink_me">
                                <a href="{{ route('student_profile_create') }}" target=""><button type="button"
                                        class="btn btn-warning">Please Complete Your
                                        Profile</button></a>
                            </div>
                        @endcannot
                        <br><br>

                        <div class="col-lg-8">
                            @include('include.messages')

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#exampleModalLong">
                                Apply Scholarship Rules and Instruction
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Shikkhabritti</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0"
                                                class="scrollspy-example" tabindex="0">
                                                <div>
                                                <h4 id="scrollspyHeading1">STEP 1</h4>
                                                <p>Update your Profile</p>
                                                <img src="{{ asset('assets\instruction\step 1.jpg') }}" width="200" height="200" />
                                                </div>
                                                <div>
                                                     <h4 id="scrollspyHeading2">STEP 2</h4>
                                                <p>FillUp this from</p>
                                                <img src="{{ asset('assets\instruction\step 2.jpg') }}" width="200" height="200" />
                                               
                                                </div>
                                                
                                                <div>

                                                    <h4 id="scrollspyHeading3">STEP 3</h4>
                                                <p>Give some document (ssc,Hsc,Birth) certificet</p>
                                                <img src="{{ asset('assets\instruction\step3.jpg') }}" width="200" height="200" />
                                              
                                                </div>

                                                <div>
                                                    <h4 id="scrollspyHeading4">STEP 4</h4>
                                                <p>Choose A brunch For schoolarship</p>
                                                <img src="{{ asset('assets\instruction\step 4.jpg') }}" width="200" height="200" />
                                               
                                                </div>

                                                <div>
                                                    <h4 id="scrollspyHeading5">STEP 5</h4>
                                                <p>Click Apply now Button</p>
                                                <img src="{{ asset('assets\instruction\step pro4.jpg') }}" width="200" height="200" />
                                               
                                                </div>

                                                <div>
                                                    <h4 id="scrollspyHeading5">STEP 6</h4>
                                                <p>Fillup Your accout from and Submit It</p>
                                                <img src="{{ asset('assets\instruction\step 5.jpg') }}" width="200" height="200" />

                                                </div>
                                                
                                                <div>
                                                    <p>
                                                    Must Do 1.must be fillup (*) marks Box 2. Give your Document picture .
                                                </p>
                                                </div>
                                                
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="subscribe-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>Get New Scholarship Notifications</h2>
                        <p>Subscribe & get all related scholarships notification</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="form-control" placeholder="Enter your email" name="EMAIL" required
                            autocomplete="off">
                        <button class="default-btn sub-btn" type="submit">
                            Subscribe
                        </button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- ------------------------Create account Modal------------------------- --}}

    <div class="modal fade" id="user_profile_photo_modal{{ auth()->user()->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                    <div class="form-group row">

                        <label for="formFile" class="col-md-3">Profile Photo</label>
                        <div class="col-md-9 custom-file">
                            <input type="file" class="form-control custom-file-input" id="upload{{ auth()->user()->id }}"
                                name="profile_photo" accept="image/x-png,image/gif,image/jpeg">
                            <label class="custom-file-label" for="profile_photo"></label>
                        </div>

                    </div>
                    <center>
                        <div id="upload-demo{{ auth()->user()->id }}" style="max-width:300px"></div>
                    </center>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" id="upload-result{{ auth()->user()->id }}">Upload</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $uploadCrop{{ auth()->user()->id }} = $('#upload-demo{{ auth()->user()->id }}').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'square' //circle,square
            },
            boundary: {
                width: 280,
                height: 280
            }
        });



        $('#upload{{ auth()->user()->id }}').on('change', function() {
            // window.alert('#upload{{ auth()->user()->id }}');
            var reader = new FileReader();
            // window.alert(reader{{ auth()->user()->id }});
            reader.onload = function(e) {
                $uploadCrop{{ auth()->user()->id }}.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });


        $('#upload-result{{ auth()->user()->id }}').on('click', function(ev) {
            $uploadCrop{{ auth()->user()->id }}.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {
                $.ajax({
                    url: "/profile_photo_upload",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "image": resp,
                        "user_id": {{ auth()->user()->id }}
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection

@section('custom_js')
@endsection
