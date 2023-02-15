@extends('pegawai.layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Periksa
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Periksa</a></li>
            </ol>

        </div>
        <div id="page-inner">
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
                                            <th>Bidan</th>
                                            <th>Pegawai</th>
                                            <th>Gejala</th>
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
                                                <td>{{ $item['bidan']['nama'] }}</td>
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

        <footer><p>Copyright © 2021 {{ env('APP_NAME') }}. All right reserved.

        </footer>
    </div>
    </div>

    {{-- modal tambah --}}
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
                        <label for="bidan_id" class="font-weight-normal">Bidan</label>
                        <select class="form-control" name="bidan_id">
                            <option>-- Pilih Bidan --</option>
                            @foreach (\App\Bidan::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('bidan_id') }}</span>
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

@section('script')

    <!-- Select2 -->
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })

            $('[data-mask]').inputmask()

        })
    </script>
@endsection
