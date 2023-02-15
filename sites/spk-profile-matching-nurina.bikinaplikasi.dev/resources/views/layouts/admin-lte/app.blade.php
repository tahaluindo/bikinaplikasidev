<html style="min-height: 248px;">

<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <link href="{{ url('admin-lte\css\bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/ionicons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/AdminLTE.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte\less\forms.less') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="pace-done skin-blue" style="min-height: 248px;">
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="width: 100%;" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <header class="header">
        <a href="{{ url('home') }}" class="logo">
            {{-- AdminLTE --}}
            {{-- @if(auth()->user()->level ==) --}}
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-left">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="{{ url('home') }}" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ url('foto/logo.png') }}" class='logo-gambar'>
                            <h3 style="margin:-5px 0 0; display: inline;">SPK Pemberian Beasiswa MTS Negeri 4 Kota Jambi</h3>
                        </a>

                    </li>
                </ul>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Account <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="{{ url(auth()->user()->foto) }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ auth()->user()->nama }}
                                    <small>{{ auth()->user()->email }}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    @if(auth()->user()->level == "Admin")
                                    <a href="{{ route('user.edit', ['user' => auth()->user()->id]) }}"
                                        class="btn btn-default btn-flat">Profile</a>
                                    @else
                                    <a href="{{ route('user.show', ['user' => auth()->user()->id]) }}"
                                        class="btn btn-default btn-flat">Profile</a>
                                    @endif
                                </div>
                                <div class="pull-right">
                                    <form action="{{ url(route('logout')) }}" method='post' style='display: inline;'
                                        method="post" onsubmit='return confirm("Yakin akan Sign out?");'>
                                        @csrf
                                        <button class="btn btn-default btn-flat" type="submit">Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 248px;">
        <aside class="left-side sidebar-offcanvas" style="min-height: 248px;">
            <section class="sidebar" style="padding-top: 51px;">
                <ul class="sidebar-menu">
                    @if(in_array(auth()->user()->level, ['Admin']))
                    <li>
                        <a href="{{ url('home') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin']))
                    <li class="">
                        <a href="{{ url('kelas') }}">
                            <i class="fa fa-table"></i> <span>Kelas</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin']))
                    <li class="">
                        <a href="{{ url('aspek') }}">
                            <i class="fa fa-table"></i> <span>Aspek</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin']))
                    <li class="">
                        <a href="{{ url('bobot') }}">
                            <i class="fa fa-table"></i> <span>Bobot</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin']))
                    <li class="">
                        <a href="{{ url('kriteria') }}">
                            <i class="fa fa-table"></i> <span>Kriteria</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Admin', 'Siswa']))
                    <li class="">
                        @if(auth()->user()->level == "Admin")
                        <a href="{{ url('project') }}">
                            <i class="fa fa-table"></i> <span>Data Penerima Beasiswa</span>
                        </a>
                        @else
                        <a href="{{ route('user.show', auth()->user()->id) }}">
                            <i class="fa fa-table"></i> <span>Data Diri Siswa</span>
                        </a>
                        @endif
                    </li>
                    @endif

                    @if(in_array(auth()->user()->level, ['Siswa']))
                    <li class="">
                        <a href="{{ url('project') }}">
                            <i class="fa fa-table"></i> <span>Data Penerima Beasiswa</span>
                            {{-- <i class="fa fa-table"></i> <span>Project</span> --}}
                        </a>
                    </li>
                    @endif
                </ul>
            </section>
        </aside>

        <aside class="right-side">
            <section class="content-header">
                <h1>
                    @yield('page')
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">@yield('page')</li>
                </ol>
            </section>

            <section class="content">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
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
                </div>

                @yield('content')
            </section>
        </aside>
    </div>

    <!-- jQuery JS 3.1.0 -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="{{ url('admin-lte/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin-lte/js/adminlte/app.js') }}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{ url("vendor/datatables/dataTables.bootstrap3.js") }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    {{-- untuk sendiri --}}
    <script>
        $(document).ready(function () {
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

            function getIdOfRows(selector) {
                var ids = [];
                $.each(selector, function(index, selector_data){
                    ids.push(selector_data.dataset.id);
                    console.log(selector_data);
                })

                return ids;
            }

            // dibaris ini kita mengatur datatable untuk semua halaman
            // ketika data dihalaman tersebut ditampilkan maka datatabel akan mengatur desain tablenya
            // dari mulai filter, tombol hapus semua, aktifkan, dll..
            // pengaturan ini tidak sama untuk beberapa halaman
            // sehingga kita perlu melakukan if conditional lagi
            $('#dataTable').DataTable({
                "autoWidth": false,
                paging: true,
                pageLength: 10,
                dom: 'Blfrtip',
                "columnDefs": [{
                    "orderable": false,
                    "targets": columnOrders
                }],
                buttons: tampilkan_buttons === false ? (button_manual === false ? [] : button_manual) :
                    [
                        @if(in_array(auth()->user()->level, ['Admin']))
                        {
                            extend: 'selectAll',
                            text: 'Pilih Semua',
                            className: "btn btn-success buttons-select-all btn-sm"
                        },
                        {
                            extend: "selectNone",
                            text: 'Batal Pilih',
                            className: "btn btn-success buttons-select-none  btn-sm"
                        },
                        {
                            text: 'Hapus',
                            className: "btn btn-success btn-sm",
                            action: function (e, dt, node, config) {
                                var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                                if (confirm("Yakin akan menghapus semua data yang dipilih?")) {
                                    location.href = `${locationHrefHapusSemua}?ids=${ids}`;
                                }
                            }
                        },
                        @endif

                        // jangan tampilkan tombol tambah di alternatif index
                        @if(Route::current()->action['as'] == 'alternatif.index' && in_array(auth()->user()->level, ['Admin']))
                        {
                            text: 'Tambah',
                            className: "btn btn-success btn-sm",
                            action: function (e, dt, node, config) {
                                location.href = locationHrefCreate
                            }
                        },
                        @elseif(Route::current()->action['as'] != 'alternatif.index')
                        {
                            text: 'Tambah',
                            className: "btn btn-success btn-sm",
                            action: function (e, dt, node, config) {
                                location.href = locationHrefCreate
                            }
                        },
                        @endif

                        // khusus halaman alternatif
                        @if(Route::current()->action['as'] == 'alternatif.index')
                        {
                            text: 'Lihat Perangkingan',
                            className: "btn btn-success btn-sm",
                            action: function (e, dt, node, config) {
                                location.href = alternatifShow;
                            }
                        }
                        @endif

                    ],
                select: true,
            });
        });

    </script>
    <script src="{{ url("js/script.js") }}"></script>
</body>

</html>
