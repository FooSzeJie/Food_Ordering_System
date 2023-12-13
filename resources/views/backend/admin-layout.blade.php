<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- Define Title --}}
    @yield('title')

    @yield('adminCss')
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admindashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admindashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('table/assets/images/favicon.png') }}" rel="icon"> --}}
    {{-- <link href="{{ asset('table/assets/images/favicon.png') }}" rel="apple-touch-icon"> --}}
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->

    {{-- Table CSS --}}
    <link rel="stylesheet" href="{{ asset('table/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('table/assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('table/assets/css/style.css') }}">

    {{-- Icon CSS --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.0/dist/css/line-awesome.min.css" rel="stylesheet"> --}}

    <!-- Google Map JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Excel Modal -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    {{-- Paginate CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}

    {{-- Ajax JS --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    {{-- Pagination --}}
    <!-- Add this at the end of your view file, before the closing </body> tag -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
    <!-- Optional theme -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}
    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

    {{-- <style>
        .custom-margin {
            margin: 2px;
        }

        .custom-bg {
        background-color: white;
    }
    </style> --}}
</head>

{{-- <style>
    .navbar-nav {
        /* background: rgb(63,251,239); */
        /* background:linear-gradient(45deg, deeppink, blueviolet); */
        /* background:linear-gradient(45deg, #d2001a, #7462ff,#f48e21,#23d5ab); */
        /* background:linear-gradient(45deg, #d2001a, #f48e21,#7462ff,#23d5ab); */
        /* background-size: 125% 125%;
        animation: color 10s ease-in-out infinite; */
        /* background: linear-gradient(45deg, orange, white); */
        background: rgb(255, 166, 0);
    }

    .navbar {
        /* background: linear-gradient(to bottom right, blue, pink); */
        background: rgb(255, 166, 0);
    }

    .abc {
        /* background: rgb(63,251,239); */
        /* background: radial-gradient(circle at 50% 0,rgba(255, 0, 0, 0.5),rgba(255, 0, 0, 0) 70.71%); */
        background: linear-gradient(45deg, #d2001a, #7462ff, #f48e21, #23d5ab);
        background-size: 300% 300%;
        animation: color 12s ease-in-out infinite;
    }

    @keyframes color {
        0% {
            background-position: 0 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0 50%;
        }
    }
</style> --}}

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ url('/admin/dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>

                @php
                    $adminId = session('loginId');
                    $adminName = session('loginName');
                @endphp

                {{-- <div class="sidebar-brand-text mx-3">User Name: {{$id}} <sup></sup></div><br> --}}
                <div class="sidebar-brand-text mx-3">{{ $adminName }} <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/Category') }}">
                    <i class="fas fa-folder"></i>
                    <span>Category</span></a>
            </li>

            <!-- Nav Item - Pages Collapse My Place Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#MyPlace"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-file"></i>
                    <span>My Item</span>
                </a>

                <div id="MyPlace" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><i class="fas fa-cube"></i></i>&nbsp;Item</h6>
                        <a class="collapse-item" href="{{ url('/admin/Product') }}"><i class="fas fa-utensils"></i></i>&nbsp;Food</a>
                        <a class="collapse-item" href="{{ url('/admin/AddOn') }}"><i class="fas fa-plus-circle"></i></i>&nbsp;Add On</a>
                        <a class="collapse-item" href="{{ url('/admin/Variant')}}"><i class="fas fa-cubes"></i></i>&nbsp;Variant</a>
                    </div>
                </div>
                {{-- <a class="nav-link" href="{{ url('/admin/Category')}}">
                    <i class="fas fa-table"></i>
                    <span>Category</span>
                </a> --}}
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/allcontact') }}">
                    <i class="fas fa-folder"></i>
                    <span>User Contacts</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/allorder') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>User Orders</span></a>
            </li>

            <!-- Nav Item - Pages Collapse My Place Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#MyHasBooked"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-check-circle"></i>
                    <span>Product</span>
                </a>
                <div id="MyHasBooked" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('/admin/Product') }}"><i class="fas fa-check-circle"></i>&nbsp;Products</a>
                        <a class="collapse-item" href="{{ url('/admin/Variant') }}"><i class="fas fa-check-circle"></i>&nbsp;Variant</a>
                        <a class="collapse-item" href="{{ url('/admin/AddOn') }}"><i class="fas fa-check-circle"></i>&nbsp;Add Ons</a>
                    </div>
                </div>
            </li> --}}

            <!-- Nav Item Table and Room-->
            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-table"></i>
                    <span>Table</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-bed"></i>
                    <span>Room</span>
                </a>
            </li> --}}

            <!-- Nav Item - Tables -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-address-book"></i>
                    <span>Contact</span></a>
            </li> --}}

            <!-- Nav Item - User Deposit -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-user-circle"></i>
                    <span>User Deposit</span></a>
            </li> --}}

            <!-- Nav Item - REfund Deposit -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-money-check"></i>
                    <span>Refund Deposit</span></a>
            </li> --}}

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
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
            <div id="content" class="abc">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i
                            class="fa fa-bars"></i></button>

                    <!-- Topbar Search -->
                    {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button"><i class="fas fa-search fa-sm"></i></button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        {{-- <li class="nav-item dropdown no-arrow d-sm-none">
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
                        </li> --}}

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="{{ url('allcontact') }}" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">{{App\Models\Contact::count()}}</span>
                            </a>

                            <!-- Dropdown - Alerts -->
                            {{-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to
                                            download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                    Alerts</a>
                            </div> --}}
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="{{ url('allcontact') }}" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">{{App\Models\Contact::count()}}</span>
                            </a>
                        </li>

                        <!-- User Profile Model -->
                        <!-- Modal content for each User Profile -->
                        {{-- <div class="modal fade" id="profileModal{{ $id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- Modal header and form -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    id="name" value="{{ $name }}">
                                                <span class="text-danger">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    id="email" value="{{ $email }}">
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control" name="password"
                                                    id="password" value="{{ $password }}">
                                                <span class="text-danger">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        {{-- <a href="{{ url('refunduserdeposit/' . $userdeposit->id) }}"
                            class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#refunduserdepositModal{{ $userdeposit->id }}"><i class="fa fa-reply"></i>Refund</a> --}}

                        {{-- <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="{{ url('profile/' . $id) }}"
                                class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#profileModal{{ $id }}">
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('newuserdashboard/img/undraw_profile.svg') }}">
                            </a>
                        </li> --}}

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('backend-section')
                <br>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    {{-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> --}}

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
                    <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}


    {{-- JS User Backend UI --}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admindashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admindashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admindashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admindashboard/js/sb-admin-2.min.js') }}"></script>

    <!-- Modal JavaScript -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap JavaScript -->
    <!-- Add Bootstrap JavaScript -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> --}}
    <!-- Laravel default JavaScript setup -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}

    <!-- JS Table Files -->
    <!-- Add the necessary JavaScript files here -->
    {{-- <script src="{{ asset('table/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('table/assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('table/assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('table/assets/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('table/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('table/assets/js/custom.js') }}"></script> --}}

</body>

</html>
