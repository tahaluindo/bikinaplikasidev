<html style="min-height: 248px;">

<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_OBJECT_NAME') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('monster-admin-lite/assets/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link href="{{ url("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

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
        <strong>{{ Str::upper(auth()->user()->level) }}</strong>
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
                        <h3 style="margin:-5px 0 0; display: inline; ">{{ env('APP_OBJECT_NAME') }}</h3>
                    </a>

                </li>
            </ul>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>Akun <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{{ url(auth()->user()->foto ?? "") }}" class="img-circle" alt="User Image">
                            <p>
                                {{ auth()->user()->nama }}
                                <small>{{ auth()->user()->email }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                @if(auth()->user()->level == "Tu")
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
                <li>
                    <a href="{{ url('home') }}" class="waves-effect"><i class="fa fa-clock-o m-r-10"
                                                                        aria-hidden="true"></i>Dashboard</a>
                </li>
                {{-- @if(in_array(auth()->user()->level, ['tu', 'guru', 'siswa']))
                <li>
                    <a href="{{ url(route('user.show', ['user' => auth()->user()->id])) }}"
                        class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profile</a>
                </li>
                @endif --}}

                @if(in_array(auth()->user()->level, ['tu']))
                    <li>
                        <a href="{{ url('user') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                            aria-hidden="true"></i>Akun</a>
                    </li>
                @endif

                @if(in_array(auth()->user()->level, ['tu']))
                    <li>
                        <a href="{{ url('sekolah') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                               aria-hidden="true"></i>Sekolah</a>
                    </li>
                @endif

                @if(in_array(auth()->user()->level, ['tu', 'guru']))
                    <li>
                        <a href="{{ url('informasi') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                                 aria-hidden="true"></i>Informasi</a>
                    </li>
                @endif

                @if(in_array(auth()->user()->level, ['tu', '', '', 'wakakurikulum']))
                    <li>
                        <a href="{{ url('mapel') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                             aria-hidden="true"></i>Mapel</a>
                    </li>
                @endif

                @if(in_array(auth()->user()->level, ['tu', '']))
                    <li>
                        <a href="{{ url('kelas') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                             aria-hidden="true"></i>Kelas</a>
                    </li>
                @endif

                {{-- @if(in_array(auth()->user()->level, ['', 'guru']))
                <li>
                    <a href="{{ url('soal_essay') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                            aria-hidden="true"></i>Soal Essay</a>
                </li>
                @endif

                @if(in_array(auth()->user()->level, ['', 'guru']))
                <li>
                    <a href="{{ url('soal_pilgan') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                            aria-hidden="true"></i>Soal Pilgan</a>
                </li>
                @endif

                @if(in_array(auth()->user()->level, ['', 'guru', 'siswa']))
                <li>
                    <a href="{{ url('materi') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                            aria-hidden="true"></i>Materi</a>
                </li>
                @endif

                @if(in_array(auth()->user()->level, ['', 'guru', 'siswa']))
                <li>
                    <a href="{{ url('test') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                            aria-hidden="true"></i>Kuis</a>
                </li>
                @endif

                @if(in_array(auth()->user()->level, ['', 'guru', 'siswa']))
                <li>
                    <a href="{{ url('test_detail') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                            aria-hidden="true"></i>Kuis Detail</a>
                </li>
                @endif

                @if(in_array(auth()->user()->level, ['', 'guru', 'siswa']))
                <li>
                    <a href="{{ url('tugas') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                            aria-hidden="true"></i>Tugas</a>
                </li>
                @endif

                @if(in_array(auth()->user()->level, ['', 'guru', '']))
                <li>
                    <a href="{{ url('perekapan') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                            aria-hidden="true"></i>Perekapan</a>
                </li>
                @endif --}}

                @if(in_array(auth()->user()->level, ['tu', 'guru']))
                    <li>
                        <a href="{{ url('absensi') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                               aria-hidden="true"></i>Absensi</a>
                    </li>
                @endif

                @if(in_array(auth()->user()->level, ['tu', 'guru', 'siswa', 'wakakurikulum']))
                    <li>
                        <a href="{{ url('jadwal') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                              aria-hidden="true"></i>Jadwal</a>
                    </li>
                @endif

                @if(in_array(auth()->user()->level, ['guru', 'siswa']))
                    <li>
                        <a href="{{ url('nilai') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                             aria-hidden="true"></i>Nilai</a>
                    </li>
                @endif

                @if((in_array(auth()->user()->level, ['guru']) && \App\Kelas::where('wali_kelas', auth()->user()->id)->count()) || in_array(auth()->user()->level, ['siswa']))
                    <li>
                        <a href="{{ route('raport.pilih_semester') }}" class="waves-effect"><i
                                class="fa fa-table m-r-10"
                                aria-hidden="true"></i>Raport</a>
                    </li>
                @endif

                @if(in_array(auth()->user()->level, ['tu', 'kepala sekolah']))
                    <li>
                        <a href="{{ url('laporan') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                                                               aria-hidden="true"></i>Laporan</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> --}}
<script src="{{ url('admin-lte/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('admin-lte/js/adminlte/app.js') }}" type="text/javascript"></script>

{{-- datatable --}}
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="{{ url("vendor/datatables/dataTables.bootstrap3.js") }}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

{{-- ckeditor --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script> --}}
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

{{-- flatpickr --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

{{-- untuk sendiri --}}
@if(\request()->getRequestUri() != "/laporan")
    <script>
        $(document).ready(function () {
            // mengatur class mini sidebar untuk layar dibawah 768px
            setTimeout(() => {
                if (screen.width >= 500 && screen.width <= 768) {

                    $('body').addClass('mini-sidebar');
                }
            }, 100);

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

            var selector_soal_ids = [];
            $('.mapel_detail_ids, .mode, .jenis_soal').change(function () {
                // hilangkan mapel yang tidak terkait
                $(`#modal-test-mode ul`).hide();

                $.each($(".mapel_detail_ids:checked"), (index, mapel_detail_id) => {
                    const selector_soal =
                        `#modal-test-mode ul[data-mapel-detail-id='${mapel_detail_id.value}'][data-jenis='${$(".jenis_soal").val()}'][data-mode='${$(".mode").val()}']`;
                    selector_soal_ids.push(selector_soal + " input[type='checkbox']");

                    $(selector_soal).show();
                });
            });

            $('#mode').change(function (e) {
                if (inArray($(this).val(), ['Pilgan Normal', 'Essay Normal'])) {

                    $('#modal-test-mode').modal();
                }
            });

            $('#form-test').submit(function (e) {
                // e.preventDefault()

                if (!inArray($('#soal_ids').val(), ['', '[]'])) {
                    return;
                }

                var selector_soal_id_checkeds = [];
                $.each(selector_soal_ids, function (index, selector_soal_id) {
                    $(`${selector_soal_id}:checked`).map(function () {
                        selector_soal_id_checkeds.push($(this).val());
                    });
                })

                $('#soal_ids').val(JSON.stringify(selector_soal_id_checkeds));
            })

            // flatpickr
            $(".flatpickr").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                locale: 'id'
            });

            // baris kode ini untuk menambahkan kelas dan juga guru ketika tombol tambah diklik (di maple create)
            $('#mapelBtnAdd').click(function () {
                const mapelFormKelasGuru = $('#mapelFormKelasGuru')
                const mapleFormKelasGuruAdd = $('#mapelFormKelasGuruAdd');

                mapelFormKelasGuru.append(mapleFormKelasGuruAdd.html());
            })

            // ini harus dibuat supaya ck editor bisa upload gambar
            CKEDITOR.config.filebrowserUploadMethod = 'form';

            // ini adalah inisialisasi setiap ck editor, dari id 0 sampai 3, jadi kalo perlu ckeditornya
            // kita tinggal pasang aja id yang tersedia dibawah ini, dan ck editor pun langsung tampil
            CKEDITOR.replace('editor-0', {
                height: 200,
                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
            });
            CKEDITOR.replace('editor-1', {
                height: 200,
                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
            });
            CKEDITOR.replace('editor-2', {
                height: 200,
                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
            });
            CKEDITOR.replace('editor-3', {
                height: 200,
                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
            });
            CKEDITOR.replace('editor-4', {
                height: 200,
                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
            });

            function getIdOfRows(selector) {
                var ids = [];
                for (data of selector) {
                    ids.push(data.dataset.id);
                }

                return ids;
            }

            // ini adalah baris kode untuk mengatur penambahan soal essay
            // jadi ketika button tambah diklik maka baris ini akan menambahkan bobot dan textbox soal
            var number = $(`form .btnHapusEditor`).length - 1;
            $('#listSoalEssayBtnAdd').on('click', function () {
                number++;

                $("#listSoalEssay").append($('#listSoalEssayToAdd').html())

                $('form #hapusEditor-x').attr('data-hapus', `hapusEditor_${number}`);
                $('form #hapusEditor-x').attr('id', '')
                $(`form .btnHapusEditor`).last().attr('data-target',
                    `[data-hapus='hapusEditor_${number}'`);
                $(`form .btnHapusEditor`).last().attr('data-hapus', `hapusEditor_${number}`)

                $('form #editor-x').attr('id', `editor_${number}`);
                CKEDITOR.replace(`editor_${number}`, {
                    height: 200,
                    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
                })
            })

            // ini adalah baris kode untuk mengatur kalo seandainy ada error di bagia create soalessay nya
            // bobot kita jadikan patokan karena jumlah bobot itu sama dengan jumlah soal
            @if(old('bobot') != "")
            @foreach(old('bobot') as $index => $bobot)
            CKEDITOR.replace(`editor-{{ $index }}`, {
                height: 200,
                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
            })
            @endforeach
            @endif

            // baris kode ini untuk mengatur event ketika user mengklik tombol hapus di bagian create soal essay
            // numbernya harus kita kurangin setiap editornya berkurang
            // supaya penomoran ckeditornya tidak berantakan
            $(document).on('click', 'form .btnHapusEditor', function () {
                if (confirm("Yakin akan menghapus soal ini?")) {
                    $($(this).data('target')).remove()

                    number--;
                }
            })

            // dibaris ini kita mengatur datatable untuk semua halaman
            // ketika data dihalaman tersebut ditampilkan maka datatabel akan mengatur desain tablenya
            // dari mulai filter, tombol hapus semua, aktifkan, dll..
            // pengaturan ini tidak sama untuk beberapa halaman
            // sehingga kita perlu melakukan if conditional lagi
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
                        {
                            text: 'Tambah',
                            className: "btn btn-primary btn-sm",
                            action: function (e, dt, node, config) {
                                location.href = locationHrefCreate
                            }
                        },
                        // khusus halaman user
                            @if(preg_match("/user/", request()->url()))
                            @if(@Route::current()->action['as'] == 'user.index') {
                            text: 'Aktifkan User',
                            className: "btn btn-primary btn-sm",
                            action: function (e, dt, node, config) {
                                var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                                if (confirm("Yakin akan mengaktifkan semua data yang dipilih?")) {
                                    location.href = `${locationHrefAktifkanSemua}?ids=${ids}`;
                                }
                            }
                        },
                            @endif
                            @endif

                            @if(preg_match("/user/", request()->url()))
                            @if(Route::current()->action['as'] == 'user.index' && request()->kelas_id) {
                            text: 'Naik Kelas',
                            className: "btn btn-primary btn-sm",
                            action: function (e, dt, node, config) {
                                var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                                if (confirm(
                                    "Yakin akan menaikkan kelas untuk siswa yang dipilih?")) {
                                    location.href = `${locationHrefNaikKelas}?ids=${ids}`;
                                }
                            }
                        }
                        @endif
                        @endif
                    ],
                select: true,
            });
        });

    </script>
@endif
<script src="{{ url("js/script.js") }}"></script>
</body>

</html>
