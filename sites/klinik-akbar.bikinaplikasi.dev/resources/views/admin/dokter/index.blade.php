@extends('admin.layout.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark font-weight-bold">DATA USER</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header bg-success">
                                <h3 class="card-title font-weight-bold text-white">Dokter</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-success mb-3"
                                                data-toggle="modal" data-target="#modal-tambah">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <form method="POST" action="{{ url('admin/dokter/cari') }}">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input name="cari" type="text" class="form-control" placeholder="Cari"
                                                       value="{{ isset($cari) ? $cari : '' }}">
                                                <div class="input-group-append">
                                                    @if(isset($cari))
                                                        <a href="{{ url('admin/dokter') }}" class="btn btn-danger"
                                                           href="#"
                                                           role="button">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </a>
                                                    @else
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                                <!-- /btn-group -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if (isset($cari))
                                    <div class="row">
                                        <div class="col">
                                            <p>Pencarian nama dengan kata kunci '{{$cari}}'</p>
                                        </div>
                                    </div>
                                @endif
                                @if (empty($dokter))
                                    <div class="row">
                                        <div class="col">
                                            <p>Data Tidak Ada</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="row d-flex align-items-stretch">
                                    @foreach ($dokter as $item)
                                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                            <div class="card bg-light shadow border">
                                                <div class="card-header text-muted border-bottom-0">
                                                    KD-{{ $item['id']}}
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="lead"><b>{{$item['nama']}}</b></h2>
                                                            <p class="text-muted text-sm"><b></b>
                                                            </p>
                                                            <ul class="ml-0 mb-0 fa-ul text-muted">
                                                                <li class="small">
                                                                    <b>Jenis Kelamin</b> :
                                                                    @if (strtolower($item['jenis_kelamin']) == 'l')
                                                                        Laki-Laki
                                                                    @else
                                                                        Perempuan
                                                                    @endif
                                                                </li>
                                                                <li class="small"><b>Alamat</b> : {{$item['alamat']}}
                                                                </li>
                                                                <li class="small"><b>Telepon</b> : {{$item['tlpn'] }}
                                                                </li>
                                                                <li class="small"><b>Poli</b> : {{$item['poli'] }}
                                                                </li>
                                                                <li class="small"><b>Jadwal</b> : {{$item['jadwal'] }}
                                                                </li>
                                                                <li class="small">
                                                                    <b>Poli</b>
                                                                    <ul>
                                                                        @if(!(empty($item['spesialis'])))
                                                                            @foreach ($item['spesialis'] as $item2)
                                                                                <li>
                                                                                    {{$item2['nama']}}
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            <li>
                                                                                -
                                                                            </li>
                                                                        @endif


                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-5 text-center">
                                                            <img src="{{ asset('image') }}/user.png" alt=""
                                                                 class="img-circle img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-right">
                                                        <a class="btn btn-info btn-sm"
                                                           href="{{ url('admin/dokter/'. $item['id'] .'/detail') }}"
                                                           role="button">
                                                            <i class="fa fa-address-card" aria-hidden="true"></i>
                                                            Detail</a>

                                                        <a class="btn btn-success btn-sm"
                                                           href="{{ url('admin/dokter/'. $item['id']) }}" role="button">
                                                            <i
                                                                    class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                            Ubah</a>

                                                        <button type="button" data-id_data="{{$item['id']}}"
                                                                data-kode_data="KD-{{$item['id']}}"
                                                                class="btn btn-danger btn-sm open-modal-hapus"
                                                                data-toggle="modal"
                                                                data-target="#modal-hapus">
                                                            <i class="fa fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h4 class="modal-title text-white">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(array('action' => $action, 'files' => true, 'method' => $method)) }}
                <div class="modal-body">
                    <p>Data Dokter</p>
                    <div class="form-group">
                        {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], null, ['class' => 'form-control','placeholder' => '- Pilih Jenis Kelamin -'])}}
                        <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::text('alamat',null,['class' => 'form-control', 'placeholder' => 'Alamat']) }}
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::text('tlpn',null,['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) }}
                        <span class="text-danger">{{ $errors->first('tlpn') }}</span>
                    </div>

                    <div class="form-group">
                        {{ Form::select('poli', ['Poli Lansia' => 'Poli Lansia', 'Poli Anak' => 'Poli Anak', 'Poli Umum' => 'Poli Umum', 'Poli Kebidanan' => 'Poli Kebidanan'], null, ['class' => 'form-control','placeholder' => '- Pilih Poli -'])}}
                        <span class="text-danger">{{ $errors->first('poli') }}</span>
                    </div>


                    <div class="form-group">
                        {{ Form::text('jadwal',null,['class' => 'form-control', 'placeholder' => 'Jadwal']) }}
                        <span class="text-danger">{{ $errors->first('jadwal') }}</span>
                    </div>

                    <div class="dropdown-divider"></div>
                    <p>Data Login</p>
                    <div class="form-group">
                        {{ Form::text('username',null,['class' => 'form-control', 'placeholder' => 'Username']) }}
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::password('password',['class' => 'form-control','placeholder' => 'Password']) }}
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>

                </div>
                <div class="modal-footer justify-content-between bg-success">
                    <div></div>
                    <button type="submit" class="btn btn-outline-light">Simpan</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal hapus --}}
    <div class="modal fade" id="modal-hapus">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white">Informasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="informasi"></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    <form class="d-inline" method="POST" action="{{url('admin/dokter')}}">
                        @method('delete')
                        @csrf
                        <input id="id" type="hidden" name="id" value="">
                        <button type="submit" class="btn btn-danger">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection