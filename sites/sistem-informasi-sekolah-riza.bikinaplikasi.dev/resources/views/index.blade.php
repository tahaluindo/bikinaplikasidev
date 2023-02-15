<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>{{ env('APP_NAME') }} - {{ env('APP_OBJECT_NAME') }} </title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ url('') }}/images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/animate.css">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/nice-select.css">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/font-awesome.min.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/style.css">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ url('') }}/css/responsive.css">


</head>

<body>

<!--====== PRELOADER PART START ======-->

<div class="preloader">
    <div class="loader rubix-cube">
        <div class="layer layer-1"></div>
        <div class="layer layer-2"></div>
        <div class="layer layer-3 color-1"></div>
        <div class="layer layer-4"></div>
        <div class="layer layer-5"></div>
        <div class="layer layer-6"></div>
        <div class="layer layer-7"></div>
        <div class="layer layer-8"></div>
    </div>
</div>

<!--====== PRELOADER PART START ======-->

<!--====== HEADER PART START ======-->

<header id="header-part">

    <div class="header-top d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="header-contact text-lg-left text-center">
                        <ul>
                            <li><img src="images/all-icon/call.png"
                                     alt="icon"><span>{{ env('APP_OBJECT_PHONE_NUMBER') }}</span></li>
                            <li><img src="images/all-icon/email.png"
                                     alt="icon"><span>{{ env('APP_OBJECT_EMAIL') }}</span></li>
                            <li><img src="images/all-icon/map.png"
                                     alt="icon"><span>{{ env('APP_OBJECT_LOCATION') }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-social text-lg-right text-center">
                        <ul>
                            <li>
                                <a href="{{ url('login') }}" class="btn btn-outline-info btn-sm">Login</a>&nbsp;|&nbsp;
                            </li>
                            <li><a href="{{ url('') }}/#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="{{ url('') }}/#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ url('') }}/#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{ url('') }}/#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->

    <div class="navigation navigation-2">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-11 col-md-10 col-sm-9 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ url('') }}/index-3.html">
                            <img src="{{ url($logoGambar) }}" alt="Logo" WIDTH="64">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">

                                <li class="nav-item">
                                    <a href="{{ url('') }}/#registrasi">Registrasi</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('') }}/#mapel">Mapel</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('') }}/#kelas">Kelas</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('') }}/#fasilitas">Fasilitas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('') }}/#guru">Guru</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('') }}/#review">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('') }}/#jurusan">Jurusan</a>
                                    <ul class="sub-menu">
                                        @forelse($jurusan as $item)
                                            <li><a href="#">{{ $item->nama }} - {{ $item->keterangan }}</a></li>
                                        @empty
                                            <strong>Belum ada jurusan</strong>
                                        @endforelse
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('') }}/#tentang">Tentang</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('') }}/#prestasi">Prestasi</a>
                                </li>
                            </ul>
                        </div>
                    </nav> <!-- nav -->
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </div>

</header>

<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->

<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="#">
            <input type="text" placeholder="Search by keyword">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div> <!-- serach form -->
</div>

<!--====== SEARCH BOX PART ENDS ======-->

<!--====== SLIDER PART START ======-->

<section id="slider-part" class="slider-active">
    @forelse(json_decode($pengaturan->hero_section) as $item)
        <div class="single-slider slider-2 bg_cover" style="background-image: url('{{ url("$item->gambar") }}')"
             data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-10">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">{{ $item->judul }}</h1>
                            <a data-animation="fadeInUp" data-delay="1.3s" href="{{ url('') }}/#" class="main-btn">Registrasi
                                sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <strong>Belum Ada Hero Section</strong>
    @endforelse
</section>

<section id="category-2-part">
    <div class="container">
        <div class="row" id="mapel">
            <div class="col-lg-6">
                <h1 style="margin-top: 40px;" id="mapel">Mapel</h1>
                <div class="category-2-items pt-10">
                    <div class="row">


                        @forelse($mapels as $item)

                            <div class="col-md-6">
                                <div class="singel-items text-center mt-30">
                                    <div class="items-image"
                                         style="width: 100%; height: 200px; color: #07294D; background-color: white; border-radius: 20px solid #07294D; margin-bottom: 20px;">

                                    </div>
                                    <div class="items-cont">
                                        <a href="{{ url('') }}/#">
                                            <h5>{{ ucwords($item->nama) }}</h5>
                                            <span>{{ $item->mapel_details->unique('guru_id')->count() }} guru</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <strong>Belum ada mapel</strong>
                        @endforelse
                    </div>
                </div>


                <h1 id="kelas" style="margin-top: 40px;">Kelas</h1>
                <div class="category-2-items pt-10">
                    <div class="row">


                        @forelse($kelass as $item)

                            <div class="col-md-6">
                                <div class="singel-items text-center mt-30">
                                    <div class="items-image"
                                         style="width: 100%; height: 200px; color: #07294D; background-color: white; border-radius: 20px solid #07294D; margin-bottom: 20px;">

                                    </div>
                                    <div class="items-cont">
                                        <a href="{{ url('') }}/#">
                                            <h5>{{ strtoupper($item->nama) }}</h5>
                                            <span>{{ $item->kelas_details->count() }} Siswa</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <strong>Belum ada mapel</strong>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="category-form" id="registrasi">
                    <div class="form-title text-center">
                        <h3>Biaya sangat terjangkau!</h3>
                        <span>Registrasi sekarang</span>
                    </div>
                    <div class="main-form">
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

                        <form action="{{ url('') }}" method="get" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="from_cek" value="Ya">

                            <div class="singel-form">
                                <label for="nama" class="control-label">{{ ucwords('Cek Status Registrasi') }}</label>
                                <p>

                                    <input placeholder="Nomor Registrasi, Ex: 8"
                                           class="form-control form-control-line @error('nomor_registrasi') is-invalid @enderror"
                                           name="nomor_registrasi"
                                           type="text" id="nomor_registrasi"
                                           value="{{ isset($siswa->nomor_registrasi) ? $siswa->nomor_registrasi : old('nomor_registrasi') }}"
                                           required>

                                    @error('nomor_registrasi')
                                    <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="singel-form">
                                <button class="btn btn-outline-warning" type="submit">Cek</button>
                            </div>
                        </form>

                        <hr>

                        <div class="tex-center">Atau Registrasi, Jadwal
                            Pendaftaran: {{ $pengaturan->batas_awal_registrasi }}
                            s/d {{ $pengaturan->batas_akhir_registrasi }}</div>

                        <hr>

                        <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="from_register" value="Ya">

                            <div class="singel-form">
                                <select name="jurusan_id" class="form-control form-control-line" id="jurusan_id"
                                        required>
                                    @foreach ($jurusan->pluck('nama', 'id') as $optionKey => $optionValue)
                                        <option
                                            value="{{ $optionKey }}" {{ (isset($siswa->jurusan_id) && $siswa->jurusan_id == $optionKey) || old('jurusan_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                                    @endforeach
                                </select>

                                @error('jurusan_id')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="singel-form">
                                <input placeholder="nama"
                                       class="form-control form-control-line @error('nama') is-invalid @enderror"
                                       name="nama"
                                       type="text" id="nama"
                                       value="{{ isset($siswa->nama) ? $siswa->nama : old('nama') }}" required>

                                @error('nama')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="singel-form">
                                <select name="jenis_kelamin" class="form-control form-control-line" id="jenis_kelamin"
                                        required>
                                    @foreach (["Laki - Laki" => "Laki - Laki", "Perempuan" => "Perempuan"] as $optionKey => $optionValue)
                                        <option
                                            value="{{ $optionKey }}" {{ (isset($siswa->jenis_kelamin) && $siswa->jenis_kelamin == $optionKey) || old('jenis_kelamin') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                                    @endforeach
                                </select>

                                @error('jenis_kelamin')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="singel-form">
                                <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat"
                                          placeholder="alamat"
                                          required>{{ isset($siswa->alamat) ? $siswa->alamat : old('alamat')}}</textarea>

                                @error('alamat')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="singel-form">
                                <input placeholder="no_hp"
                                       class="form-control form-control-line @error('no_hp') is-invalid @enderror"
                                       name="no_hp" type="text" id="no_hp"
                                       value="{{ isset($siswa->no_hp) ? $siswa->no_hp : old('no_hp') }}"
                                       required>

                                @error('no_hp')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="singel-form">
                                <label for="nama"
                                       class="control-label">{{ ucwords('Berkas Zip (foto 3x4 2 lembar dan ijazah)') }}</label>
                                <p>
                                    <input placeholder="berkas"
                                           class="@error('berkas') is-invalid @enderror"
                                           name="berkas" type="file" id="berkas"
                                           value="{{ isset($siswa->berkas) ? $siswa->berkas : old('berkas') }}"
                                           required>

                                    @error('berkas')
                                    <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="singel-form">
                                <button class="main-btn" type="submit">Registrasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


<section id="course-part" class="pt-115 pb-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-45">
                    <h5 id="fasilitas">Fasilitas</h5>
                    <h2>Fasilitas terbaik kami </h2>
                </div>
            </div>
        </div>
        <div class="row course-slied mt-30">

            @forelse($fasilitas as $item)
                <div class="col-lg-4">
                    <div class="singel-course-2">
                        <div class="thum">
                            <div class="image">
                                <img src="{{ url($item->gambar) }}" alt="Course">
                            </div>
                        </div>
                        <div class="cont">
                            <a href="{{ url('') }}/#"><h4>{{ $item->nama }}</h4></a>
                        </div>
                    </div>
                </div>
            @empty
                <strong>Fasilitas Belum Ada</strong>
            @endforelse

        </div>
    </div>
</section>

<section id="course-part" class="pt-115 pb-115">
    <div class="container" id="prestasi">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-45">
                    <h5 id="fasilitas">Prestasi</h5>
                    <h2>Prestasi yang kami raih selama ini</h2>
                </div>
            </div>
        </div>
        <div class="row course-slied mt-30">

            @forelse(json_decode($pengaturan->prestasi) as $item)
                <div class="col-lg-4">
                    <div class="singel-course-2">
                        <div class="thum">
                            <div class="image">
                                <img
                                    src="{{ url($item->gambar) }}"
                                    alt="Course">
                            </div>
                        </div>
                        <div class="cont">
                            <a href="{{ url('') }}/#"><h4>{{ $item->judul }}</h4></a>
                        </div>
                    </div>
                </div>
            @empty
                <strong>Prestasi Belum Ada</strong>
            @endforelse

        </div>
    </div>
</section>

<section id="teachers-part" class="pt-65 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title mt-50 pb-25">
                    <h5 id="guru">Guru</h5>
                    <h2>Guru terbaik</h2>
                </div> <!-- section title -->
                <div class="teachers-2">
                    <div class="row">

                        <style>

                            .name {
                                font-size: 22px;
                                font-weight: bold
                            }

                            .idd {
                                font-size: 14px;
                                font-weight: 600
                            }

                            .idd1 {
                                font-size: 12px
                            }

                            .number {
                                font-size: 22px;
                                font-weight: bold
                            }

                            .follow {
                                font-size: 12px;
                                font-weight: 500;
                                color: #444444
                            }

                            .btn1 {
                                height: 40px;
                                width: 150px;
                                border: none;
                                background-color: #000;
                                color: #aeaeae;
                                font-size: 15px
                            }

                            .text span {
                                font-size: 13px;
                                color: #545454;
                                font-weight: 500
                            }

                            .icons i {
                                font-size: 19px
                            }

                            hr .new1 {
                                border: 1px solid
                            }

                            .join {
                                font-size: 14px;
                                color: #a0a0a0;
                                font-weight: bold
                            }

                            .date {
                                background-color: #ccc
                            }
                        </style>

                        @forelse($guru as $item)
                            <div class="col-md-6">
                                <div class="teachers-2-singel mt-30">
                                    <div class="thum">
                                        <img src="{{ url("$item->foto") }}" alt="Teacher" width="80" height="80"
                                             data-toggle="modal" data-target="#exampleModalCenter-{{ $item->id }}">
                                    </div>
                                    <div class="cont">
                                        <a href="{{ url('') }}/teachers-singel.html"><h5>{{ $item->nama }}</h5></a>
                                        <p>
                                            @php
                                                $mapels = \App\Models\Mapel::whereIn('id', $item->mapel_details->unique('mapel_id')->pluck('mapel_id')->toArray())->pluck('nama')->toArray();

                                                echo implode(", ", $mapels);
                                                
                                                if(!count($mapels)) {
                                                    echo "-";
                                                }
                                            @endphp
                                        </p>
                                        <span><i class="fa fa-book"></i>{{ $item->mapel_details->unique('kelas_id')->count() }} Kelas</span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModalCenter-{{ $item->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                                                <div class="card p-4">
                                                    <div
                                                        class=" image d-flex flex-column justify-content-center align-items-center">
                                                        <button class="btn btn-secondary"><img
                                                                src="{{ url($item->foto) }}" height="100"
                                                                width="100"/></button>
                                                        <span class="name mt-3">{{ $item->nama }}</span>

                                                        <div
                                                            class="d-flex flex-row justify-content-center align-items-center mt-3"><span
                                                                class="number">{{ $item->mapel_details->unique('kelas_id')->count() }} <span
                                                                    class="follow">Kelas</span></span></div>

                                                        <div
                                                            class="d-flex flex-row justify-content-center align-items-center mt-3"><span
                                                                class="number">{{ $item->mapel_details->unique('mapel_id')->count() }} <span
                                                                    class="follow">Mapel</span></span></div>

                                                        <div class="text mt-3"><span>{{ $item->lulusan }}</span>
                                                        </div>

                                                        <div class="text mt-3"><span>{{ $item->jenis_kelamin }}</span>
                                                        </div>

                                                        <div class=" d-flex mt-2">
                                                            <button class="btn1 btn-dark">Nip: {{ $item->nip }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <strong>Guru belum ditambahkan</strong>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="happy-student mt-55">
                    <div class="happy-title">
                        <h3 id="review">Review</h3>
                    </div>
                    <div class="student-slied">
                        @forelse(json_decode($pengaturan->review) as $item)
                            <div class="singel-student">
                                <img src="{{ url($item->gambar) }}" alt="Quote" height="300">
                                <p>{{ $item->isi }}</p>
                                <h6>{{ $siswa->where('id', $item->siswa_id)->first()->nama }}</h6>
                                <span>{{ $siswa->where('id', $item->siswa_id)->first()->kelas_detail ? $siswa->where('id', $item->siswa_id)->first()->kelas_detail->kelas->nama : "" }}</span>
                            </div>
                        @empty
                            <strong>Review belum ditambahkan</strong>
                        @endforelse
                    </div>
                    <div class="student-image">
                        {{--                        <img src="images/teachers/teacher-2/happy.png" alt="Image">--}}
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ">
                <div class="mt-55">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="patnar-logo" class="pt-40 pb-80 gray-bg">
    <div class="container">
        <div class="row patnar-slied">
            @forelse(json_decode($pengaturan->logo_kerjasama) as $item)
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="{{ url($item->gambar) }}" alt="Logo" height="200">
                    </div>
                </div>
            @empty
                <strong>Logo kerjasama belum ditambahkan</strong>
            @endforelse

        </div> <!-- row -->
    </div> <!-- container -->
</div>

<!--====== PATNAR LOGO PART ENDS ======-->

<!--====== FOOTER PART START ======-->

<footer id="footer-part">
    <div class="footer-top pt-40 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-about mt-40">
                        <div class="logo">
                            <a href="{{ url('') }}/#"><img src="{{ url($logoGambar) }}" alt="Logo"></a>
                        </div>

                        <ul class="mt-20">
                            <li><a href="{{ url('') }}/#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="{{ url('') }}/#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ url('') }}/#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{ url('') }}/#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div> <!-- footer about -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-link mt-40">
                        <div class="footer-title pb-25">
                            <h6 id="#tentang">Tentang</h6>
                        </div>
                        <span class="text-white">{{ $pengaturan->tentang }}</span>
                    </div> <!-- footer link -->
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-link support mt-40">
                        <div class="footer-title pb-25">
                            <h6 id="jurusan">Jurusan</h6>
                        </div>
                        <ul>
                            @forelse($jurusan as $item)
                                <li><a href="{{ url('') }}/#"><i class="fa fa-angle-right"></i>{{ $item->nama }}
                                        - {{ $item->keterangan }}</a></li>
                            @empty
                                <strong>Belum ada jurusan</strong>
                            @endforelse
                        </ul>
                    </div> <!-- support -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-address mt-40">
                        <div class="footer-title pb-25">
                            <h6>Kontak</h6>
                        </div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="cont">
                                    <p>{{ env('APP_OBJECT_LOCATION') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont">
                                    <p>{{ env('app_object_phone') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="cont">
                                    <p>{{ env('app_object_email') }}</p>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- footer address -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer top -->

    <div class="footer-copyright pt-10 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright text-md-left text-center pt-15">
                        <p>Copyright &copy; {{ date('Y') }} - {{ env('APP_OBJECT_NAME') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="copyright text-md-right text-center pt-15">

                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer copyright -->
</footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TO TP PART START ======-->

<a href="{{ url('') }}/#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<!--====== BACK TO TP PART ENDS ======-->


<!--====== jquery js ======-->
<script src="{{ url('') }}/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{ url('') }}/js/vendor/jquery-1.12.4.min.js"></script>

<!--====== Bootstrap js ======-->
<script src="{{ url('') }}/js/bootstrap.min.js"></script>

<!--====== Slick js ======-->
<script src="{{ url('') }}/js/slick.min.js"></script>

<!--====== Magnific Popup js ======-->
<script src="{{ url('') }}/js/jquery.magnific-popup.min.js"></script>

<!--====== Counter Up js ======-->
<script src="{{ url('') }}/js/waypoints.min.js"></script>
<script src="{{ url('') }}/js/jquery.counterup.min.js"></script>

<!--====== Nice Select js ======-->
<script src="{{ url('') }}/js/jquery.nice-select.min.js"></script>

<!--====== Nice Number js ======-->
<script src="{{ url('') }}/js/jquery.nice-number.min.js"></script>

<!--====== Count Down js ======-->
<script src="{{ url('') }}/js/jquery.countdown.min.js"></script>

<!--====== Validator js ======-->
<script src="{{ url('') }}/js/validator.min.js"></script>

<!--====== Ajax Contact js ======-->
<script src="{{ url('') }}/js/ajax-contact.js"></script>

<!--====== Main js ======-->
<script src="{{ url('') }}/js/main.js"></script>

<!--====== Map js ======-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
<script src="{{ url('') }}/js/map-script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@php
    $angkatans = $siswa->unique('angkatan')->sortByDesc('angkatan')->take(5)->reverse()->pluck('angkatan');
@endphp

<div id="labels">{{ json_encode($angkatans->toArray()) }}</div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    const labels = JSON.parse(document.getElementById('labels').innerText);
    document.getElementById('labels').remove();

    const data = {
        labels: labels,
        datasets: [{
            label: 'Grafik Pendaftaran Siswa Perangkatan',
            backgroundColor: ['#142F43', '#FFAB4C', '#FF5F7E', '#B000B9'],
            borderColor: 'rgb(255, 99, 132)',
            data: [
                @foreach($angkatans as $key => $item)
                @php $data[] = $siswa->where('angkatan', $item)->count(); if($key == 4) { break; } @endphp
                @endforeach

                {{ implode(",", $data) }}
            ],
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

</body>

</html>
