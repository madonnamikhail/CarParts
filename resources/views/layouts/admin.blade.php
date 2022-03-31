<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}" />
    @stack('css')
</head>

<body>

    <div class="wrapper">


        {{-- <div id="pre-loader">
            <img src="images/pre-loader/loader-01.svg" alt="">
        </div> --}}



        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('assets/admin/images/logo-dark.png')}}" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/admin/images/logo-icon-dark.png')}}"
                        alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i
                                    class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">05</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">New registered user <small
                                class="float-right text-muted time">Just now</small> </a>
                        <a href="#" class="dropdown-item">New invoice received <small
                                class="float-right text-muted time">22 mins</small> </a>
                        <a href="#" class="dropdown-item">Server error report<small
                                class="float-right text-muted time">7 hrs</small> </a>
                        <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1
                                days</small> </a>
                        <a href="#" class="dropdown-item">Order confirmation<small
                                class="float-right text-muted time">2 days</small> </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big">
                        <div class="dropdown-header">
                            <strong>Quick Links</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                                <h5>New Task</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                                <h5>Assign Task</h5>
                            </a>
                        </div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                                <h5>Add Orders</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                                <h5>New Orders</h5>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('assets/admin/images/profile-avatar.jpg')}}" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">Michael Bean</h5>
                                    <span>michael-bean@mail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                        <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                        <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span
                                class="badge badge-info">6</span> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                        <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>



        <div class="container-fluid">
            <div class="row">

                <div class="side-menu-fixed">
                    <div class="scrollbar side-menu-bg">
                        <ul class="nav navbar-nav side-menu" id="sidebarnav">
                            <!-- menu item Dashboard-->
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="pull-left"><i class="ti-home"></i><span
                                            class="right-nav-text">لوحة التحكم</span></div>
                                    <div class="clearfix"></div>
                                </a>
                            </li>
                            <!-- menu title -->
                            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">المنتجات </li>
                            <!-- menu item Elements-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                    <div class="pull-left"><i class="ti-palette"></i><span
                                            class="right-nav-text">العناصر</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>

                                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ route('brands.index') }}">كل العلامات التجارية</a></li>
                                    <li><a href="{{ route('cities.index') }}">كل  المدن</a></li>
                                    <li><a href="{{ route('models.index') }}">كل  الموديلات</a></li>
                                    <li><a href="{{ route('regions.index') }}">كل  المناطق</a></li>
                                </ul>
                                <ul
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="content-wrapper">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="mb-0"> @yield('title')</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active"> @yield('title')</li>

                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                            @elseif (session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                             @endif
                        </div>
                        @yield('content')
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <footer class="bg-white p-4 w-100" style="position: fixed;bottom:0%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-center text-md-left">
                                            <p class="mb-0"> &copy; Copyright <span id="copyright">
                                                    <script>
                                                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                                    </script>
                                                </span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="text-center text-md-right">
                                            <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                                            <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                                            <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="{{asset('assets/admin/js/jquery-3.3.1.min.js')}}"></script>

    <!-- plugins-jquery -->
    <script src="{{asset('assets/admin/js/plugins-jquery.js')}}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = '{{asset("assets/admin/js")}}/';
    </script>

    <!-- chart -->
    <script src="{{asset('assets/admin/js/chart-init.js')}}"></script>

    <!-- calendar -->
    <script src="{{asset('assets/admin/js/calendar.init.js')}}"></script>

    <!-- charts sparkline -->
    <script src="{{asset('assets/admin/js/sparkline.init.js')}}"></script>

    <!-- charts morris -->
    <script src="{{asset('assets/admin/js/morris.init.js')}}"></script>

    <!-- datepicker -->
    <script src="{{asset('assets/admin/js/datepicker.js')}}"></script>

    <!-- sweetalert2 -->
    <script src="{{asset('assets/admin/js/sweetalert2.js')}}"></script>

    <!-- toastr -->
    <script src="{{asset('assets/admin/js/toastr.js')}}"></script>

    <!-- validation -->
    <script src="{{asset('assets/admin/js/validation.js')}}"></script>



<!-- lobilist -->
<script src="{{asset('assets/admin/js/lobilist.js')}}"></script>

<!-- custom -->
<script src="{{asset('assets/admin/js/custom.js')}}"></script>
</body>

</html>
