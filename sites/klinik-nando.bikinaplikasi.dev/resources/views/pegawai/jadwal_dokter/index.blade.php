@extends('pegawai.layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Jadwal Dokter</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Jadwal Dokter</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="card-title font-weight-bold text-white">Pasien</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                data-target="#modal-tambah">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                        </button>
                        <div class="table-responsive">
                            <table id="example1" class="table border table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Bpjs</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($pasien as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>PS-{{ $item['id'] }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>
                                            @if($item['jenis_kelamin'] == 'L')
                                                Laki-Laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item['tanggal_lahir'])->format('d/m/Y') }}
                                            ({{ \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($item['tanggal_lahir'])) }}
                                            Thn)
                                        </td>
                                        <td>{{ $item['alamat'] }}</td>
                                        <td>{{ $item['tlpn'] }}</td>
                                        <td>{{ $item['bpjs'] }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-danger btn-sm"
                                               href="{{ url('pegawai/pasien/'. $item['id'] .'/periksa') }}"
                                               role="button"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                Periksa</a>
                                            <a class="btn btn-success btn-sm"
                                               href="{{ url('pegawai/pasien/'. $item['id']) .'/ubah'}}" role="button">
                                                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                Ubah</a>


                                            {{-- <button type="button" data-id_data="{{$item['id']}}"
                                            data-kode_data="{{$item['kode_pasien']}}"
                                            class="btn btn-danger btn-sm open-modal-hapus" data-toggle="modal"
                                            data-target="#modal-hapus">
                                            <i class="fa fa-trash-alt"></i> Hapus
                                            </button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>

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
                    <p>Data Pasien</p>
                    <div class="form-group">
                        {{ Form::text('nama',null,['class' => 'form-control', 'placeholder' => 'Nama']) }}
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], null, ['class' => 'form-control','placeholder' => '- Pilih Jenis Kelamin -'])}}
                        <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input name="tanggal_lahir" type="date" class="form-control" data-inputmask-alias="datetime"
                                   data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="Tanggal Lahir"
                                   value="{{ old('tanggal_lahir') }}">
                        </div>
                        <!-- /.input group -->
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
                        {{ Form::text('alergi_obat',null,['class' => 'form-control', 'placeholder' => 'Alergi Obat']) }}
                        <span class="text-danger">{{ $errors->first('alergi_obat') }}</span>
                    </div>

                    <div class="form-group">
                        {{ Form::select('bpjs', ['Ya' => 'Ya', 'Tidak' => 'Tidak'], null, ['class' => 'form-control','placeholder' => '- Pilih Status Bpjs -'])}}
                        <span class="text-danger">{{ $errors->first('bpjs') }}</span>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-success">
                    <div></div>
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
