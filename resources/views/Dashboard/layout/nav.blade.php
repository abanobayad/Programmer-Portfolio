<div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo"><img src="/img/logo/svg/w.svg" alt="logo" /></a>
            <a class="sidebar-brand brand-logo-mini"><img src="/img/logo/svg/w.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            @if (Auth()->user()->avatar == null)
                                <img class="img-xs rounded-circle" src="/uploads/default.png"
                                    alt="profile avatar">
                            @else
                                <img class="img-xs rounded-circle"  src="{{Storage::disk('s3')->url(Auth::user()->avatar)}}"
                                    alt="profile avatar">
                            @endif
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{ Auth()->user()->name }}</h5>
                            <span>Good Morning {{ Auth()->user()->name }}</span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                            class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                        aria-labelledby="profile-dropdown">
                        <a href="/dashboard/setting" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('setting.edit')}}" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword  text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar-today text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>

            {{-- Home --}}
            <li class="nav-item menu-items">
                <a href="{{ route('home')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            {{-- AboutMe --}}
            <li class="nav-item menu-items">
                <a href="{{ route('about')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-card-details"></i>
                    </span>
                    <span class="menu-title">About Me</span>
                </a>
            </li>

            {{-- Quality --}}
            <li class="nav-item menu-items">
                <a href="{{ route('quality')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-school"></i>
                    </span>
                    <span class="menu-title">Quality</span>
                </a>
            </li>



            {{-- Skills --}}
            <li class="nav-item menu-items">
                <a href="{{ route('skill')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-poll"></i>
                    </span>
                    <span class="menu-title">Skills</span>
                </a>
            </li>


            {{-- Services --}}
            <li class="nav-item menu-items">
                <a href="{{ route('service')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-puzzle"></i>
                    </span>
                    <span class="menu-title">Services</span>
                </a>
            </li>


            {{-- Testmonials --}}
            <li class="nav-item menu-items">
                <a href="{{ route('testmonial')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-multiple"></i>
                    </span>
                    <span class="menu-title">Testmonials</span>
                </a>
            </li>

            {{-- Projects --}}
            <li class="nav-item menu-items">
                <a href="{{ route('project')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-projector-screen"></i>
                    </span>
                    <span class="menu-title">Projects</span>
                </a>
            </li>


            {{-- Certificate --}}
            <li class="nav-item menu-items">
                <a href="{{ route('certificate')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-certificate"></i>
                    </span>
                    <span class="menu-title">Certificates</span>
                </a>
            </li>

            {{-- Contact --}}
            <li class="nav-item menu-items">
                <a href="{{ route('contact')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-contacts"></i>
                    </span>
                    <span class="menu-title">Contacts</span>
                </a>
            </li>


            {{-- Hires --}}
            <li class="nav-item menu-items">
                <a href="{{ route('hire')}}" class="nav-link">
                    <span class="menu-icon">
                        <i class="mdi mdi-worker"></i>
                    </span>
                    <span class="menu-title">Hires</span>
                </a>
            </li>

        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini"><img
                        src="/img/logo/svg/cn.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                    data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" class="form-control" placeholder="Search products">
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="{{ route('home')}}">
                            <i class="mdi mdi-home"></i>
                        </a>
                    </li>

                    <li id="noti_content" class="nav-item dropdown border-left" >
                        <a class=" nav-link  count-indicator dropdown-toggle" id="notificationDropdown"
                            href="#" data-bs-toggle="dropdown">

                                <span   >
                                    @if (auth()->user()->unreadNotifications->count() > 0)
                                        <i class="mdi mdi-bell">
                                        <span class="count  badge-danger "></span>
                                        </i>
                                        <span class="text-light"
                                            id="noti_count">{{ auth()->user()->unreadNotifications->count() }}
                                        </span>
                                    @else
                                        <i class="mdi mdi-bell">
                                        <span class=" badge badge-dark text-light ">
                                            {{ auth()->user()->unreadNotifications->count() }}
                                        </span>
                                    </i>
                                    @endif

                                </span>


                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <div class="dropdown-divider"></div>

                            {{-- Start Noti --}}
                            @foreach (auth()->user()->unreadNotifications->sortByDesc('updated_at')->take(3) as $notification)
                            <a class="scrollable-container dropdown-item preview-item"
                                href="{{ route('markRead', $notification->id) }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">

                                        @if ($notification->type == 'App\Notifications\NewContact')
                                        <i class="mdi mdi-contacts text-success"></i>
                                        @elseif ($notification->type == 'App\Notifications\NewHire')
                                        <i class="mdi mdi-worker text-warning"></i>
                                        @endif

                                    </div>
                                </div>

                                <div class="preview-item-content">
                                    <p class="font-weight-bold preview-subject mb-2">{{$notification->data['data']['title']}}</p>
                                    <p class="font-weight-light  ellipsis mb-1"> {{$notification->data['data']['body']}} </p>
                                    <p class="text-muted ellipsis mb-1" style="float: right"> {{$notification->updated_at->diffForHumans()}} </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            @endforeach
                            {{-- End Noti --}}

                            <p   class="p-3 mb-0 text-center">
                            <a style="text-decoration: none" class="text-light" href="{{route('showAll')}}" > See all notifications</a>
                            </p>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                            <div class="navbar-profile">
                                @if (Auth()->user()->avatar == null)
                                    <img class="img-xs rounded-circle" src="/uploads/default.png"
                                        alt="profile avatar">
                                @else
                                    <img class="img-xs rounded-circle"
                                    src="{{Storage::disk('s3')->url(Auth::user()->avatar)}}" alt="profile avatar">
                                @endif
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth()->user()->name }}</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('setting')}}" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout')}}" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Log out</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">Advanced settings</p>
                        </div>
                    </li>


                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
