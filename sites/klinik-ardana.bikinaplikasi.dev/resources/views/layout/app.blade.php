
@php

$data = [
            'user' => auth()->user()->user->toArray(),
            'pegawai' => \App\Pegawai::all()->toArray(),
            'judul' => 'Tambah Data',
            'action' => 'Admin\PegawaiController@simpan',
            'method' => 'POST',
        ];

@endphp


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets')}}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user mr-2"></i>{{$user['nama']}} ( Admin )
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="{{url('/logout')}}" class="dropdown-item">
                            <i class="fa fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-danger elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('image') }}/logo.png" alt="AdminLTE Logo"class="brand-image img-circle elevation-3" style='width: 75px !important;'>
                <span class="brand-text font-weight-normal">{{ env('APP_NAME') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">

                        <li class="nav-item ">
                            <a href="{{url('admin/index')}}"
                                class="nav-link {{Request::is('admin/index') ? 'active' : 'bg-light' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li
                            class="nav-item has-treeview {{ (Request::is('admin/bidan*') ? 'menu-open' : Request::is('admin/pegawai*')) ? 'menu-open' : (Request::is('admin/admin*') ? 'menu-open' : '') }}">

                            {{-- <li class="nav-item has-treeview menu-open"> --}}
                            <a href="#"
                                class="nav-link {{ (Request::is('admin/bidan*') ? 'active' : Request::is('admin/pegawai*')) ? 'active' : (Request::is('admin/admin*') ? 'active' : 'bg-light') }}">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Data User
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{-- <li class="nav-item">
                                    <a href="{{url('admin/admin')}}"
                                class="nav-link {{ Request::is('admin/admin*') ? 'active bg-dark' : ''}}">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Admin</p>
                                </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{url('admin/bidan')}}"
                                class="nav-link {{ Request::is('admin/bidan*') ? 'active bg-dark' : ''}}">
                                <i class="fa fa-user-md nav-icon"></i>
                                <p>Bidan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/pegawai')}}"
                                class="nav-link {{ Request::is('admin/pegawai*') ? 'active bg-dark' : ''}}">
                                <i class="fa fa-user-tie nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li
                        class="nav-item has-treeview {{ (Request::is('admin/pasien*') ? 'menu-open' : Request::is('admin/pemeriksaan*')) ? 'menu-open' : '' }}">

                        {{-- <li class="nav-item has-treeview menu-open"> --}}
                        <a href="#"
                            class="nav-link {{ (Request::is('admin/pasien*') ? 'active' : Request::is('admin/pemeriksaan*')) ? 'active' : 'bg-light' }}">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                Data Klinik
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/pasien')}}"
                                    class="nav-link {{ Request::is('admin/pasien*') ? 'active bg-dark' : ''}}">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>Pasien</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/pemeriksaan')}}"
                                    class="nav-link {{ Request::is('admin/pemeriksaan*') ? 'active bg-dark' : ''}}">
                                    <i class="fa fa-book nav-icon"></i>
                                    <p>Rekam Medic</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ Request::is('admin/spesialis*') ? 'menu-open' :  '' }}">

                        {{-- <li class="nav-item has-treeview menu-open"> --}}
                        <a href="#" class="nav-link {{ Request::is('admin/spesialis*') ? 'active' : 'bg-light' }}">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{url('admin/spesialis')}}"--}}
{{--                                    class="nav-link {{ Request::is('admin/spesialis*') ? 'active bg-dark' : ''}}">--}}
{{--                                    <i class="fa fa-star nav-icon"></i>--}}
{{--                                    <p>Poli</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div id="pesan" class="d-none" data-pesan="{{ Session::get('pesan') }}" data-type="{{ Session::get('type') }}">
        </div>

        @yield('content')

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

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