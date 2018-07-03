<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="/overview">
                <img src="/images/logo-animated-460x190.gif" alt="logo">
            </a>
            <a class="navbar-brand brand-logo-mini pr-2 pl-2" href="index.html">
                <img src="/images/logo-animated-460x190.gif" alt="logo">
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav">
    
                <li class="nav-item dropdown d-none d-lg-flex">
                    <a class="nav-link dropdown-toggle nav-btn pt-1 pr-3 " id="menu_search_options" href="#" data-toggle="dropdown">
                        <i class="icon-magnifier icons"></i>
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="menu_search_options">
                        <p class="bg-primary p-2 pl-4 text-white">Search for...</p>
                        <a class="dropdown-item" href="#">
                            <i class="icon-user text-warning"></i>
                            Client
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="icon-briefcase text-warning"></i>
                            Contractor
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="icon-user-following text-warning"></i>
                            Staff Member
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="icon-docs text-warning"></i>
                            Jobcard
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-lg-flex">
                    <a class="nav-link dropdown-toggle nav-btn" id="menu_create_options" href="#" data-toggle="dropdown">
                        <span class="btn">+ Create new</span>
                    </a>
    
                    <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="menu_create_options">
                        <a class="dropdown-item" href="{{ route('company-create') }}?type=client">
                            <i class="icon-user text-warning"></i>
                            Client
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('company-create') }}?type=contractor">
                            <i class="icon-briefcase text-warning"></i>
                            Contractor
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="icon-user-following text-warning"></i>
                            Staff Member
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('jobcard-create') }}">
                            <i class="icon-docs text-warning"></i>
                            Jobcard
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-5" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                            </p>
                            <span class="badge badge-pill badge-warning float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="p-0 m-0">
    
                            <div class=" d-flex align-items-center border-bottom p-2">
                                <img class="img-sm rounded-circle" src="http://127.0.0.1:8000/images/profile_placeholder.svg" alt="">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0" style="font-size:  12px;">
                                        <a href="#">Kgomotso </a>posted a new jobcard for
                                        <a href="#">Gaborone City Council</a>
                                        <i class="mdi mdi-clock text-muted mr-1"></i>
                                        <small class="text-muted ml-auto">14 May 2017 - 08:26AM</small>
                                    </p>
                                </div>
                            </div>
                            <div class=" d-flex align-items-center border-bottom p-2">
                                <img class="img-sm rounded-circle" src="http://127.0.0.1:8000/images/profile_placeholder.svg" alt="">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0" style="font-size:  12px;">
                                        <a href="#">Keletso </a>added a new contractor for
                                        <a href="#">Ministry Of Health</a> job
                                        <i class="mdi mdi-clock text-muted mr-1"></i>
                                        <small class="text-muted ml-auto">14 May 2017 - 08:26AM</small>
                                    </p>
                                </div>
                            </div>
                            <div class=" d-flex align-items-center border-bottom p-2">
                                <img class="img-sm rounded-circle" src="http://127.0.0.1:8000/images/profile_placeholder.svg" alt="">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0" style="font-size:  12px;">
                                        <a href="#">Tumisang </a>updated the
                                        <a href="#">Water Utilitis</a> job from "UnAuthorized" to "Open"
                                        <i class="mdi mdi-clock text-muted mr-1"></i>
                                        <small class="text-muted ml-auto">14 May 2017 - 08:26AM</small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-user mx-0"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <div class="dropdown-divider"></div>
                        <ul class="list-group" style="min-width: 180px;">
                            <li class="list-group-item border-top-0">
                                <a href="{{ route('profile-show', [Auth::id()]) }}"><i class="icon-user icons mr-1"></i>
                                <span class="ml-auto">Profile</span></a>
                            </li>
                            <li class="list-group-item">
                            <a href="#"><i class="icon-settings icons mr-1"></i>
                                <span class="ml-auto">Settings</span></a>
                            </li>
                            <li class="list-group-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" > 
                                <i class="icon-logout icons mr-1"></i>
                                <span class="">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="icon-grid"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>