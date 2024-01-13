<nav class="navbar navbar-expand bg-success navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-dark mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars" style="color:black;"></i>

    </a>

    <a>

        <span class=" text-white d-none d-lg-inline-flex">Human Resource Management System</span>
    </a>

    <div class="navbar-nav align-items-center ms-auto">

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle me-2" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2" style="color:black;"></i>
                <span class=" text-white d-none d-lg-inline-flex ">Notificatin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-white border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Profile updated</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">New user added</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Password changed</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all notifications</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a class=" ">
                @if(Auth::user()->user_type == 0)
                <img class="rounded-circle me-lg-2" src="{{ asset('img/user3.png') }}" alt="" style="width: 40px; height: 40px;">
                @elseif(Auth::user()->user_type == 1)
                <img class="rounded-circle me-lg-2" src="{{ asset('img/user.png') }}" alt="" style="width: 40px; height: 40px;">
                @elseif(Auth::user()->user_type == 2)
                <img class="rounded-circle me-lg-2" src="{{ asset('public/accountprofile/' . Auth::user()->profile_pic) }}" alt="" style="width: 40px; height: 40px;">
                @endif

                <span class=" text-white d-none d-lg-inline-flex">{{Auth::user()->name}}</span>
            </a>
        </div>
    </div>
</nav>