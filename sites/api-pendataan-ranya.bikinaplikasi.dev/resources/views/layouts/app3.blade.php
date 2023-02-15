<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>{{ env('APP_NAME') }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ url('') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ url('') }}/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
          media="all">
    <link href="{{ url('') }}/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{ url('') }}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ url('') }}/css/theme.css" rel="stylesheet" media="all">

    {{-- datatables --}}
    {{-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link href="{{ url("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">

    {{-- flatpickr (kalender bagus) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">

    {{-- khusus autocomplete --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

    {{-- css sendiri --}}
    <link href="{{ url("css/style.css") }}" rel="stylesheet">

</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo.png" alt="CoolAdmin"/>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <h2 class="text-center">
                <a href="#">
                    {{ strtoupper(auth()->user()->level) }}
                </a>
            </h2>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="has-sub">
                        <a class="js-arrow" href="{{ url('home') }}">
                            <i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow open" href="#">
                            <i class="fa fa-list"></i>Menu</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                            @if(in_array(auth()->user()->level, ['Admin', '']))
                                <li class="sidebar-item">
                                    <a href="{{ route('user.index') }}"
                                       aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="hide-menu">User</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin', 'Petugas']))
                                <li class="sidebar-item">
                                    <a href="{{ route('anggota.index') }}"
                                       aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="hide-menu">Anggota</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin', 'Petugas']))
                                <li class="sidebar-item">
                                    <a href="{{ route('buku.index') }}"
                                       aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="hide-menu">Buku</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin', 'Petugas']))
                                <li class="sidebar-item">
                                    <a href="{{ route('peminjaman.index') }}"
                                       aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="hide-menu">Peminjaman</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin', 'Petugas']))
                                <li class="sidebar-item">
                                    <a href="{{ route('pengembalian.index') }}"
                                       aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">

                                        <i class="fa fa-angle-right"></i>
                                        <span class="hide-menu">Pengembalian</span>
                                    </a>
                                </li>
                            @endif

                            @if(in_array(auth()->user()->level, ['Admin', 'Petugas']))
                                <li class="sidebar-item">
                                    <a href="{{ route('buku-tamu.index') }}"
                                       aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">

                                        <i class="fa fa-angle-right"></i>
                                        <span class="hide-menu">Buku Tamu                                 </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a class="js-arrow open" href="#">
                            <i class="fa fa-print"></i>Laporan</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
                            <li class="sidebar-item @if(Route::current()->action['as'] == 'anggota.laporan.index') selected @endif">
                                <a href="{{ route('anggota.laporan.index') }}" class="sidebar-link"><i
                                        class="fa fa-angle-right"></i>

                                    <span class="hide-menu"> Anggota </span>
                                </a>
                            </li>

                            <li class="sidebar-item @if(Route::current()->action['as'] == 'buku.laporan.index') selected @endif">
                                <a href="{{ route('buku.laporan.index') }}" class="sidebar-link"><i
                                        class="fa fa-angle-right"></i>

                                    <span class="hide-menu"> Buku </span>
                                </a>
                            </li>

                            <li class="sidebar-item @if(Route::current()->action['as'] == 'peminjaman.laporan.index') selected @endif">
                                <a href="{{ route('peminjaman.laporan.index') }}" class="sidebar-link"><i
                                        class="fa fa-angle-right"></i>

                                    <span class="hide-menu"> Peminjaman </span>
                                </a>
                            </li>

                            <li class="sidebar-item @if(Route::current()->action['as'] == 'pengembalian.laporan.index') selected @endif">
                                <a href="{{ route('pengembalian.laporan.index') }}" class="sidebar-link"><i
                                        class="fa fa-angle-right"></i>

                                    <span class="hide-menu"> Pengembalian </span>
                                </a>
                            </li>

                            <li class="sidebar-item @if(Route::current()->action['as'] == 'buku-tamu.laporan.index') selected @endif">
                                <a href="{{ route('buku-tamu.laporan.index') }}" class="sidebar-link"><i
                                        class="fa fa-angle-right"></i>

                                    <span class="hide-menu"> Buku Tamu </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <H3 style="margin-bottom: 0px; display: inline-block; color: #333; margin-top: 10px;">{{ env('APP_NAME') }}
                            - {{ env('APP_OBJECT_NAME') }}</H3>

                        <div class="header-button">
                            <div class="noti-wrap">
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <span class="quantity">{{ $notifications->count() }}</span>
                                    <div class="notifi-dropdown js-dropdown">

                                        @foreach($notifications as $item)
                                            <a href="{{ route('peminjaman.index') }}?anggota_id={{ $item->anggota->id }}" style="display: block;">
                                                <div class="notifi__item">
                                                    <div class="bg-c2 img-cir img-40">
                                                        <i class="zmdi zmdi-account-box"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>{{ $item->anggota->nama }}</p>
                                                        <span class="date">{{ $item->tanggal }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach

                                        <div class="notifi__footer">
                                            <a href="{{ route('peminjaman.index') }}">Semua Notifikasi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{ url('avatar/png/002-girl.png') }}"
                                             alt="{{ auth()->user()->name }}"/>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="content" style="margin-left: initial;">
                                                <h5 class="name">
                                                    <a href="#">{{ auth()->user()->name }}</a>
                                                </h5>
                                                <span class="email">{{ auth()->user()->email }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{ url(route('user.profile')) }}">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <form method="POST" action="{{ route('logout') }}" style="all: initial;">
                                                @csrf
                                                <a href="#"
                                                   onclick="event.preventDefault(); if(confirm('Yakin akan logut?')) this.closest('form').submit(); ">
                                                    <i class="fa fa-power-off"></i> Logout
                                                </a>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content">
            <div class="section__content section__content--p30">
                @if(session()->has("error"))
                    <div class="alert alert-danger mb-4" role="alert">
                        {{ session()->get("error") }}
                    </div>
                @elseif(session()->has("success"))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session()->get("success") }}
                    </div>
                @elseif(session()->has("warning"))
                    <div class="alert alert-warning mb-4" role="alert">
                        {{ session()->get("warning") }}
                    </div>
                @endif

                @if(request()->segment(1) != 'home')
                    <div class="row" style="margin-top: -15px; margin-bottom: -15px;">
                        <div class="col-xl-12" style="margin: initial;">
                            <div class="card p-2">
                                <div class="card-body--">
                                    <button class='btn btn-md btn-light' onclick='window.history.back();'>
                                        <i class='fa fa-backward'></i>
                                        Back
                                    </button>
                                    <button class='btn btn-md btn-light' onclick='window.location.reload();'>
                                        <i class='fa fa-refresh'></i>
                                        Refresh (F5)
                                    </button>
                                    <button class='btn btn-md btn-light' onclick='window.history.forward();'>
                                        <i class='fa fa-forward'></i>
                                        Next
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 {{ env('APP_NAME') }}. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery JS-->
<script src="{{ url('') }}/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="{{ url('') }}/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="{{ url('') }}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="{{ url('') }}/vendor/slick/slick.min.js">
</script>
<script src="{{ url('') }}/vendor/wow/wow.min.js"></script>
<script src="{{ url('') }}/vendor/animsition/animsition.min.js"></script>
<script src="{{ url('') }}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="{{ url('') }}/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="{{ url('') }}/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="{{ url('') }}/vendor/circle-progress/circle-progress.min.js"></script>
<script src="{{ url('') }}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ url('') }}/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="{{ url('') }}/vendor/select2/select2.min.js">
</script>

{{-- datatable --}}
<script src="{{ url("vendor/datatables/jquery.dataTables.js") }}"></script>
<script src="{{ url("vendor/datatables/dataTables.bootstrap4.js") }}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

{{-- flatpickr --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

{{-- autocomplete --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ url('autocomplete') }}/js/autoComplete.min.js"></script>


{{-- script sendiri, dibuat disini karena kadang perlu fiture bladeny --}}
<script>
    $(document).ready(function () {
        // untuk mengecek apakah disebuah array ada nilainya atau tidak
        function inArray(needle, haystack) {
            var length = haystack.length;
            for (var i = 0; i < length; i++) {
                if (typeof haystack[i] == 'object') {
                    if (arrayCompare(haystack[i], needle)) return true;
                } else {
                    if (haystack[i] == needle) return true;
                }
            }
            return false;
        }

        // flatpickr
        $(".flatpickr").flatpickr({
            enableTime: false,
            dateFormat: "d-M-Y",
            locale: 'id'
        });

        // fungsi untuk mendapatkan semua id tabel yg dipilih untuk hapus semua
        function getIdOfRows(selector) {
            var ids = [];
            for (data of selector) {
                ids.push(data.dataset.id);
            }

            return ids;
        }

        // dibaris ini kita mengatur datatable untuk semua halaman
        // ketika data dihalaman tersebut ditampilkan maka datatabel akan mengatur desain tablenya
        // dari mulai filter, tombol hapus semua, aktifkan, dll..
        // pengaturan ini tidak sama untuk beberapa halaman
        // sehingga kita perlu melakukan if conditional lagi
        // if dibuat karena autocomplete gak bekerja kalo ada datatable
        @if(!in_array(Route::current()-> action['as'], ['pembayaran_santri_detail.create',
            'pembayaran_santri_detail.edit', 'pembayaran_infaq_detail.create',
            'pembayaran_infaq_detail.edit'
        ]))

        $('#dataTable').DataTable({
            paging: true,
            pageLength: 25,
            dom: 'Blfrtip',
            "columnDefs": [{
                "orderable": false,
                "targets": columnOrders
            }],
            buttons: tampilkan_buttons === false ? (button_manual === false ? [] : button_manual) :
                [{
                    extend: 'selectAll',
                    text: 'Pilih Semua',
                    className: "btn btn-primary buttons-select-all btn-sm"
                },
                    {
                        extend: "selectNone",
                        text: 'Batal Pilih',
                        className: "btn btn-primary buttons-select-none  btn-sm"
                    },

                        @if(in_array(Route::current()->action['as'], ['pembayaran_santri_detail.index']) && auth()->user()->level == 'superadmin')
                    {
                        text: 'Hapus',
                        className: "btn btn-primary btn-sm",
                        action: function (e, dt, node, config) {
                            var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                            if (confirm("Yakin akan menghapus semua data yang dipilih?")) {
                                location.href = `${locationHrefHapusSemua}?ids=${ids}`;
                            }
                        }
                    },
                        @elseif(!in_array(Route::current()->action['as'], ['pembayaran_santri_detail.index', 'pembayaran_santri.index']))
                    {
                        text: 'Hapus',
                        className: "btn btn-primary btn-sm",
                        action: function (e, dt, node, config) {
                            var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                            if (confirm("Yakin akan menghapus semua data yang dipilih?")) {
                                location.href = `${locationHrefHapusSemua}?ids=${ids}`;
                            }
                        }
                    },
                        @endif

                        @if(in_array(Route::current()->action['as'], ['pembayaran_santri.index']) && auth()->user()->level == 'superadmin')
                    {
                        text: 'Tambah',
                        className: "btn btn-primary btn-sm",
                        action: function (e, dt, node, config) {
                            location.href = locationHrefCreate
                        }
                    },
                        @endif

                        @if(in_array(Route::current()->action['as'], ['user.index', 'anggota.index', 'buku.index', 'peminjaman.index', 'peminjaman.show']))
                    {
                        text: 'Tambah',
                        className: "btn btn-primary btn-sm",
                        action: function (e, dt, node, config) {
                            location.href = locationHrefCreate
                        }
                    },
                    @endif

                    // khusus halaman user (untuk export)
                    // @if(in_array(Route::current()->action['as'], ['user.index', 'pembayaran_santri.index', 'pembayaran_infaq.index', 'transaksi_lainnya.index']))
                    // {
                    //     text: "Export",
                    //     className: "btn btn-primary btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         location.href = locationHrefExport
                    //     }

                    // },
                    // @endif

                    // khusus halaman user (untuk ubah kelas)
                    @if(in_array(Route::current()->action['as'], ['user.index']))
                    // {
                    //     text: "Ubah Kelas",
                    //     className: "btn btn-primary btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         var kelas = prompt('Ubah ke kelas berapa? ({{ $kelass ?? '' }})', 0);

                    //         if(kelas) {
                    //             if(confirm('Yakin akan mengubah kelas data yg dipilih?')) {
                    //                 var ids = JSON.stringify(getIdOfRows($('tr.selected')));

                    //                 location.href = `${locationHrefUbahKelas}?ids=${ids}&kelas=${kelas}`;
                    //             }
                    //         }
                    //     }

                    // },
                    @endif
                ],
            select: true,
        });
        @endif

        // khusus halaman yang ada autocompletenya
        @if(in_array(Route::current()-> action['as'], ['pembayaran_santri_detail.create',
            'pembayaran_santri_detail.edit', 'pembayaran_infaq_detail.create',
            'pembayaran_infaq_detail.edit'
        ]))

        $('#tags').on('keyup', function () {
            $.ajax({
                url: '{{ route("pembayaran_santri_detail.get_users") }}',
                data: {
                    term: $("#tags").val()
                },
                success: function (response) {

                    var users = [];
                    $.each(response, function (index, el) {
                        users.push(
                            `${el.nama} | Kelas: ${el.kelas.nama} | Id: ${el.id}`
                        );
                    });

                    $("#tags").autocomplete({
                        source: users
                    });
                }
            });
        });

        $("#submit, #cetak_kwitansi").click(function () {
            var id = $("#tags").val().split(" | ")[2].split(" ")[1];

            $('#user_id').val(id);
        });
        @endif
    });

</script>

{{-- script sendiri --}}
<script src="{{ url('js/script.js') }}"></script>

<!-- Main JS-->
<script>

    (function ($) {
        // USE STRICT
        "use strict";

        try {
            //WidgetChart 1
            var ctx = document.getElementById("widgetChart1");
            if (ctx) {
                ctx.height = 130;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        type: 'line',
                        datasets: [{
                            data: [78, 81, 80, 45, 34, 12, 40],
                            label: 'Dataset',
                            backgroundColor: 'rgba(255,255,255,.1)',
                            borderColor: 'rgba(255,255,255,.55)',
                        },]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        layout: {
                            padding: {
                                left: 0,
                                right: 0,
                                top: 0,
                                bottom: 0
                            }
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    color: 'transparent',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: {
                                    fontSize: 2,
                                    fontColor: 'transparent'
                                }
                            }],
                            yAxes: [{
                                display: false,
                                ticks: {
                                    display: false,
                                }
                            }]
                        },
                        title: {
                            display: false,
                        },
                        elements: {
                            line: {
                                borderWidth: 0
                            },
                            point: {
                                radius: 0,
                                hitRadius: 10,
                                hoverRadius: 4
                            }
                        }
                    }
                });
            }


            //WidgetChart 2
            var ctx = document.getElementById("widgetChart2");
            if (ctx) {
                ctx.height = 130;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                        type: 'line',
                        datasets: [{
                            data: [1, 18, 9, 17, 34, 22],
                            label: 'Dataset',
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(255,255,255,.55)',
                        },]
                    },
                    options: {

                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Montserrat',
                            bodyFontFamily: 'Montserrat',
                            cornerRadius: 3,
                            intersect: false,
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    color: 'transparent',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: {
                                    fontSize: 2,
                                    fontColor: 'transparent'
                                }
                            }],
                            yAxes: [{
                                display: false,
                                ticks: {
                                    display: false,
                                }
                            }]
                        },
                        title: {
                            display: false,
                        },
                        elements: {
                            line: {
                                tension: 0.00001,
                                borderWidth: 1
                            },
                            point: {
                                radius: 4,
                                hitRadius: 10,
                                hoverRadius: 4
                            }
                        }
                    }
                });
            }


            //WidgetChart 3
            var ctx = document.getElementById("widgetChart3");
            if (ctx) {
                ctx.height = 130;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                        type: 'line',
                        datasets: [{
                            data: [65, 59, 84, 84, 51, 55],
                            label: 'Dataset',
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(255,255,255,.55)',
                        },]
                    },
                    options: {

                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Montserrat',
                            bodyFontFamily: 'Montserrat',
                            cornerRadius: 3,
                            intersect: false,
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    color: 'transparent',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: {
                                    fontSize: 2,
                                    fontColor: 'transparent'
                                }
                            }],
                            yAxes: [{
                                display: false,
                                ticks: {
                                    display: false,
                                }
                            }]
                        },
                        title: {
                            display: false,
                        },
                        elements: {
                            line: {
                                borderWidth: 1
                            },
                            point: {
                                radius: 4,
                                hitRadius: 10,
                                hoverRadius: 4
                            }
                        }
                    }
                });
            }


            //WidgetChart 4
            var ctx = document.getElementById("widgetChart4");
            if (ctx) {
                ctx.height = 115;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [78, 81, 80, 65, 58, 75, 60, 75, 65, 60, 60, 75],
                                borderColor: "transparent",
                                borderWidth: "0",
                                backgroundColor: "rgba(255,255,255,.3)"
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: false,
                                categoryPercentage: 1,
                                barPercentage: 0.65
                            }],
                            yAxes: [{
                                display: false
                            }]
                        }
                    }
                });
            }

            // Recent Report
            const brandProduct = 'rgba(0,181,233,0.8)'
            const brandService = 'rgba(0,173,95,0.8)'

            var elements = 10
            var data1 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
            var data2 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

            var ctx = document.getElementById("recent-rep-chart");
            if (ctx) {
                ctx.height = 250;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
                        datasets: [
                            {
                                label: 'Pengembalian',
                                backgroundColor: brandService,
                                borderColor: 'transparent',
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data1

                            },
                            {
                                label: 'Peminjaman',
                                backgroundColor: brandProduct,
                                borderColor: 'transparent',
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data2

                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    drawOnChartArea: true,
                                    color: '#f2f2f2'
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    stepSize: 50,
                                    max: 150,
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                },
                                gridLines: {
                                    display: true,
                                    color: '#f2f2f2'

                                }
                            }]
                        },
                        elements: {
                            point: {
                                radius: 0,
                                hitRadius: 10,
                                hoverRadius: 4,
                                hoverBorderWidth: 3
                            }
                        }


                    }
                });
            }

            // Percent Chart

            @if(request()->segment(1) == 'home')
            var ctx = document.getElementById("percent-chart");
            if (ctx) {
                ctx.height = 280;
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [{{ $anggotas->where('jenis_kelamin', 'Laki - Laki')->count() }}, {{ $anggotas->where('jenis_kelamin', 'Perempuan')->count() }}],
                                backgroundColor: [
                                    '#00b5e9',
                                    '#fa4251'
                                ],
                                hoverBackgroundColor: [
                                    '#00b5e9',
                                    '#fa4251'
                                ],
                                borderWidth: [
                                    0, 0
                                ],
                                hoverBorderColor: [
                                    'transparent',
                                    'transparent'
                                ]
                            }
                        ],
                        labels: [
                            'Laki - Laki',
                            'Perempuan'
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        cutoutPercentage: 55,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            titleFontFamily: "Poppins",
                            xPadding: 15,
                            yPadding: 10,
                            caretPadding: 0,
                            bodyFontSize: 16
                        }
                    }
                });
            }
            @endif
        } catch (error) {
            console.log(error);
        }


        try {

            // Recent Report 2
            const bd_brandProduct2 = 'rgba(0,181,233,0.9)'
            const bd_brandService2 = 'rgba(0,173,95,0.9)'
            const brandProduct2 = 'rgba(0,181,233,0.2)'
            const brandService2 = 'rgba(0,173,95,0.2)'

            var data3 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
            var data4 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

            var ctx = document.getElementById("recent-rep2-chart");
            if (ctx) {
                ctx.height = 230;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
                        datasets: [
                            {
                                label: 'Pengembalian',
                                backgroundColor: brandService2,
                                borderColor: bd_brandService2,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data3

                            },
                            {
                                label: 'Peminjaman',
                                backgroundColor: brandProduct2,
                                borderColor: bd_brandProduct2,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data4

                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    drawOnChartArea: true,
                                    color: '#f2f2f2'
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    stepSize: 50,
                                    max: 150,
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                },
                                gridLines: {
                                    display: true,
                                    color: '#f2f2f2'

                                }
                            }]
                        },
                        elements: {
                            point: {
                                radius: 0,
                                hitRadius: 10,
                                hoverRadius: 4,
                                hoverBorderWidth: 3
                            },
                            line: {
                                tension: 0
                            }
                        }


                    }
                });
            }

        } catch (error) {
            console.log(error);
        }


        try {

            // Recent Report 3
            const bd_brandProduct3 = 'rgba(0,181,233,0.9)';
            const bd_brandService3 = 'rgba(0,173,95,0.9)';
            const brandProduct3 = 'transparent';
            const brandService3 = 'transparent';

            var data5 = [52, 60, 55, 50, 65, 80, 57, 115];
            var data6 = [102, 70, 80, 100, 56, 53, 80, 90];

            var ctx = document.getElementById("recent-rep3-chart");
            if (ctx) {
                ctx.height = 230;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', ''],
                        datasets: [
                            {
                                label: 'Pengembalian',
                                backgroundColor: brandService3,
                                borderColor: bd_brandService3,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data5,
                                pointBackgroundColor: bd_brandService3
                            },
                            {
                                label: 'Peminjaman',
                                backgroundColor: brandProduct3,
                                borderColor: bd_brandProduct3,
                                pointHoverBackgroundColor: '#fff',
                                borderWidth: 0,
                                data: data6,
                                pointBackgroundColor: bd_brandProduct3

                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    drawOnChartArea: true,
                                    color: '#f2f2f2'
                                },
                                ticks: {
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    stepSize: 50,
                                    max: 150,
                                    fontFamily: "Poppins",
                                    fontSize: 12
                                },
                                gridLines: {
                                    display: false,
                                    color: '#f2f2f2'
                                }
                            }]
                        },
                        elements: {
                            point: {
                                radius: 3,
                                hoverRadius: 4,
                                hoverBorderWidth: 3,
                                backgroundColor: '#333'
                            }
                        }


                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        try {
            //WidgetChart 5
            var ctx = document.getElementById("widgetChart5");
            if (ctx) {
                ctx.height = 220;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [78, 81, 80, 64, 65, 80, 70, 75, 67, 85, 66, 68],
                                borderColor: "transparent",
                                borderWidth: "0",
                                backgroundColor: "#ccc",
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: false,
                                categoryPercentage: 1,
                                barPercentage: 0.65
                            }],
                            yAxes: [{
                                display: false
                            }]
                        }
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        try {

            // Percent Chart 2
            var ctx = document.getElementById("percent-chart2");
            if (ctx) {
                ctx.height = 209;
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [60, 40],
                                backgroundColor: [
                                    '#00b5e9',
                                    '#fa4251'
                                ],
                                hoverBackgroundColor: [
                                    '#00b5e9',
                                    '#fa4251'
                                ],
                                borderWidth: [
                                    0, 0
                                ],
                                hoverBorderColor: [
                                    'transparent',
                                    'transparent'
                                ]
                            }
                        ],
                        labels: [
                            'Products',
                            'Services'
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        cutoutPercentage: 87,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                        legend: {
                            display: false,
                            position: 'bottom',
                            labels: {
                                fontSize: 14,
                                fontFamily: "Poppins,sans-serif"
                            }

                        },
                        tooltips: {
                            titleFontFamily: "Poppins",
                            xPadding: 15,
                            yPadding: 10,
                            caretPadding: 0,
                            bodyFontSize: 16,
                        }
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        try {
            //Sales chart
            var ctx = document.getElementById("sales-chart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
                        type: 'line',
                        defaultFontFamily: 'Poppins',
                        datasets: [{
                            label: "Foods",
                            data: [0, 30, 10, 120, 50, 63, 10],
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(220,53,69,0.75)',
                            borderWidth: 3,
                            pointStyle: 'circle',
                            pointRadius: 5,
                            pointBorderColor: 'transparent',
                            pointBackgroundColor: 'rgba(220,53,69,0.75)',
                        }, {
                            label: "Electronics",
                            data: [0, 50, 40, 80, 40, 79, 120],
                            backgroundColor: 'transparent',
                            borderColor: 'rgba(40,167,69,0.75)',
                            borderWidth: 3,
                            pointStyle: 'circle',
                            pointRadius: 5,
                            pointBorderColor: 'transparent',
                            pointBackgroundColor: 'rgba(40,167,69,0.75)',
                        }]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Poppins',
                            bodyFontFamily: 'Poppins',
                            cornerRadius: 3,
                            intersect: false,
                        },
                        legend: {
                            display: false,
                            labels: {
                                usePointStyle: true,
                                fontFamily: 'Poppins',
                            },
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Month'
                                },
                                ticks: {
                                    fontFamily: "Poppins"
                                }
                            }],
                            yAxes: [{
                                display: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Value',
                                    fontFamily: "Poppins"

                                },
                                ticks: {
                                    fontFamily: "Poppins"
                                }
                            }]
                        },
                        title: {
                            display: false,
                            text: 'Normal Legend'
                        }
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }

        try {

            //Team chart
            var ctx = document.getElementById("team-chart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
                        type: 'line',
                        defaultFontFamily: 'Poppins',
                        datasets: [{
                            data: [0, 7, 3, 5, 2, 10, 7],
                            label: "Expense",
                            backgroundColor: 'rgba(0,103,255,.15)',
                            borderColor: 'rgba(0,103,255,0.5)',
                            borderWidth: 3.5,
                            pointStyle: 'circle',
                            pointRadius: 5,
                            pointBorderColor: 'transparent',
                            pointBackgroundColor: 'rgba(0,103,255,0.5)',
                        },]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Poppins',
                            bodyFontFamily: 'Poppins',
                            cornerRadius: 3,
                            intersect: false,
                        },
                        legend: {
                            display: false,
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                fontFamily: 'Poppins',
                            },


                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Month'
                                },
                                ticks: {
                                    fontFamily: "Poppins"
                                }
                            }],
                            yAxes: [{
                                display: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Value',
                                    fontFamily: "Poppins"
                                },
                                ticks: {
                                    fontFamily: "Poppins"
                                }
                            }]
                        },
                        title: {
                            display: false,
                        }
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }

        try {
            //bar chart
            var ctx = document.getElementById("barChart");
            if (ctx) {
                ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    defaultFontFamily: 'Poppins',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July"],
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [65, 59, 80, 81, 56, 55, 40],
                                borderColor: "rgba(0, 123, 255, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 123, 255, 0.5)",
                                fontFamily: "Poppins"
                            },
                            {
                                label: "Peminjaman",
                                data: [28, 48, 40, 19, 86, 27, 90],
                                borderColor: "rgba(0,0,0,0.09)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0,0,0,0.07)",
                                fontFamily: "Poppins"
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontFamily: "Poppins"

                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins"
                                }
                            }]
                        }
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }

        try {

            //radar chart
            var ctx = document.getElementById("radarChart");
            if (ctx) {
                ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
                        defaultFontFamily: 'Poppins',
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [65, 59, 66, 45, 56, 55, 40],
                                borderColor: "rgba(0, 123, 255, 0.6)",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 123, 255, 0.4)"
                            },
                            {
                                label: "Peminjaman",
                                data: [28, 12, 40, 19, 63, 27, 87],
                                borderColor: "rgba(0, 123, 255, 0.7",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        scale: {
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }
                    }
                });
            }

        } catch (error) {
            console.log(error)
        }

        try {

            //line chart
            var ctx = document.getElementById("lineChart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July"],
                        defaultFontFamily: "Poppins",
                        datasets: [
                            {
                                label: "Pengembalian",
                                borderColor: "rgba(0,0,0,.09)",
                                borderWidth: "1",
                                backgroundColor: "rgba(0,0,0,.07)",
                                data: [22, 44, 67, 43, 76, 45, 12]
                            },
                            {
                                label: "Peminjaman",
                                borderColor: "rgba(0, 123, 255, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 123, 255, 0.5)",
                                pointHighlightStroke: "rgba(26,179,148,1)",
                                data: [16, 32, 18, 26, 42, 33, 44]
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontFamily: "Poppins"

                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins"
                                }
                            }]
                        }

                    }
                });
            }


        } catch (error) {
            console.log(error);
        }


        try {

            //doughut chart
            var ctx = document.getElementById("doughutChart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [45, 25, 20, 10],
                            backgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ]

                        }],
                        labels: [
                            "Green",
                            "Green",
                            "Green",
                            "Green"
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        responsive: true
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }


        try {

            //pie chart
            var ctx = document.getElementById("pieChart");
            if (ctx) {
                ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [45, 25, 20, 10],
                            backgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ]

                        }],
                        labels: [
                            "Green",
                            "Green",
                            "Green"
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        responsive: true
                    }
                });
            }


        } catch (error) {
            console.log(error);
        }

        try {

            // polar chart
            var ctx = document.getElementById("polarChart");
            if (ctx) {
                ctx.height = 200;
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        datasets: [{
                            data: [15, 18, 9, 6, 19],
                            backgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.8)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0,0,0,0.2)",
                                "rgba(0, 123, 255,0.5)"
                            ]

                        }],
                        labels: [
                            "Green",
                            "Green",
                            "Green",
                            "Green"
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        responsive: true
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        try {

            // single bar chart
            var ctx = document.getElementById("singelBarChart");
            if (ctx) {
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
                        datasets: [
                            {
                                label: "Pengembalian",
                                data: [40, 55, 75, 81, 56, 55, 40],
                                borderColor: "rgba(0, 123, 255, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontFamily: 'Poppins'
                            }

                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontFamily: "Poppins"

                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins"
                                }
                            }]
                        }
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

    })(jQuery);


    (function ($) {
        // USE STRICT
        "use strict";
        $(".animsition").animsition({
            inClass: 'fade-in',
            outClass: 'fade-out',
            inDuration: 900,
            outDuration: 900,
            linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([class^="chosen-single"])',
            loading: true,
            loadingParentElement: 'html',
            loadingClass: 'page-loader',
            loadingInner: '<div class="page-loader__spin"></div>',
            timeout: false,
            timeoutCountdown: 5000,
            onLoadEvent: true,
            browser: ['animation-duration', '-webkit-animation-duration'],
            overlay: false,
            overlayClass: 'animsition-overlay-slide',
            overlayParentElement: 'html',
            transition: function (url) {
                window.location.href = url;
            }
        });


    })(jQuery);
    (function ($) {
        // USE STRICT
        "use strict";

        // Map
        try {

            var vmap = $('#vmap');
            if (vmap[0]) {
                vmap.vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#1de9b6',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1de9b6', '#03a9f5'],
                    normalizeFunction: 'polynomial'
                });
            }

        } catch (error) {
            console.log(error);
        }

        // Europe Map
        try {

            var vmap1 = $('#vmap1');
            if (vmap1[0]) {
                vmap1.vectorMap({
                    map: 'europe_en',
                    color: '#007BFF',
                    borderColor: '#fff',
                    backgroundColor: '#fff',
                    enableZoom: true,
                    showTooltip: true
                });
            }

        } catch (error) {
            console.log(error);
        }

        // USA Map
        try {

            var vmap2 = $('#vmap2');

            if (vmap2[0]) {
                vmap2.vectorMap({
                    map: 'usa_en',
                    color: '#007BFF',
                    borderColor: '#fff',
                    backgroundColor: '#fff',
                    enableZoom: true,
                    showTooltip: true,
                    selectedColor: null,
                    hoverColor: null,
                    colors: {
                        mo: '#001BFF',
                        fl: '#001BFF',
                        or: '#001BFF'
                    },
                    onRegionClick: function (event, code, region) {
                        event.preventDefault();
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        // Germany Map
        try {

            var vmap3 = $('#vmap3');
            if (vmap3[0]) {
                vmap3.vectorMap({
                    map: 'germany_en',
                    color: '#007BFF',
                    borderColor: '#fff',
                    backgroundColor: '#fff',
                    onRegionClick: function (element, code, region) {
                        var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();

                        alert(message);
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }

        // France Map
        try {

            var vmap4 = $('#vmap4');
            if (vmap4[0]) {
                vmap4.vectorMap({
                    map: 'france_fr',
                    color: '#007BFF',
                    borderColor: '#fff',
                    backgroundColor: '#fff',
                    enableZoom: true,
                    showTooltip: true
                });
            }

        } catch (error) {
            console.log(error);
        }

        // Russia Map
        try {
            var vmap5 = $('#vmap5');
            if (vmap5[0]) {
                vmap5.vectorMap({
                    map: 'russia_en',
                    color: '#007BFF',
                    borderColor: '#fff',
                    backgroundColor: '#fff',
                    hoverOpacity: 0.7,
                    selectedColor: '#999999',
                    enableZoom: true,
                    showTooltip: true,
                    scaleColors: ['#C8EEFF', '#006491'],
                    normalizeFunction: 'polynomial'
                });
            }


        } catch (error) {
            console.log(error);
        }

        // Brazil Map
        try {

            var vmap6 = $('#vmap6');
            if (vmap6[0]) {
                vmap6.vectorMap({
                    map: 'brazil_br',
                    color: '#007BFF',
                    borderColor: '#fff',
                    backgroundColor: '#fff',
                    onRegionClick: function (element, code, region) {
                        var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
                        alert(message);
                    }
                });
            }

        } catch (error) {
            console.log(error);
        }
    })(jQuery);
    (function ($) {
        // Use Strict
        "use strict";
        try {
            var progressbarSimple = $('.js-progressbar-simple');
            progressbarSimple.each(function () {
                var that = $(this);
                var executed = false;
                $(window).on('load', function () {

                    that.waypoint(function () {
                        if (!executed) {
                            executed = true;
                            /*progress bar*/
                            that.progressbar({
                                update: function (current_percentage, $this) {
                                    $this.find('.js-value').html(current_percentage + '%');
                                }
                            });
                        }
                    }, {
                        offset: 'bottom-in-view'
                    });

                });
            });
        } catch (err) {
            console.log(err);
        }
    })(jQuery);
    (function ($) {
        // USE STRICT
        "use strict";

        // Scroll Bar
        try {
            var jscr1 = $('.js-scrollbar1');
            if (jscr1[0]) {
                const ps1 = new PerfectScrollbar('.js-scrollbar1');
            }

            var jscr2 = $('.js-scrollbar2');
            if (jscr2[0]) {
                const ps2 = new PerfectScrollbar('.js-scrollbar2');

            }

        } catch (error) {
            console.log(error);
        }

    })(jQuery);
    (function ($) {
        // USE STRICT
        "use strict";

        // Select 2
        try {

            $(".js-select2").each(function () {
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            });

        } catch (error) {
            console.log(error);
        }


    })(jQuery);
    (function ($) {
        // USE STRICT
        "use strict";

        // Dropdown
        try {
            var menu = $('.js-item-menu');
            var sub_menu_is_showed = -1;

            for (var i = 0; i < menu.length; i++) {
                $(menu[i]).on('click', function (e) {
                    e.preventDefault();
                    $('.js-right-sidebar').removeClass("show-sidebar");
                    if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
                        $(this).toggleClass('show-dropdown');
                        sub_menu_is_showed = -1;
                    } else {
                        for (var i = 0; i < menu.length; i++) {
                            $(menu[i]).removeClass("show-dropdown");
                        }
                        $(this).toggleClass('show-dropdown');
                        sub_menu_is_showed = jQuery.inArray(this, menu);
                    }
                });
            }
            $(".js-item-menu, .js-dropdown").click(function (event) {
                event.stopPropagation();
            });

            $("body,html").on("click", function () {
                for (var i = 0; i < menu.length; i++) {
                    menu[i].classList.remove("show-dropdown");
                }
                sub_menu_is_showed = -1;
            });

        } catch (error) {
            console.log(error);
        }

        var wW = $(window).width();
        // Right Sidebar
        var right_sidebar = $('.js-right-sidebar');
        var sidebar_btn = $('.js-sidebar-btn');

        sidebar_btn.on('click', function (e) {
            e.preventDefault();
            for (var i = 0; i < menu.length; i++) {
                menu[i].classList.remove("show-dropdown");
            }
            sub_menu_is_showed = -1;
            right_sidebar.toggleClass("show-sidebar");
        });

        $(".js-right-sidebar, .js-sidebar-btn").click(function (event) {
            event.stopPropagation();
        });

        $("body,html").on("click", function () {
            right_sidebar.removeClass("show-sidebar");

        });


        // Sublist Sidebar
        try {
            var arrow = $('.js-arrow');
            arrow.each(function () {
                var that = $(this);
                that.on('click', function (e) {
                    e.preventDefault();
                    that.find(".arrow").toggleClass("up");
                    that.toggleClass("open");
                    that.parent().find('.js-sub-list').slideToggle("250");
                });
            });

        } catch (error) {
            console.log(error);
        }


        try {
            // Hamburger Menu
            $('.hamburger').on('click', function () {
                $(this).toggleClass('is-active');
                $('.navbar-mobile').slideToggle('500');
            });
            $('.navbar-mobile__list li.has-dropdown > a').on('click', function () {
                var dropdown = $(this).siblings('ul.navbar-mobile__dropdown');
                $(this).toggleClass('active');
                $(dropdown).slideToggle('500');
                return false;
            });
        } catch (error) {
            console.log(error);
        }
    })(jQuery);
    (function ($) {
        // USE STRICT
        "use strict";

        // Load more
        try {
            var list_load = $('.js-list-load');
            if (list_load[0]) {
                list_load.each(function () {
                    var that = $(this);
                    that.find('.js-load-item').hide();
                    var load_btn = that.find('.js-load-btn');
                    load_btn.on('click', function (e) {
                        $(this).text("Loading...").delay(1500).queue(function (next) {
                            $(this).hide();
                            that.find(".js-load-item").fadeToggle("slow", 'swing');
                        });
                        e.preventDefault();
                    });
                })

            }
        } catch (error) {
            console.log(error);
        }

    })(jQuery);
    (function ($) {
        // USE STRICT
        "use strict";

        try {

            $('[data-toggle="tooltip"]').tooltip();

        } catch (error) {
            console.log(error);
        }

        // Chatbox
        try {
            var inbox_wrap = $('.js-inbox');
            var message = $('.au-message__item');
            message.each(function () {
                var that = $(this);

                that.on('click', function () {
                    $(this).parent().parent().parent().toggleClass('show-chat-box');
                });
            });

        } catch (error) {
            console.log(error);
        }

    })(jQuery);
</script>


</body>

</html>
<!-- end document-->
