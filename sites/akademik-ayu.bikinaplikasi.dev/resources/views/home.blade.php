@extends("layouts.monster-admin-lite.app")

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <h2>Profile</h2>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="{{ url($user->foto) }}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{ $user->nama }}</h4>

                        @if(in_array($user->level, ['guru', 'siswa']))
                        <h6 class="card-subtitle">{{ $user->kelas ? $user->kelas->nama : "" }}</h6>
                        <div class="row text-center justify-content-md-center">
                            @if(auth()->user()->level == "admin" && $user->level == "admin")
                            <div class="col-4">
                                <a href="javascript:void(0)" class="link">
                                    <i class="fa fa-paper-plane-o"></i>
                                    <font class="font-medium">0</font>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0)" class="link">
                                    <i class="fa fa-paper-plane"></i>
                                    <font class="font-medium">0</font>
                                </a>
                            </div>
                            @else
                            <div class="col-4">
                                <a href="javascript:void(0)" class="link">
                                    <i class="fa fa-paper-plane-o"></i>
                                    <font class="font-medium">25</font>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0)" class="link">
                                    <i class="fa fa-paper-plane"></i>
                                    <font class="font-medium">34</font>
                                </a>
                            </div>
                            @endif
                        </div>
                        @endif

                    </center>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">

                    <form class="form-horizontal form-material"
                        action="{{ url(route('user.update', ['user' => $user->id])) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        @if(in_array($user->level, ['siswa', '']) && auth()->user()->level == "admin")
                        <div class="form-group">
                            <label class="col-md-12">Kelas</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='kelas_id' @if(($user->level ==
                                    auth()->user()->level || $user->level == "guru") xor $errors->has('kelas_id'))
                                    disabled @endif>
                                    @foreach($kelass as $kelas)
                                    <option value="{{ $kelas->id }}" @if($user->kelas_id == $kelas->id ||
                                        old('kelas_id') == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
                                    @endforeach
                                </select>

                                @error('kelas_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="col-md-12">Foto</label>
                            <div class="col-md-12">
                                <input type="file"
                                    class="form-control form-control-line @error('foto') is-invalid @enderror"
                                    name='foto'>

                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe"
                                    class="form-control form-control-line @error('nama') is-invalid @enderror"
                                    value='{{ old('nama') == "" ? $user->nama : old('nama') }}' name='nama'>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="johnathan@admin.com"
                                    class="form-control form-control-line" id="example-email"
                                    value='{{ old('email') == "" ? $user->email : old('email') }}' name='email'>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">No Hp</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line"
                                    name='no_hp' value='{{ old('no_hp') == "" ? $user->no_hp : old('no_hp') }}'>

                                @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" name='password' value="">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @if(in_array($user->level, ['guru', 'siswa']) && in_array(auth()->user()->level, ['admin']))
                        <div class="form-group">
                            <label class="col-md-12">Level</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='level' @if($user->level ==
                                    auth()->user()->level) disabled @endif>
                                    @if($user->level == "admin" && auth()->user()->level == "admin")
                                    <option @if($user->level == "admin") selected @endif>admin</option>
                                    @else
                                    <option @if(($user->level == "siswa" || old('level') == 'siswa')) selected
                                        @endif>siswa</option>
                                    <option @if(($user->level == "guru" || old('level') == 'guru')) selected @endif
                                        >guru</option>
                                    @endif
                                </select>

                                @error('level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                        @if(in_array($user->level, ['guru', 'siswa']) && in_array(auth()->user()->level, ['admin']))
                        <div class="form-group">
                            <label class="col-sm-12">Status</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name='status' @if($user->level ==
                                    auth()->user()->level) disabled @endif>
                                    @if($user->level == "admin" && auth()->user()->level == "admin")
                                    <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                        @endif>aktif</option>
                                    @elseif($user->status == "guru" && auth()->user()->status == "admin")
                                    <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                        @endif>aktif</option>
                                    <option @if($user->status == "tidak aktif" || old('status') == 'tidak aktif'))
                                        selected @endif>tidak aktif</option>
                                    @else
                                    <option @if($user->status == "aktif" || old('status') == 'aktif')) selected
                                        @endif>aktif</option>
                                    <option @if($user->status == "tidak aktif" || old('status') == 'tidak aktif'))
                                        selected @endif>tidak aktif</option>
                                    <option @if($user->status == "pindah" || old('status') == 'pindah')) selected
                                        @endif>pindah</option>
                                    @endif
                                </select>

                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                        @if(in_array($user->level, ['guru', 'siswa']))
                        <div class="form-group">
                            <label class="col-md-12">No Identitas</label>
                            <div class="col-md-12">
                                <input class="form-control form-control-line" name='no_identitas'
                                    value='{{ old('no_identitas') == "" ? $user->no_identitas : old('no_identitas') }}'
                                    @if($user->level == 'admin') disabled @endif>

                                @error('no_identitas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" >
        @if(in_array(auth()->user()->level, ['guru', 'admin', 'kepala sekolah']))
        <div class="col-sm-3">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Siswa</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="fa fa-user-o text-success"></i> {{ $siswas->count() }}
                        </h2>
                        <span class="text-muted">Total</span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="col-sm-3">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Kelas</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="fa fa-institution text-success"></i>
                            {{ $kelass->count() }}</h2>
                        <span class="text-muted">Total</span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Mapel</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="fa fa-book text-success"></i> {{ $mapels->count() }}
                        </h2>
                        <span class="text-muted">Total</span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Jadwal</h4>
                    <div class="text-right">
                        <h2 class="font-light m-b-0"><i class="fa fa-book text-success"></i> {{ $jadwals->count() }}
                        </h2>
                        <span class="text-muted">Total</span>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Graphic Nilai Siswa</h4> --}}
                    <h1 class="text-center">-- Informasi --</h1>
                    <div class="row" style=''>
                        @if($informasis->count())
                        @foreach($informasis as $informasi)
                        @php $fotos = json_decode($informasi->foto); @endphp
                        <div class="col-sm-6 mb-5">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($fotos ?? [] as $index => $foto)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                                        class="@if($index == 0 ) active @endif"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach($fotos ?? [] as $index => $foto)
                                    <div class="carousel-item @if($index ==0 ) active @endif">
                                        <a href="{{ route('informasi.show', $informasi->id) }}">
                                            <img class="d-block w-100" src="{{ url($foto) }}" alt="{{ $index }} slide"
                                                height="400">
                                            <div class="carousel-caption d-none d-md-block bg-white text-black-50">
                                                <h5>{{ $informasi->user->nama }}: {{ $informasi->judul }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>

                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h4>Tidak ada informasi yang dibuat</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection