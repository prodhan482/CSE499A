<style>
    @font-face {
      font-family: Clip;
      src: url("https://acupoftee.github.io/fonts/Clip.ttf");
    }


    @keyframes blink {
      0%,
      22%,
      36%,
      75% {
        color: #0c0c0c;
      }
      28%,
      33% {
        color: #ff65bd;
        text-shadow: none;
      }
      82%,
      97% {
        color: #ff2483;
        text-shadow: none;
      }
    }

    .flicker {
      animation: shine 2s forwards, blink 3s 2s infinite;
    }

    .fast-flicker {
      animation: shine 2s forwards, blink 10s 1s infinite;
    }

    @keyframes shine {
      0% {
        color: #6b1839;
        text-shadow: none;
      }
      100% {
        color: #0c0c0c;
        
      }
    }

    @keyframes flicker {
      from {
        opacity: 1;
      }

      4% {
        opacity: 0.9;
      }

      6% {
        opacity: 0.85;
      }

      8% {
        opacity: 0.95;
      }

      10% {
        opacity: 0.9;
      }

      11% {
        opacity: 0.922;
      }

      12% {
        opacity: 0.9;
      }

      14% {
        opacity: 0.95;
      }

      16% {
        opacity: 0.98;
      }

      17% {
        opacity: 0.9;
      }

      19% {
        opacity: 0.93;
      }

      20% {
        opacity: 0.99;
      }

      24% {
        opacity: 1;
      }

      26% {
        opacity: 0.94;
      }

      28% {
        opacity: 0.98;
      }

      37% {
        opacity: 0.93;
      }

      38% {
        opacity: 0.5;
      }

      39% {
        opacity: 0.96;
      }

      42% {
        opacity: 1;
      }

      44% {
        opacity: 0.97;
      }

      46% {
        opacity: 0.94;
      }

      56% {
        opacity: 0.9;
      }

      58% {
        opacity: 0.9;
      }

      60% {
        opacity: 0.99;
      }

      68% {
        opacity: 1;
      }

      70% {
        opacity: 0.9;
      }

      72% {
        opacity: 0.95;
      }

      93% {
        opacity: 0.93;
      }

      95% {
        opacity: 0.95;
      }

      97% {
        opacity: 0.93;
      }

      to {
        opacity: 1;
      }
    }
  </style>
<div class="col-md-4" style="padding-bottom: 15px">
    <div class="account-information">
        <div class="profile-thumb">
            
            <a href="{{ route('student_dashboard') }}">
            <img src="{{ auth()->user()->photo_url != null ? url('storage/' . auth()->user()->photo_url) : asset('/assets/img/null/avatar.jpg') }}" class="rounded-circle img-fluid" width="150" title="Update Photo" alt="Shikkha Britti"></a>

            {{-- <h2><i class="bx bxs-camera" data-bs-toggle="modal" data-bs-target="#user_profile_photo_modal{{auth()->user()->id}}" title="Upload Photo" style="cursor:pointer"></i></h2> --}}
            <h3>{{ auth()->user()->name }}</h3>
            @if ($student_data)
                <p class="fw-bold">Student ID: {{ $student_data->sid }}</p>
            @endif
            <p class="pt-2">Scholarship Candidate</p>

        </div>
        <ul>
            <li>
                <a href="{{ route('student_dashboard') }}"
                    class="{{ \Request::route()->getName() == 'student_dashboard' ? 'active' : '' }}">
                    <i class='bx bxs-dashboard'></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('student_profile', auth()->user()->id) }}"
                    class="{{ \Request::route()->getName() == 'student_profile' ? 'active' : '' }}">
                    <i class='bx bx-user'></i>
                    My Profile
                </a>
            </li>
            @role('STUDENT')
                {{-- @if ($student_data) --}}
                <li>
                    <a href="{{ route('student_edit', ['student_id' => $student_data->id]) }}"
                        class="{{ \Request::route()->getName() == 'student_edit' ? 'active' : '' }}">
                        <i class='bx bxs-edit'></i>
                        Edit Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_document') }}"
                        class="{{ \Request::route()->getName() == 'student_document' ? 'active' : '' }}">
                        <i class='bx bx-file'></i>
                        Documents
                    </a>
                </li>

                <li>
                    <a href="{{ route('student_applications_index') }}"
                        class="{{ \Request::route()->getName() == 'student_applications_index' ? 'active' : '' }}">
                        <i class='bx bx-briefcase'></i>
                        Applied Scholarships
                    </a>
                </li>

                <li>
                    <div>
                        <a href="{{ route('available_scholarships') }}"
                        class="{{ \Request::route()->getName() == 'available_scholarships' ? 'active' : '' }}">
                        <i class='bx bx-briefcase'></i>
                        Available Scholarship
                            {{-- <i class='bx bx-chevrons-left bx-fade-left'></i> --}}
                            <b><span class="fast-flicker">ap</span>ply <span class="flicker">he</span>re</b>
                            <i class='bx bx-chevrons-right bx-fade-right'></i>
                       </a>
                    </div>
                    
                </li>

                <li>
                    <a href="{{ route('student_account') }}"
                        class="{{ \Request::route()->getName() == 'student_account' ? 'active' : '' }}">

                        <i class='bx bx-money'></i>
                        Accounts
                    </a>
                </li>
                {{-- @endif --}}
            @endrole


            <li>
                <a href="{{ route('edit_user_info') }}"
                    class="{{ \Request::route()->getName() == 'edit_user_info' ? 'active' : '' }}">
                    <i class='bx bx-cog'></i>
                    Settings
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out'></i>
                    Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>

        </ul>
    </div>
</div>
