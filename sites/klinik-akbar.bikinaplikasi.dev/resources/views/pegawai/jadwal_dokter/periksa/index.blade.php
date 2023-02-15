@extends('pegawai.layout.app')

@section('style')
<link rel="stylesheet" href="{{asset('assets')}}/plugins/tagsinput/css/tagsinput.css">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">DATA PERIKSA</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('pegawai/pasien') }}" class="btn btn-primary m-0 text-white pt-1 pb-1 pr-3 pl-3"><i
                            class="fa fa-arrow-circle-left"></i> Back</a>
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
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="card-title font-weight-bold text-white">Pasien</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                    data-target="#modal-tambah">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                                </button>
                            </div>
                            <div class="row">

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
            <input type="hidden" name="pasien_id" value="{{$pasien['id']}}">
            <div class="modal-body">
                <p>Data Periksa</p>
                <div class="form-group">
                    <label for="dokter_id" class="font-weight-normal">Poli</label>
                    {{ Form::select('poli', ['Poli Lansia' => 'Poli Lansia (60 thn ke atas)', 'Poli Anak' => 'Poli Anak (0-12 thn)', 'Poli Umum' => 'Poli Umum (13 - 59 thn)', 'Poli Kebidanan' => 'Poli Kebidanan'], null, ['class' => 'form-control','placeholder' => '- Pilih Poli -'])}}
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
{{-- <div class="modal fade" id="modal-hapus">
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
                <form class="d-inline" method="POST" action="{{url('admin/pasien')}}">
@method('delete')
@csrf
<input id="id" type="hidden" name="id" value="">
<button type="submit" class="btn btn-danger">
    Hapus</button>
</form>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div> --}}

@endsection

@section('script')

<!-- Select2 -->
<script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('assets') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- TagsInput -->
<script src="{{ asset('assets') }}/plugins/tagsinput/js/tagsinput.js"></script>


<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    $('[data-mask]').inputmask()
    
    })
</script>
@endsection