<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi web Permintaan sample">
    <meta name="author" content="Deni Ace">

    <title>@yield('title')</title>
    <link rel="icon" href="{{asset("img/logo.jpeg")}}">

    <!-- Custom fonts for this template-->
    <link href="{{url("assets/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{url("css/sb-admin-2.min.css")}}" rel="stylesheet">
    <link href="{{url("css/app.css")}}" rel="stylesheet">
    <link href="{{url("assets/jquery-ui/jquery-ui.min.css")}}" rel="stylesheet">

    <script src="{{url("assets/jquery/jquery.min.js")}}"></script>
    <script src="{{url("assets/jquery-ui/jquery-ui.min.js")}}"></script>

    @yield('head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url("beranda") }}">
                <div class="sidebar-brand-icon">
                    <img src="{{asset("img/logo.jpeg")}}" alt="logo" class="w-100">
                </div>
                <div class="sidebar-brand-text mx-3">Permintaan Sample</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if (Request::is('beranda')) active @endif ">
                <a class=" nav-link" href="{{ url("beranda") }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>
            {{-- jika role nya adalah admin --}}
            @if (Auth::user()->id_role === 1)
            <li class="nav-item @if (Request::is('akun*')) active @endif ">
                <a class=" nav-link" href="{{ url("akun") }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Akun</span></a>
            </li>
            <!-- Nav Item - Naive Bayes -->
            <li class="nav-item @if (Request::is('naive_bayes*')) active @endif ">
                <a class=" nav-link" href="{{ url("naive_bayes") }}">
                    <i class="fas fa-book-open"></i>
                    <span>Naive Bayes</span></a>
            </li>
            <!-- Nav Item - Naive Bayes -->
            <li class="nav-item @if (Request::is('import*')) active @endif ">
                <a class=" nav-link" href="{{ url("import") }}">
                    <i class="far fa-file-excel"></i>
                    <span>import excel</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Areas -->
            <li class="nav-item @if (Request::is('areas*')) active @endif">
                <a class="nav-link" href="{{ url("areas") }}">
                    <i class="fab fa-autoprefixer"></i>
                    <span>Areas</span></a>
            </li>

            <!-- Nav Item - Areas -->
            <li class="nav-item @if (Request::is('division*')) active @endif">
                <a class="nav-link" href="{{ url("division") }}">
                    <i class="fas fa-divide"></i>
                    <span>Division</span></a>
            </li>
            @endif

            {{-- jika role nya adalah admin dan manager --}}
            @if (Auth::user()->id_role === 2)

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item @if (Request::is('permintaansample*')) active @endif ">
                <a class=" nav-link" href="{{ url("permintaansample") }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Permintaan Sample</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url("profile/".Auth::user()->id."/edit") }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <!-- container-fluid -->
                @yield('container')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Permintaan Sample 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="#"
                        onclick="document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Bootstrap core JavaScript-->
    {{-- <script src="{{url("assets/jquery/jquery.min.js")}}"></script> --}}
    <script src="{{url("assets/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    {{-- <script src="{{url("assets/jquery-ui/jquery-ui.min.js")}}"></script> --}}

    <!-- Core plugin JavaScript-->
    <script src="{{url("assets/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url("js/sb-admin-2.min.js")}}"></script>

    @yield('js')

</body>

</html>