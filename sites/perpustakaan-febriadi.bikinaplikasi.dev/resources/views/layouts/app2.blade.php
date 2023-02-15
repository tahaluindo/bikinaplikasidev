<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_OBJECT_NAME') }} | {{ env('APP_OBJECT_LOCATION') }}</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="{{ url('') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Bootstrap Css -->
    <!-- Bars Css -->
    <link rel="stylesheet" href="{{ url('') }}/css/bar.css">
    <!--// Bars Css -->
    <!-- Calender Css -->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/css/pignose.calender.css"/>
    <!--// Calender Css -->
    <!-- Common Css -->
    <link href="{{ url('') }}/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="{{ url('') }}/css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="{{ url('') }}/css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->


    <!-- v4.1.3 -->
{{--    <link rel="stylesheet" href="{{ url('') }}/dist/bootstrap/css/bootstrap.min.css">--}}

<!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('') }}/dist/img/favicon-16x16.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('') }}/dist/css/style.css">
    <link rel="stylesheet" href="{{ url('') }}/dist/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('') }}/dist/css/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="{{ url('') }}/dist/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ url('') }}/dist/css/simple-lineicon/simple-line-icons.css">
    <link rel="stylesheet" href="{{ url('') }}/dist/css/skins/_all-skins.min.css">

    <!-- Chartist CSS -->
    <link rel="stylesheet" href="{{ url('') }}/dist/plugins/chartist-js/chartist.min.css">
    <link rel="stylesheet" href="{{ url('') }}/dist/plugins/chartist-js/chartist-plugin-tooltip.css">


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
    <link href="{{ url("css/style2.css") }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
        .dropdown-menu > li a {
            color: #777;
            padding: 6px 20px;
            display: block;
            font-size: 14px;
        }

        .dropdown-menu > li a:hover {
            background-color: #e1e3e9;
            color: #333;
        }
    </style>

    @php
        if(auth()->user()->level == 'Siswa') {
          $peminjamans_notif = $peminjamans_notif->filter(function($item) {

                return date('Y-m-d', strtotime($item->tanggal_pengembalian)) >= date('Y-m-d');
            });
        }

    @endphp
</head>

<body>
<div class="se-pre-con"></div>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h1>
                <a href="{{ url("") }}" class="text-white">{{ auth()->user()->level }}</a>
            </h1>
            <span>M</span>
        </div>
        <div class="profile-bg"></div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="index.html">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="collapsed">
                    <i class="fas fa-laptop"></i>
                    Menu
                    <i class="fas fa-angle-down fa-pull-right"></i>
                </a>
                <ul class="list-unstyled collapse" id="homeSubmenu">
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

                    @if(in_array(auth()->user()->level, ['Admin', 'Petugas', 'Siswa', 'Guru']))
                        <li class="sidebar-item">
                            <a href="{{ route('buku.index') }}"
                               aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                <i class="fa fa-angle-right"></i>
                                <span class="hide-menu">Buku</span>
                            </a>
                        </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin', 'Petugas', 'Siswa', 'Guru']))
                        <li class="sidebar-item">
                            <a href="{{ route('peminjaman.index') }}"
                               aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                <i class="fa fa-angle-right"></i>
                                <span class="hide-menu">Peminjaman</span>
                            </a>
                        </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin', 'Petugas', 'Siswa', 'Guru']))
                        <li class="sidebar-item">
                            <a href="{{ route('pengembalian.index') }}"
                               aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">

                                <i class="fa fa-angle-right"></i>
                                <span class="hide-menu">Pengembalian</span>
                            </a>
                        </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin', 'Petugas', 'Siswa', 'Guru']))
                        <li class="sidebar-item">
                            <a href="{{ route('kode-buku.index') }}"
                               aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                <i class="fa fa-angle-right"></i>
                                <span class="hide-menu">Kode Buku</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            @if(auth()->user()->level == 'Admin')
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="collapsed">
                        <i class="far fa-file"></i>
                        Laporan
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="list-unstyled collapse" id="pageSubmenu1">
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
                    </ul>
                </li>
            @endif

        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">
        <!-- top-bar -->
        <nav class="navbar navbar-default mb-xl-5 mb-4">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <H3 style="margin-bottom: 0px; display: inline-block; color: black; margin-top: 15px;">{{ env('APP_NAME') }}
                    - {{ env('APP_OBJECT_NAME') }}</H3>

                <!--// Search-from -->
                <ul class="top-icons-agileits-w3layouts float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="far fa-bell"></i>
                            @if(auth()->user()->level == 'Admin')
                                <span class="badge">{{ $notifications->count() }}</span>
                            @elseif(auth()->user()->level == 'Siswa')
                                <span class="badge">{{ $peminjamans_notif->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu top-grid-scroll drop-1">
                            <h3 class="sub-title-w3-agileits">User notsifications</h3>

                            @if($notifications->count())

                                @foreach($peminjamans_notif as $item)
                                    <a href="#" class="dropdown-item mt-3">
                                        <div class="notif-img-agileinfo">
                                            <img src="images/clone.jpg" class="img-fluid" alt="Responsive image">
                                        </div>
                                        <div class="notif-content-wthree">
                                            <p class="paragraph-agileits-w3layouts py-2">
                                            <span
                                                class="text-diff">{{ $item->anggota->nama }}</span> {{ $item->anggota->no_telepon }}
                                                .</p>
                                            <h6>{{ $item->tanggal }}</h6>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                           data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu drop-3">
                            <div class="profile d-flex mr-o">
                                <div class="profile-l align-self-center">
                                    <img src="images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                                </div>
                                <div class="profile-r align-self-center">
                                    <h3 class="sub-title-w3-agileits">{{ auth()->user()->name }}</h3>
                                    <a href="mailto:info@example.com">{{ auth()->user()->email }}</a>
                                </div>
                            </div>


                            <a href="{{ url(route('user.profile', auth()->id())) }}" class="dropdown-item mt-3"
                               style="color: black !important;">
                                <h4>
                                    <i class="far fa-user mr-3"></i>My Profile</h4>
                            </a>


                            <div class="dropdown-divider"></div>

                            <form method="POST" action="{{ route('logout') }}" style="all: initial;">
                                @csrf
                                <a href="#" class="dropdown-item"
                                   onclick="event.preventDefault(); if(confirm('Yakin akan logout?')) this.closest('form').submit(); ">
                                    <i class="fa fa-power-off"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--// top-bar -->
        @yield('content')

        <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
            <p>©{{ date("Y") }} {{ env('APP_OBJECT_NAME') }} . All Rights Reserved</p>
        </div>
    </div>
</div>


<!-- Required common Js -->
<script src="{{ url('') }}/js/jquery-2.2.3.min.js"></script>
<!-- //Required common Js -->

<!-- loading-gif Js -->
<script src="{{ url('') }}/js/modernizr.js"></script>
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
        ;
    });
</script>
<!--// loading-gif Js -->

<!-- Sidebar-nav Js -->
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<!--// Sidebar-nav Js -->

<!-- Graph -->
<script src="{{ url('') }}/js/SimpleChart.js"></script>
<!--// Graph -->
<!-- Bar-chart -->
<script src="{{ url('') }}/js/rumcaJS.js"></script>
<script src="{{ url('') }}/js/example.js"></script>
<!--// Bar-chart -->
<!-- Calender -->
<script src="{{ url('') }}/js/moment.min.js"></script>
<script src="{{ url('') }}/js/pignose.calender.js"></script>
<script>
    //<![CDATA[
    $(function () {
        $('.calender').pignoseCalender({
            select: function (date, obj) {
                obj.calender.parent().next().show().text('You selected ' +
                    (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                    '.');
            }
        });

        $('.multi-select-calender').pignoseCalender({
            multiple: true,
            select: function (date, obj) {
                obj.calender.parent().next().show().text('You selected ' +
                    (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                    '~' +
                    (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                    '.');
            }
        });
    });
    //]]>
</script>
<!--// Calender -->

<!-- profile-widget-dropdown js-->
<script src="{{ url('') }}/js/script.js"></script>
<!--// profile-widget-dropdown js-->

<!-- Count-down -->
<script src="{{ url('') }}/js/simplyCountdown.js"></script>
<link href="{{ url('') }}/css/simplyCountdown.css" rel='stylesheet' type='text/css'/>

@yield('dashboard-script')

<!-- dropdown nav -->
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //dropdown nav -->

<!-- Js for bootstrap working-->
<script src="{{ url('') }}/js/bootstrap.min.js"></script>
<!-- //Js for bootstrap working -->


<!-- jQuery 3 -->
{{--<script src="{{ url("") }}/dist/js/jquery.min.js"></script>--}}
<script src="{{ url("") }}/dist/bootstrap/js/bootstrap.min.js"></script>

<!-- template -->
<script src="{{ url("") }}/dist/js/bizadmin.js"></script>

<!-- Jquery Sparklines -->
<script src="{{ url("") }}/dist/plugins/jquery-sparklines/jquery.sparkline.min.js"></script>
<script src="{{ url("") }}/dist/plugins/jquery-sparklines/sparkline-int.js"></script>

<!-- Chartjs JavaScript -->
<script src="{{ url("") }}/dist/plugins/chartjs/chart.min.js"></script>

<!-- for demo purposes -->
<script src="{{ url("") }}/dist/js/demo.js"></script>
<!--Start of Tawk.to Script-->


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
            dateFormat: "Y-m-d",
            locale: 'en'
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

                        @if(in_array(Route::current()->action['as'], ['kode-buku.index']))
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

</body>

</html>
