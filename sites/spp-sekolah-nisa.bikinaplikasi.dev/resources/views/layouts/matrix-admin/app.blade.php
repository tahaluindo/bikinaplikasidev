{{-- @php
dd(Route::current()->action['as']);
@endphp --}}

<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <title>Al Qosim Al Islamy</title>
    {{-- faficon bawaan template --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('foto/logo.ico') }}">

    {{-- pakai bootstrap dari template monster-admin (biar sama aj) --}}
    <link href="{{ url('monster-admin-lite/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- datatables --}}
    {{-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link href="{{ url("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">

    {{-- flatpickr (kalender bagus) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">

    {{-- style bawaan template --}}
    <link href="{{ url('matrix-admin') }}/dist/css/style.min.css" rel="stylesheet">

    {{-- khusus autocomplete --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

    {{-- css sendiri --}}
    <link href="{{ url("css/style.css") }}" rel="stylesheet">
</head>

<body>
    <div class="preloader" style="display: none;">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-sidebartype="full" class="">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="{{ url('') }}">
                        <div class="text-center p-t-5 p-b-5">
                            <span class="db"><img src="{{ url($sekolah->logo) }}" alt="logo" width="178" height="40"></span>
                        </div>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                                data-toggle="dropdown" style="margin-bottom: -35px !important;" aria-haspopup="true"
                                aria-expanded="false"><img src="{{ url('matrix-admin') }}/assets/images/users/1.jpg"
                                    alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated"
                                style="top: 50px !important;">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="{{ route('user.edit', ['user' => auth()->user()->id]) }}"><i
                                        class="ti-settings m-r-5 m-l-5"></i> Setting</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ url(route('logout')) }}" method='post' style='display: inline;'
                                    method="post" onsubmit='return confirm("Yakin akan Logout?");'>
                                    @csrf

                                    <button class="dropdown-item" type="submit" style='cursor: pointer'>
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30 in">
                        <li class="sidebar-item"> 
                            <a href="{{ route('home') }}" aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                {{-- <i class="fa fa-home"></i> --}}
                                <img src="{{ url('icon_irma/home.png') }}" alt="" width="24" height="24" style='margin-right: 5px; margin-left: 5px;'>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('sekolah.edit', ['sekolah' => 1]) }}"
                                aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                {{-- <i class="fa fa-table"></i> --}}
                                <img src="{{ url('icon_irma/sekolah.png') }}" alt="" width="24" height="24" style='margin-right: 5px; margin-left: 5px;'>
                                <span class="hide-menu"> Sekolah</span>
                            </a>
                        </li>

                        <li class="sidebar-item"> 
                            <a href="{{ route('kelas.index') }}" aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                {{-- <i class="fa fa-table"></i> --}}
                                <img src="{{ url('icon_irma/kelas.png') }}" alt="" width="24" height="24" style='margin-right: 5px; margin-left: 5px;'>
                                <span class="hide-menu">Kelas</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('user.index') }}" aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                {{-- <i class="fa fa-table"></i> --}}
                                <img src="{{ url('icon_irma/user.png') }}" alt="" width="24" height="24" style='margin-right: 5px; margin-left: 5px;'>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('pembayaran_santri.index') }}" aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                {{-- <i class="fa fa-table"></i> --}}
                                <img src="{{ url('icon_irma/pembayaran_santri.png') }}" alt="" width="24" height="24" style='margin-right: 5px; margin-left: 5px;'>
                                <span class="hide-menu">Pembayaran Santri</span>
                            </a>
                        </li>

                        {{-- <li class="sidebar-item"> <a href="{{ route('pembayaran_infaq.index') }}" aria-expanded="false"
                                class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="fa fa-table"></i><span class="hide-menu">Pembayaran
                                    Infaq</span></a></li> --}}

                        <li class="sidebar-item">
                            <a href="{{ route('transaksi_lainnya.index') }}" aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                {{-- <i class="fa fa-table"></i> --}}
                                <img src="{{ url('icon_irma/transaksi_lainnya.png') }}" alt="" width="24" height="24" style='margin-right: 5px; margin-left: 5px;'>
                                <span class="hide-menu">Transaksi Lainnya</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('laporan.index') }}" aria-expanded="false" class="sidebar-link waves-effect waves-dark sidebar-link">
                                {{-- <i class="fa fa-table"></i> --}}
                                <img src="{{ url('icon_irma/laporan.png') }}" alt="" width="24" height="24" style='margin-right: 5px; margin-left: 5px;'>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        @if(session()->has('error') || session()->has('success') || session()->has('warning'))
        <div class="page-wrapper" id='page-wrapper-alert'>
            <div class="container py-3">
                @if(session()->has("error"))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get("error") }}
                </div>
                @elseif(session()->has("success"))
                <div class="alert alert-success" role="alert">
                    {{ session()->get("success") }}
                </div>
                @elseif(session()->has("warning"))
                <div class="alert alert-warning" role="alert">
                    {{ session()->get("warning") }}
                </div>
                @endif
            </div>
        </div>
        @endif

        @yield('content')
    </div>

    {{-- dari template monster-admin --}}
    <script src="{{ url('monster-admin-lite/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('monster-admin-lite/assets/plugins/bootstrap/js/tether.min.js') }}"></script>
    <script src="{{ url('monster-admin-lite/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- bawaan template matrix-admin --}}
    <script src="{{ url('matrix-admin') }}/dist/js/waves.js"></script>
    <script src="{{ url('matrix-admin') }}/dist/js/sidebarmenu.js"></script>
    <script src="{{ url('matrix-admin') }}/dist/js/custom.min.js"></script>

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
                enableTime: true,
                dateFormat: "Y-m-d",
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
                pageLength: 10,
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

                        @if(in_array(Route::current()->action['as'], ['user.index', 'pembayaran_santri_detail.index', 'pembayaran_infaq.index', 'transaksi_lainnya.index', 'kelas.index', 'transaksi_lainnya_detail.index']))
                        {
                            text: 'Tambah',
                            className: "btn btn-primary btn-sm",
                            action: function (e, dt, node, config) {
                                location.href = locationHrefCreate
                            }
                        },
                        @endif

                        // khusus halaman user (untuk export)
                        @if(in_array(Route::current()->action['as'], ['user.index', 'pembayaran_santri.index', 'pembayaran_infaq.index', 'transaksi_lainnya.index']))
                        {
                            text: "Export",
                            className: "btn btn-primary btn-sm",
                            action: function (e, dt, node, config) {
                                location.href = locationHrefExport
                            }

                        },
                        @endif

                        // khusus halaman user (untuk ubah kelas)
                        @if(in_array(Route::current()->action['as'], ['user.index']))
                        {
                            text: "Ubah Kelas",
                            className: "btn btn-primary btn-sm",
                            action: function (e, dt, node, config) {
                                var kelas = prompt('Ubah ke kelas berapa? ({{ $kelass }})', 0);

                                if(kelas) {
                                    if(confirm('Yakin akan mengubah kelas data yg dipilih?')) {
                                        var ids = JSON.stringify(getIdOfRows($('tr.selected')));

                                        location.href = `${locationHrefUbahKelas}?ids=${ids}&kelas=${kelas}`;
                                    }
                                }
                            }

                        },
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
