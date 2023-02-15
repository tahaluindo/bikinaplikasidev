<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('monster-admin-lite/assets/images/favicon.png') }}">
    <title>AKADEMIK SMK NEGERI 1 MUARO JAMBI</title>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="{{ url('monster-admin-lite/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('monster-admin-lite/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('monster-admin-lite/assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link href="{{ url("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <link href="{{ url("css/style.css") }}" rel="stylesheet">
</head>

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('monster-admin-lite/index.html') }}">
                        <b style='letter-spacing: 2px; font-size: 14px;'>
                            {{ Str::upper(auth()->user()->level) }}
                        </b>
                        {{-- <span>
                            <img src="{{ url('monster-admin-lite/assets/images/logo-text.png') }}" alt="homepage"
                        class="dark-logo" />
                        </span> --}}
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <li class="nav-item"> <span
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark text-white"
                                href="{{ url('monster-admin-lite/javascript:void(0)') }}"><i class="ti-menu"></i></span>
                        </li>
                        <li class="nav-item hidden-sm-down">
                            <h3 class="mt-3 ml-4 text-white"
                                style='font-family: "Fjalla One", sans-serif; letter-spacing: 2px;'>
                                AKADEMIK SMK NEGERI 1 MUARO JAMBI
                            </h3>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
                                href="{{ url('monster-admin-lite/') }}" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                    <img src="{{ url(auth()->user()->foto) }}" alt="user"
                                    class="profile-pic m-r-5" />{{ auth()->user()->nama }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="{{ url('home') }}" class="waves-effect"><i class="fa fa-clock-o m-r-10"
                                    aria-hidden="true"></i>Dashboard</a>
                        </li>
                        @if(in_array(auth()->user()->level, ['', '', '', '']))
                        <li>
                            <a href="{{ url(route('user.show', ['user' => auth()->user()->id])) }}"
                                class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profile</a>
                        </li>
                        @endif

                        @if(in_array(auth()->user()->level, ['admin', 'siswa']))
                        <li>
                            <a href="{{ url('sekolah') }}" class="waves-effect"><i class="fa  fa-university m-r-10"
                                    aria-hidden="true"></i>Profile Sekolah</a>
                        </li>
                        @endif

                        @if(in_array(auth()->user()->level, ['admin']))
                        <li>
                            <a href="{{ url('user') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                    aria-hidden="true"></i>User</a>
                        </li>
                        @endif

                        @if(in_array(auth()->user()->level, ['admin', 'guru', 'kepala sekolah']))
                        <li>
                            <a href="{{ url('informasi') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                    aria-hidden="true"></i>Informasi</a>
                        </li>
                        @endif

                        @if(in_array(auth()->user()->level, ['admin', 'guru', 'siswa']))
                        <li>
                            <a href="{{ url('mapel') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                    aria-hidden="true"></i>Mapel</a>
                        </li>
                        @endif

                        @if(in_array(auth()->user()->level, ['admin', '']))
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

                        @if(in_array(auth()->user()->level, ['admin', 'guru', 'siswa', 'kepala sekolah']))
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
                            <a href="{{ route('raport.pilih_semester') }}" class="waves-effect"><i class="fa fa-table m-r-10"
                                    aria-hidden="true"></i>Raport</a>
                        </li>
                        @endif

                    </ul>
                    <div class="text-center m-t-30">
                        <form action="{{ url(route('logout')) }}" method='post' style='display: inline;' method="post"
                            onsubmit='return confirm("Yakin akan logout?");'>
                            @csrf
                            <button class="btn btn-danger" type="submit">Logout</button>
                        </form>
                    </div>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container pt-3">
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

            @yield('content')

            <footer class="footer text-center">
                © 2020 AKADEMIK SMK NEGERI 1 MUARO JAMBI
            </footer>
        </div>
    </div>
    <script src="{{ url('monster-admin-lite/assets/plugins/jquery/jquery.min.js') }}"></script>
    {{--  <script src="{{ url('monster-admin-lite/assets/plugins/bootstrap/js/tether.min.js') }}"></script> --}}
    <script src="{{ url('monster-admin-lite/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ url('monster-admin-lite/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('monster-admin-lite/assets/js/waves.js') }}"></script>
    <script src="{{ url('monster-admin-lite/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ url('monster-admin-lite/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ url('monster-admin-lite/assets/js/custom.min.js') }}"></script>
    <script src="{{ url('monster-admin-lite/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

    {{-- datatable --}}
    <script src="{{ url("vendor/datatables/jquery.dataTables.js") }}"></script>
    <script src="{{ url("vendor/datatables/dataTables.bootstrap4.js") }}"></script>
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
                        @if(Route::current()->action['as'] == 'user.index') {
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
                        @if(Route::current()-> action['as'] == 'user.index' && request()->kelas_id) {
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
                    ],
                select: true,
            });
        });
    </script>
    <script src="{{ url("js/script.js") }}"></script>
</body>

</html>