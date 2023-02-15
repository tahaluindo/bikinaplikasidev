@extends('layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Bidan
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Bidan</a></li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row justify-content-between" style="margin-bottom: 10px;">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-success mb-3"
                                            data-toggle="modal" data-target="#modal-tambah">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                                    </button>
                                </div>

                                <div class="col-sm-6">
                                    <form method="POST" action="{{ url('admin/bidan/cari') }}"
                                          class="form-inline pull-right">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName2">Kata Kunci</label>
                                            <input name="cari" type="text" class="form-control" placeholder="Cari"
                                                   value="{{ isset($cari) ? $cari : '' }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </form>
                                </div>
                            </div>

                            @if (isset($cari))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Pencarian nama dengan kata kunci '{{$cari}}'</p>
                                    </div>
                                </div>
                            @endif
                            @if (empty($bidan))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Data Tidak Ada</p>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                @foreach ($bidan as $item)
                                    <div class="col-sm-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                        <div class="panel bg-light shadow border panel-default">
                                            <div class="panel-header text-muted border-bottom-0">
                                                <div style="padding: 10px;">
                                                    KD-{{ $item['id']}}
                                                </div>
                                            </div>
                                            <div class="panel-body p-2">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <h2 class="lead"><b>{{$item['nama']}}</b></h2>
                                                        <p class="text-muted text-sm"><b></b>
                                                        </p>
                                                        <ul class="ml-0 mb-0 fa-ul" style="color: #333 !important">
                                                            <li class="small"><b>Alamat</b> : {{$item['alamat']}}
                                                            </li>
                                                            <li class="small"><b>Telepon</b> : {{$item['tlpn'] }}
                                                            </li>
{{--                                                            <li class="small"><b>Poli</b> : {{$item['poli'] }}--}}
{{--                                                            </li>--}}
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
                                                    <div class="col-sm-5 text-center">
                                                        <img src="{{ asset('image') }}/user.png" alt=""
                                                             class="img-circle img-fluid"
                                                             style="max-width: 100%;height: auto;vertical-align: middle;border-style: none;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <div class="text-right">
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{ url('admin/bidan/'. $item['id'] .'/detail') }}"
                                                       role="button">
                                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                                        Detail</a>

                                                    <a class="btn btn-success btn-sm"
                                                       href="{{ url('admin/bidan/'. $item['id']) }}" role="button">
                                                        <i
                                                                class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                        Ubah</a>

                                                    <button type="button" data-id_data="{{$item['id']}}"
                                                            data-kode_data="KD-{{$item['id']}}"
                                                            class="btn btn-danger btn-sm open-modal-hapus"
                                                            data-toggle="modal"
                                                            data-target="#modal-hapus-{{ $item['id'] }}">
                                                        <i class="fa fa-trash-alt"></i> Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    {{-- modal hapus --}}
                                    <div class="modal fade" id="modal-hapus-{{ $item['id'] }}">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header btn-info">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title text-white">Informasi</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="informasi">Yakin akan menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer btn-info justify-content-between">
                                                    <form class="d-inline" method="POST"
                                                          action="{{url('admin/bidan')}}">
                                                        @method('delete')
                                                        @csrf
                                                        <input id="id" type="hidden" name="id" value="{{ $item['id'] }}">
                                                        <button type="button" class="btn btn-success"
                                                                data-dismiss="modal">Close
                                                        </button>

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


                                @endforeach
                            </div>


                            <div class="modal fade" id="modal-tambah">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header btn-info text-white">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title text-white">Tambah Data</h4>
                                        </div>
                                        {{ Form::open(array('action' => $action, 'files' => true, 'method' => $method)) }}
                                        <div class="modal-body">
                                            <p>Data Bidan</p>

                                            <input type="hidden" name="jenis_kelamin" value="P">

                                            <div class="form-group">
                                                <label>Nama</label>
                                                {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
                                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                {{ Form::text('alamat',null,['class' => 'form-control', 'placeholder' => 'Alamat']) }}
                                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label>Telpon</label>
                                                {{ Form::text('tlpn',null,['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) }}
                                                <span class="text-danger">{{ $errors->first('tlpn') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label>Jadwal</label>
                                                {{ Form::text('jadwal',null,['class' => 'form-control', 'placeholder' => 'Jadwal']) }}
                                                <span class="text-danger">{{ $errors->first('jadwal') }}</span>
                                            </div>

                                            <div class="dropdown-divider"></div>
                                            <p>Data Login</p>
                                            <div class="form-group">
                                                <label>Username</label>
                                                {{ Form::text('username',null,['class' => 'form-control', 'placeholder' => 'Username']) }}
                                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                {{ Form::password('password',['class' => 'form-control','placeholder' => 'Password']) }}
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>

                                        </div>
                                        <div class="modal-footer  btn-info justify-content-between bg-success">
                                            <div></div>
                                            <button type="submit" class="btn btn-default">Simpan</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <footer><p>Copyright © 2021 {{ env('APP_NAME') }}. All right reserved.

            </footer>
        </div>
    </div>



@endsection