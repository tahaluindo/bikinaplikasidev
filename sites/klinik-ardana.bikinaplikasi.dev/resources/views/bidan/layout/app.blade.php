
@php


@endphp

<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ url('') }}/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('') }}/assets/libs/css/style.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/vector-map/jqvmap.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/toastr/toastr.min.css">
    <!-- Toastr -->
        
    <title>{{ env('APP_NAME') }}</title>
    
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    
    <!-- sweetalert -->
    <script src='{{ asset("js/sweetalert.min.js") }}'></script>
    
    <!-- myscript -->
    <script src='{{ asset("js/myscript.js") }}'></script>
    
    
    <script>
        var urlGetBarang = '{{ url("admin/getBarang") }}/';
    </script>
</head>

<body>

    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                
                <img src="{{ asset('image') }}/logo.png" alt="AdminLTE Logo"class="brand-image img-circle elevation-3" style='width: 75px !important;'>
                <span class="brand-text font-weight-normal">{{ env('APP_NAME') }}</span>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="{{ url('') }}/#" id="navbarDropdownMenuLink1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="{{ url('') }}/#"
                                                class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="{{ url('') }}/assets/images/avatar-2.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name text-success">Jeremy
                                                            Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="{{ url('') }}/#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="{{ url('') }}/assets/images/avatar-3.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name text-success">John
                                                            Abraham</span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="{{ url('') }}/#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="{{ url('') }}/assets/images/avatar-4.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name text-success">Monaan
                                                            Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="{{ url('') }}/#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="{{ url('') }}/assets/images/avatar-5.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name text-success">Jessica
                                                            Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="{{ url('') }}/#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="{{ url('') }}/#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="{{ url('') }}/#" class="connection-item"><img
                                                    src="{{ url('') }}/assets/images/github.png" alt="">
                                                <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="{{ url('') }}/#" class="connection-item"><img
                                                    src="{{ url('') }}/assets/images/dribbble.png" alt="">
                                                <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="{{ url('') }}/#" class="connection-item"><img
                                                    src="{{ url('') }}/assets/images/dropbox.png" alt="">
                                                <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="{{ url('') }}/#" class="connection-item"><img
                                                    src="{{ url('') }}/assets/images/bitbucket.png" alt="">
                                                <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="{{ url('') }}/#" class="connection-item"><img
                                                    src="{{ url('') }}/assets/images/mail_chimp.png" alt=""><span>Mail
                                                    chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="{{ url('') }}/#" class="connection-item"><img
                                                    src="{{ url('') }}/assets/images/slack.png" alt="">
                                                <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="{{ url('') }}/#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link text-white nav-user-img" href="{{ url('') }}/#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ url('') }}/assets/images/avatar-1.jpg" alt=""
                                    class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name text-center">{{$user['nama']}}</h5>
                                    
                                </div>
                                <a class="dropdown-item" href="{{ url('') }}/#"><i
                                        class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="{{ url('') }}/#"><i
                                        class="fas fa-cog mr-2"></i>Setting</a>
                                                
                                <a href="{{url('/logout')}}" class="dropdown-item">
                                    <i class="fa fa-sign-out-alt mr-2"></i> Logout
                                </a>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="nav-left-sidebar bg-success">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="{{ url('') }}/#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">

                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

                            <li class="nav-item ">
                                <a href="{{url('admin/index')}}"
                                    class="nav-link text-white {{Request::is('admin/index') ? 'active text-dark' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                        Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('bidan/periksa/today')}}"
                                    class="nav-link {{ Request::is('bidan/periksa/today') ? 'active ' : ''}}">
                                    <i class="fa fa-user-md nav-icon"></i>
                                    Hari Ini
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('bidan/periksa/all')}}"
                                    class="nav-link {{ Request::is('bidan/periksa/all') ? 'active ' : ''}}">
                                    <i class="fa fa-user-tie nav-icon"></i>
                                    Semua
                                </a>
                            </li>
                        </ul>



                    </div>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">
            {{-- @include('layouts.message') --}}
            <div id="pesan" class="d-none" data-pesan="{{ Session::get('pesan') }}" data-type="{{ Session::get('type') }}"></div>
            
            <p style='display: inline-block; padding-bottom: 20px; '>
            @yield('content')

            <div class="footer" style='position: fixed; bottom: 0;'>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2021 Puskesmas. All rights reserved.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="{{ url('') }}/javascript: void(0);">About</a>
                                <a href="{{ url('') }}/javascript: void(0);">Support</a>
                                <a href="{{ url('') }}/javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets')}}/dist/js/adminlte.js"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="{{ url('') }}/assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="{{ url('') }}/assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <script src="{{ url('') }}/assets/libs/js/main-js.js"></script>
    <script src="{{ url('') }}/assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ url('') }}/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="{{ url('') }}/assets/vendor/charts/sparkline/spark-js.js"></script>
    <script src="{{ url('') }}/assets/libs/js/dashboard-sales.js"></script>

    @yield('script')

    <script>
        $(function () {
            $("#example1").DataTable({
                "autoWidth": false,
                "ordering": false,
            });
        });

        $(document).ready(function (){
          var pesan = $('#pesan').attr('data-pesan');
          var type = $('#pesan').attr('data-type');
          if(pesan){
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            if(type == 'success'){
                toastr.success(pesan);
            } else if(type == 'error'){
                toastr.error(pesan);
            }
          }
        });

        $(document).on("click", ".open-modal-hapus", function () {
            var id_data = $(this).data("id_data");
            var kode_data = $(this).data("kode_data");
            $(".modal-footer #id").val(id_data);
            $(".modal-body #informasi").html("Apakah kamu ingin menghapus data \(" + kode_data + "\)?");
        // As pointed out in comments, 
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
        });

        @if (count($errors) > 0)
            $('#modal-tambah').modal('show');
        @endif

    </script>
</body>

</html>