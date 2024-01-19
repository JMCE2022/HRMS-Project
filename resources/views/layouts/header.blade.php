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
        @foreach($notification['notify'] as $key)
        <div class="nav-item dropdown" id="{{$key->id}}">
            <a href="#" class="nav-link  me-2" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2" style="color:black;">
                    @if($key->unread)
                    <span class="badge badge-danger bg-primary pending">{{$key->unread}}</span>
                    @endif
                </i>

            </a>
            <div class="dropdown-menu dropdown-menu-end bg-white border-0 rounded-0 rounded-bottom m-0 custom-width"
                style="max-height: 500px; overflow-y: auto;">

                <table class="table">
                    <tr>
                        <th class="text-dark border-bottom border-light">Notification <span
                                class="text-danger">{{$key->unread}}</span></th>
                    </tr>

                    @foreach($getNot['getNotify'] as $unread)
                    <tr>
                        <td class="text-center border-bottom border-light">
                            {{$unread->message}} {{$unread->created_at}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>


        </div>
        @endforeach

        @if(empty($notification['notify']))
        <!-- If $notification['notify'] is empty, set a default value of 1 -->
        <div class="nav-item dropdown" id="defaultNotification">
            <a href="#" class="nav-link dropdown-toggle me-2" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2" style="color:black;">
                    <span class="badge badge-danger bg-primary pending">1</span>
                </i>
                <span class="text-white d-none d-lg-inline-flex">Notification</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-white border-0 rounded-0 rounded-bottom m-0">
                <!-- Your dropdown content here -->
            </div>
        </div>
        @endif




        <div class="nav-item ">
            <a class=" ">
                @if(Auth::user()->user_type == 0)
                <img class="rounded-circle me-lg-2" src="{{ asset('img/user3.png') }}" alt=""
                    style="width: 40px; height: 40px;">
                @elseif(Auth::user()->user_type == 1)
                <img class="rounded-circle me-lg-2" src="{{ asset('img/user.png') }}" alt=""
                    style="width: 40px; height: 40px;">
                @elseif(Auth::user()->user_type == 2)
                <img class="rounded-circle me-lg-2"
                    src="{{ asset('public/accountprofile/' . Auth::user()->profile_pic) }}" alt=""
                    style="width: 40px; height: 40px;">
                @endif

                <span class=" text-white d-none d-lg-inline-flex">{{Auth::user()->name}}</span>
            </a>
        </div>
    </div>
</nav>