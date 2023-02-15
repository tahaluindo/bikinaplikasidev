<!DOCTYPE html>
<html lang="en-us">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- lib-->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">

    <!-- Theme-->
    <!-- Concat all lib & plugins css-->
    <link id="mainstyle" rel="stylesheet" href="{{ url('') }}/assets/stylesheets/theme-libs-plugins.css">
    <link id="mainstyle" rel="stylesheet" href="{{ url('') }}/assets/stylesheets/skin.css">

    <!-- Demo only-->
    <link id="mainstyle" rel="stylesheet" href="{{ url('') }}/assets/stylesheets/demo.css">

    <!-- This page only-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="{{ url('') }}/assets/scripts/lib/html5shiv.js"></script>
    <script src="{{ url('') }}/assets/scripts/lib/respond.js"></script><![endif]-->
    <script src="{{ url('') }}/assets/scripts/lib/modernizr-custom.js"></script>
    <script src="{{ url('') }}/assets/scripts/lib/respond.js"></script>
    
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <link href="{{ url('css/select.dataTables.min.css' ) }}" rel="stylesheet">
    <link href="{{ url("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">
    <link href="{{ url('css/pretty-checkbox.min.css' ) }}" rel="stylesheet">
    <link href="{{ url('css/flatpickr.min.css' ) }}" rel="stylesheet">
    <link href="{{ url('css/material_blue.css' ) }}" rel="stylesheet">
    
    
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;

            color: #fff;
            text-align: center;
            border-radius: 25px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            top: 30px;
            left: 47.5%;
            right: 40%;
            font-size: 17px;
        }

        #snackbar.hapus_semua {
            left: 46.5%;
            right: 39.5%;
        }

        #snackbar.success {
            background-color: #00CA79;
        }

        #snackbar.warning {
            background-color: #EC971F;
        }

        #snackbar.danger {
            background-color: #AC2925;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            to {
                top: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            to {
                top: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                top: 30px;
                opacity: 1;
            }

            to {
                top: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                top: 30px;
                opacity: 1;
            }

            to {
                top: 0;
                opacity: 0;
            }
        }
    </style>

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }

    </style>

    <style>
        ._3emE9--dark-theme .-S-tR--ff-downloader {
            background: rgba(30, 30, 30, .93);
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            color: #fff
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
            background: #3d4b52
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
            background: #131415
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._10vpG--footer {
            background: rgba(30, 30, 30, .93)
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader {
            background: #fff;
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            color: #314c75
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._6_Mtt--header {
            font-weight: 700
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
            border: 0;
            color: rgba(0, 0, 0, .88)
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._10vpG--footer {
            background: #fff
        }

        .-S-tR--ff-downloader {
            display: block;
            overflow: hidden;
            position: fixed;
            bottom: 20px;
            right: 7.1%;
            width: 330px;
            height: 180px;
            background: rgba(30, 30, 30, .93);
            border-radius: 2px;
            color: #fff;
            z-index: 99999999;
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            transition: .5s
        }

        .-S-tR--ff-downloader._3M7UQ--minimize {
            height: 62px
        }

        .-S-tR--ff-downloader._3M7UQ--minimize .nxuu4--file-info,
        .-S-tR--ff-downloader._3M7UQ--minimize ._6_Mtt--header {
            display: none
        }

        .-S-tR--ff-downloader ._6_Mtt--header {
            padding: 10px;
            font-size: 17px;
            font-family: sans-serif
        }

        .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
            float: right;
            background: #f1ecec;
            height: 20px;
            width: 20px;
            text-align: center;
            padding: 2px;
            margin-top: -10px;
            cursor: pointer
        }

        .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
            background: #e2dede
        }

        .-S-tR--ff-downloader ._13XQ2--error {
            color: red;
            padding: 10px;
            font-size: 12px;
            line-height: 19px
        }

        .-S-tR--ff-downloader ._2dFLA--container {
            position: relative;
            height: 100%
        }

        .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info {
            padding: 6px 15px 0;
            font-family: sans-serif
        }

        .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info div {
            margin-bottom: 5px;
            width: 100%;
            overflow: hidden
        }

        .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
            margin-top: 21px;
            font-size: 11px
        }

        .-S-tR--ff-downloader ._10vpG--footer {
            width: 100%;
            bottom: 0;
            position: absolute;
            font-weight: 700
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2V73d--loader {
            animation: n0BD1--rotation 3.5s linear forwards;
            position: absolute;
            top: -120px;
            left: calc(50% - 35px);
            border-radius: 50%;
            border: 5px solid #fff;
            border-top-color: #a29bfe;
            height: 70px;
            width: 70px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar {
            width: 100%;
            height: 18px;
            background: #dfe6e9;
            border-radius: 5px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar ._1FVu9--progress-bar {
            height: 100%;
            background: #8bc34a;
            border-radius: 5px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status {
            margin-top: 10px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1XilH--state {
            float: left;
            font-size: .9em;
            letter-spacing: 1pt;
            text-transform: uppercase;
            width: 100px;
            height: 20px;
            position: relative
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1jiaj--percentage {
            float: right
        }
    </style>

    <link href="{{ url("css/style2.css") }}" rel="stylesheet">

</head>

<body class="orchid  ">

<!-- #SIDEMENU-->
<div class="mainmenu-block">
    <!-- SITE MAINMENU-->
    <nav class="menu-block">
        <ul class="nav">
            <li class="nav-item mainmenu-user-profile"><a href="{{ url(route('user.profile', auth()->id())) }}">
                    <div class="circle-box"><img src="{{ url("") }}/avatar/png/004-girl.png" alt="">
                        <div class="dot dot-success"></div>
                    </div>
                    <div class="menu-block-label"><b>{{ auth()->user()->level }}</b><br>{{ auth()->user()->name }}</div>
                </a></li>
        </ul>

        <!--li.header.nav-item user interface-->
    @include('layouts.sidebar')

    <!-- END SITE MAINMENU-->
    </nav>
</div>

<!-- #MAIN-->
<div class="main-wrapper">

    <!-- VIEW WRAPPER-->
    <div class="view-wrapper">

        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">

            <!-- NAV FOR MOBILE-->
            <div class="topbar-wrapper-mobile-nav"><a class="topbar-togger js-minibar-toggler" href="#"><i
                        class="icon ion-ios-arrow-back hidden-md-down"></i><i
                        class="icon ion-navicon-round hidden-lg-up"></i></a><a
                    class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler" href="#"><i
                        class="icon ion-android-person"></i></a>

                <!-- ADD YOUR LOGO HEREText logo: a.topbar-wrapper-logo(href="#") AdminHero
                --><a class="topbar-wrapper-logo demo-logo" href="index.html">{{ env('APP_NAME') }}
                    - {{ env('APP_OBJECT_NAME') }}</a>
            </div>
            <!-- END NAV FOR MOBILE-->

            <!-- SEARCH-->
            <div class="topbar-wrapper-search">
                <form>
                    <input class="form-control" type="search" placeholder="Search"><a
                        class="topbar-togger topbar-togger-search js-close-search" href="#"><i
                            class="icon ion-close"></i></a>
                </form>
            </div>
            <!-- END SEARCH-->

            <!-- TOP RIGHT MENU-->
            <ul class="nav navbar-nav topbar-wrapper-nav">

                <li class="nav-item">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); if(confirm('Yakin akan logut?')) this.closest('form').submit(); ">
                            <i class="icon ion-android-exit"></i>
                        </a>
                    </form>
                </li>
                <!-- END TOP RIGHT MENU-->
            </ul>
        </div>
        <!--END TOP WRAPPER-->


        <!-- PAGE CONTENT HERE-->
        

        @yield('content')

    </div>
</div>
<!-- WEB PERLOAD-->
<div id="preload">
    <ul class="loading">
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

<script src="{{ url('') }}/js/dropzone.min.js"></script>

<!-- Lib-->
<script src="{{ url('') }}/assets/scripts/lib/jquery-1.11.3.min.js"></script>
<script src="{{ url('') }}/assets/scripts/lib/jquery-ui.js"></script>
<script src="{{ url('') }}/assets/scripts/lib/tether.min.js"></script>

<!-- Theme js-->
<!-- Concat all plugins js-->
<script src="{{ url('') }}/assets/scripts/theme/theme-plugins.js"></script>
<script src="{{ url('') }}/assets/scripts/theme/main.js"></script>
<!-- Below js just for this demo only-->
<script src="{{ url('') }}/assets/scripts/demo/demo-skin.js"></script>
<script src="{{ url('') }}/assets/scripts/demo/bar-chart-menublock.js"></script>


{{-- datatable --}}
{{-- datatable --}}
<script src="{{ url("vendor/datatables/jquery.dataTables.js") }}"></script>
<script src="{{ url("vendor/datatables/dataTables.bootstrap4.js") }}"></script>
<script src="{{ url('') }}/js/dataTables.buttons.min.js"></script>
<script src="{{ url('') }}/js/buttons.flash.min.js"></script>
<script src="{{ url('') }}/js/dataTables.select.min.js"></script>



{{-- flatpickr --}}
<script src="{{ url('') }}/js/flatpickr.js"></script>
<script src="{{ url('') }}/js/id.js"></script>


@if(request()->segment(1) != 'dashboard')
<script>
    $(document).ready(function () {
        // untuk merubah position modal
        modalId = 0;
        $(document).on('click', '.lblHapus', function () {
            modalId = $(this).data('modal-id');

            $(`#modal-${modalId} .modal-dialog`).css({
                "position": 'absolute',
                'left': event.pageX - 170,
                "top": event.pageY - 170
            });

            $(`#modal-${modalId} .btn-modal`).click((e) => {

                $(`#modal-${modalId}`).modal('hide');
            });

            $(document).on('keypress', (e) => {
                if (e.which == 13) {
                    if (modalId > 0) {

                        $(`#modal-${modalId} .btn-modal`).click();
                    }

                    modalId = 0;
                }
            });
        });


        // dropzone
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };

        // menghilangkan alert
        $('.alert').fadeOut(5000);

        // flatpickr
        $(".flatpickr").flatpickr({
            enableTime: false,
            dateFormat: "d-M-Y",
            locale: 'id'
        });

        // flatpickr
        $(".flatpickr2").flatpickr({
            enableTime: false,
            dateFormat: "d-M-Y H:i",
            locale: 'id',
            enableTime: true
        });

        $('[data-toggle="popover"]').popover({
            html: true
        });

        $('input[type="range"]').on("change mousemove", function () {
            $(this).next().html($(this).val());
        });

        // agar filter dari datatable bisa dipake buat nyari juga
        $('#dataTable_filter input').attr('name', 'q');
        $('#dataTable_filter input').val(q);
        $('#dataTable_filter input').attr('id', 'inputSearch');
        $('#dataTable_filter input').attr('placeholder', placeholder);

        var formHtml = `<form action="${urlSearch}">`;

        $('#dataTable_filter input').wrap(formHtml);

        $(document).keydown(function (e) {
            if (e.keyCode == 13 && $("#inputSearch").is(':focus')) {
                $('#dataTable_filter form').submit();
            }
        });

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
                    `#modal-test-mode ul[data-mapel-detail_id='${mapel_detail_id.value}'][data-jenis='${$(".jenis_soal").val()}'][data-mode='${$(".mode").val()}']`;
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


        // baris kode ini untuk menambahkan kelas dan juga guru ketika tombol tambah diklik (di maple create)
        $('#mapelBtnAdd').click(function () {
            const mapelFormKelasGuru = $('#mapelFormKelasGuru')
            const mapleFormKelasGuruAdd = $('#mapelFormKelasGuruAdd');

            mapelFormKelasGuru.append(mapleFormKelasGuruAdd.html());
        })


        // ini harus dibuat supaya ck editor bisa upload gambar
        {{--CKEDITOR.config.filebrowserUploadMethod = 'form';--}}

        {{--// ini adalah inisialisasi setiap ck editor, dari id 0 sampai 3, jadi kalo perlu ckeditornya--}}
        {{--// kita tinggal pasang aja id yang tersedia dibawah ini, dan ck editor pun langsung tampil--}}
        {{--CKEDITOR.replace('editor-0', {--}}
        {{--    height: 200,--}}
        {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
        {{--});--}}
        {{--CKEDITOR.replace('editor-1', {--}}
        {{--    height: 200,--}}
        {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
        {{--});--}}
        {{--CKEDITOR.replace('editor-2', {--}}
        {{--    height: 200,--}}
        {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
        {{--});--}}
        {{--CKEDITOR.replace('editor-3', {--}}
        {{--    height: 200,--}}
        {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
        {{--});--}}
        {{--CKEDITOR.replace('editor-4', {--}}
        {{--    height: 200,--}}
        {{--    filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
        {{--});--}}

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
        {{--        @if(old('bobot') != "")--}}
        {{--        @foreach(old('bobot') as $index => $bobot)--}}
        {{--        CKEDITOR.replace(`editor-{{ $index }}`, {--}}
        {{--            height: 200,--}}
        {{--            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"--}}
        {{--        })--}}
        {{--        @endforeach--}}
        {{--        @endif--}}

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
                    className: "btn btn-success-2 buttons-select-all btn-sm"
                },
                    {
                        extend: "selectNone",
                        text: 'Batal Pilih',
                        className: "btn btn-success-2 buttons-select-none  btn-sm"
                    },
                    {
                        text: 'Hapus',
                        className: "btn btn-success-2 btn-sm",
                        action: function (e, dt, node, config) {
                            var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                            if (confirm("Yakin akan menghapus semua data yang dipilih?")) {
                                // $(`#modal-hapus-semua .modal-dialog`).css({
                                //     "position": 'absolute',
                                //     'left' : event.pageX - 170,
                                //     "top": event.pageY - 170
                                // });

                                // $('#modal-hapus-semua').modal('show');

                                location.href = `${locationHrefHapusSemua}?ids=${ids}`;
                            }
                        }
                    },
                    {
                        text: 'Tambah',
                        className: "btn btn-success-2 btn-sm",
                        action: function (e, dt, node, config) {
                            location.href = locationHrefCreate
                        }
                    },
                    // khusus halaman user
                    // @if(Route::current()->action['as'] == 'user.index') {
                    //     text: 'Aktifkan User',
                    //     className: "btn btn-success-2 btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                    //         if (confirm("Yakin akan mengaktifkan semua data yang dipilih?")) {
                    //             location.href = `${locationHrefAktifkanSemua}?ids=${ids}`;
                    //         }
                    //     }
                    // },
                    // @endif
                    // @if(Route::current()->action['as'] == 'user.index' && request()->kelas_id) {
                    //     text: 'Naik Kelas',
                    //     className: "btn btn-success-2 btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                    //         if (confirm(
                    //             "Yakin akan menaikkan kelas untuk siswa yang dipilih?")) {
                    //             location.href = `${locationHrefNaikKelas}?ids=${ids}`;
                    //         }
                    //     }
                    // }
                    // @endif


                    ],
                    select
    :
        true,
    })
        ;
    });
</script>
@endif

<!-- Below js just for this page only-->
@yield('dashboardchart')

</body>
</html>
