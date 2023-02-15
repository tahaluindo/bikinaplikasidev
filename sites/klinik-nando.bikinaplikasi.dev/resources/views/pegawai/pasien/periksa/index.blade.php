@extends('pegawai.layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Periksa</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Periksa</a></li>
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
            <div class="col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body" style="padding:25px;">
                        <div class="row">
                            <table>
                                <tbody>
                                <tr>
                                    <td>Kode</td>
                                    <td>&ensp;: PS-{{$pasien['id']}}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>&ensp;: {{$pasien['nama']}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>&ensp;:
                                        @if($pasien['jenis_kelamin'] == 'L')
                                            Laki-Laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>&ensp;:
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $pasien['tanggal_lahir'])->format('d/m/Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>&ensp;: {{ $pasien['alamat'] }}</td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>&ensp;: {{ $pasien['tlpn'] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-primary my-3" data-toggle="modal"
                                    data-target="#modal-tambah" style="margin-top: 10px;">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                            </button>
                        </div>
                        <div class="row" style="margin-top: 10px;">

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Dokter</th>
                                        <th>Pegawai</th>
                                        <th>Gejala</th>
                                        <th>Poli</th>
                                        <th>Status Periksa</th>
                                        <th>Rumah Sakit Rujukan</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($periksa as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>PR-{{ $item['id'] }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('d/m/Y') }}
                                            </td>
                                            <td>{{ $item['dokter']['nama'] }}</td>
                                            <td>{{ $item['pegawai']['nama'] }}</td>
                                            <td>
                                                @php
                                                    $gejala = $item['gejala'];
                                                    $gejala = explode(',',$gejala);
                                                @endphp
                                                @foreach ($gejala as $item2)
                                                    {{-- <ul> --}}
                                                    <li style="list-style-type: none">
                                                        <span class="badge badge-danger">{{$item2}}</span>
                                                    </li>
                                                    {{-- </ul> --}}
                                                @endforeach
                                            </td>
                                            <td>{{ $item['poli'] }}</td>
                                            <td>
                                                @if ($item['status_periksa'] == 0)
                                                    <span class="badge badge-primary">Menunggu</span>
                                                @elseif ($item['status_periksa'] == 1)
                                                    <span class="badge badge-warning">Pengecekan</span>
                                                @elseif($item['status_periksa'] == 2)
                                                    <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>

                                            <td>
                                                {{ $item['rumah_sakit_rujukan'] }}
                                            </td>

                                            <td class="text-right">
                                                @if ($item['status_periksa'] == 0)
                                                    <a class="btn btn-danger btn-sm"
                                                       href="{{ url('pegawai/pasien/'. $id .'/periksa/'. $item['id'] .'/hapus') }}"
                                                       role="button">Hapus</a>
                                                @endif
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{ url('pegawai/pasien/'. $id .'/periksa/'. $item['id'] .'/ubah') }}"
                                                   role="button">Ubah</a>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-info text-white">
                    <h4 class="modal-title text-white">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(array('action' => $action, 'files' => true, 'method' => $method)) }}
                <input type="hidden" name="pasien_id" value="{{$pasien['id']}}">
                <div class="modal-body">
                    <p>Data Periksa</p>
                    <div class="form-group">
                        <label for="dokter_id" class="font-weight-normal">Poli</label>
                        {{ Form::select('poli', ['Poli Anak' => 'Poli Anak (0-12 thn)', 'Poli Umum' => 'Poli Umum (13 - 59 thn)', 'Poli Gigi' => 'Poli Gigi', 'Poli Penyakit Dalam' => 'Poli Penyakit Dalam'], null, ['class' => 'form-control','placeholder' => '- Pilih Poli -'])}}
                        <span class="text-danger">{{ $errors->first('poli') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="dokter_id" class="font-weight-normal">Dokter</label>
                        <select class="form-control" name="dokter_id">
                            <option>-- Pilih Dokter --</option>
                            @foreach (\App\Dokter::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->poli }})</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('dokter_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="gejala" class="font-weight-normal">Gejala <span class="text-sm text-muted">( gunakan
                            tanda koma
                            untuk memisahkan
                            )</span></label>
                        <input type="text" class="form-control" name="gejala" id="gejala" aria-describedby="helpId"
                               placeholder="" value="demam,pilek" data-role="tagsinput">
                    </div>
                </div>
                <div class="modal-footer justify-content-between btn-info">
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