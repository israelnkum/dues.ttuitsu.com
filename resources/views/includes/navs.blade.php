
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header text-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <!-- Logo icon --><b>
                    <img src="{{asset('logo/logo.jpg')}}"  height="auto" width="45"
                         alt="{{$depName->departmentName}}"

                         class="light-logo text-uppercase" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('mimg/itsu.jpeg')}}"  height="auto" width="45"
                              alt="{{$depName->departmentName}}"
                              class="dark-logo text-uppercase" />
                    <!-- Light Logo text -->
                    {{--<img src="{{asset('img/itsu.jpeg')}}"  height="auto" width="45" class="light-logo" alt="homepage" />--}}
                </span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item font-20">
                    <div class="app-search text-white d-none d-md-block d-lg-block">
                        Union Management System
                    </div>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
            {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>--}}
            {{--<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">--}}
            {{--<ul>--}}
            {{--<li>--}}
            {{--<div class="drop-title">Notifications</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<div class="message-center">--}}
            {{--<!-- Message -->--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>--}}
            {{--<div class="mail-contnet">--}}
            {{--<h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>--}}
            {{--</a>--}}
            {{--<!-- Message -->--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>--}}
            {{--<div class="mail-contnet">--}}
            {{--<h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>--}}
            {{--</a>--}}
            {{--<!-- Message -->--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>--}}
            {{--<div class="mail-contnet">--}}
            {{--<h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>--}}
            {{--</a>--}}
            {{--<!-- Message -->--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>--}}
            {{--<div class="mail-contnet">--}}
            {{--<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</li>--}}
            <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
            {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>--}}
            {{--<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">--}}
            {{--<ul>--}}
            {{--<li>--}}
            {{--<div class="drop-title">You have 4 new messages</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<div class="message-center">--}}
            {{--<!-- Message -->--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<div class="user-img"> <img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>--}}
            {{--<div class="mail-contnet">--}}
            {{--<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>--}}
            {{--</a>--}}
            {{--<!-- Message -->--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<div class="user-img"> <img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>--}}
            {{--<div class="mail-contnet">--}}
            {{--<h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>--}}
            {{--</a>--}}
            {{--<!-- Message -->--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<div class="user-img"> <img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>--}}
            {{--<div class="mail-contnet">--}}
            {{--<h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>--}}
            {{--</a>--}}
            {{--<!-- Message -->--}}
            {{--<a href="javascript:void(0)">--}}
            {{--<div class="user-img"> <img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>--}}
            {{--<div class="mail-contnet">--}}
            {{--<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</li>--}}
            <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- mega menu -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End mega menu -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- User Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="hidden-md-down text-white">
                               @if (Auth::check())
                                   {{ Auth::user()->username }}
                                   &nbsp;
                               @endif
                               <i class="fa fa-angle-down"></i>
                            </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <!-- text-->
                        @if (Auth::check())
                            @if (Auth::user()->updated==0)

                            @else
                                @if(Auth::user()->userType == 'admin')
                                    <a href="{{route('super.admin.update')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                @elseif(Auth::user()->userType == 'user')
                                    <a href="{{route('admin.update')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                @endif

                            @endif
                        @endif
                    <!-- text-->
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        @if (Auth::check())
                            @if(Auth::user()->userType == 'user')
                                <a href="{{route('user.logout')}}" class="dropdown-item">
                                    <i class="fa fa-power-off"></i>
                                    Logout
                                </a>

                            @elseif(Auth::user()->userType == 'admin')
                                <a href="{{route('admin.logout')}}" class="dropdown-item">
                                    <i class="fa fa-power-off"></i>
                                    Logout
                                </a>

                            @endif
                        @endif
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End User Profile -->
                <!-- ============================================================== -->
                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
            </ul>
        </div>
    </nav>
</header>

<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
@if (Auth::check())
    @if (Auth::user()->updated==0)

    @else
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            @if (Auth::check())
                                @if(Auth::user()->userType=='admin')
                                    <a class="waves-effect waves-dark" href="{{route('admin-dashboard')}}">
                            <span class="hide-menu">
                                <i class="icon-speedometer"></i> Dashboard
                            </span>
                                    </a>

                                @else
                                    <a class="waves-effect waves-dark" href="{{route('home')}}">
                            <span class="hide-menu">
                                <i class="icon-speedometer"></i> Dashboard
                            </span>
                                    </a>
                                @endif
                            @endif
                        </li>


                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-layout-accordion-merged"></i>
                                <span class="hide-menu">Students</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('student.index')}}">All Students</a></li>
                                <li><a href="{{route("student.create")}}">New Students</a></li>
                                <li><a href="{{route('studentUpload.index')}}">Upload Student</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti ti-user"></i>
                                <span class="hide-menu">Registration</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('register.index')}}">Registered Students</a></li>
                                <li><a href="{{route("register.create")}}">Unregistered Students</a></li>
                            </ul>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{route('paymentLog.index')}}">
                            <span class="hide-menu">
                                <i class="icon-speedometer"></i> Dues Log
                            </span>
                            </a>
                        </li>
                        @if (Auth::check())
                            @if(Auth::user()->userType=="admin")
                                <li> <a class="waves-effect waves-dark" href="{{route('duesPreference.index')}}">
                            <span class="hide-menu">
                                <i class="icon-speedometer"></i> Dues Preference
                            </span>
                                    </a>
                                </li>

                                <li>
                                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                        <span class="hide-menu">
                                Admins
                            </span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{route('admin.all')}}">All Admin</a></li>
                                        <li><a href="{{route('admin.new')}}">New Admin</a></li>
                                        <li><a href="{{route('super.admin.new')}}">New Super Admin</a></li>
                                    </ul>
                                </li>
                            @else
                            @endif
                        @endif

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
    @endif
@endif