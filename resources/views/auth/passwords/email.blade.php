@extends('layouts.web')



@section('content')

    <section class="page-title title-bg13">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Forgot Password?</h2>
                <ul>
                    <li>
                        <a href="index.html">Forgot Password?</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    <div class="signup-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                    
                    <form class="signup-form" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-ssuccess">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                        </div>

                        <div class="signup-btn text-center">
                            <button type="submit">Send Password Link</button>
                        </div>
                        
                        <div class="create-btn text-center">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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

@endsection

@section('custom_js')

@endsection
