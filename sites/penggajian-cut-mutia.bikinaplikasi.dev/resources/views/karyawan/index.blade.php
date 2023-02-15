@extends('layouts.app')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <em class="fa fa-home"></em>
            </a>
        </li>

        <li class="active">{{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=20>No</th>
                                    <th>Jabatan</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Lokasi</th>
                                    <th>Nik</th>
                                    <th>Tempat / Tanggal Lahir</th>
                                    <th>Pendidikan</th>
                                    <th>Agama</th>
                                    <th>Status</th>
                                    <th>Tanggungan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($karyawans as $karyawan)
                                <tr data-id='{{ $karyawan->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $karyawan->riwayat_jabatans->where('status', 'Aktif')->first()->nama_jabatan ?? "-" }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->alamat }}</td>
                                    <td>{{ $karyawan->jenis_kelamin }}</td>
                                    <td>{{ $karyawan->lokasi }}</td>
                                    <td>{{ $karyawan->nik }}</td>
                                    <td>{{ $karyawan->tempat_tanggal_lahir }}</td>
                                    <td>{{ $karyawan->pendidikan }}</td>
                                    <td>{{ $karyawan->agama }}</td>
                                    <td>{{ $karyawan->status }}</td>
                                    <td>{{ $karyawan->tanggungan }}</td>
                                    
                                    <td class="text-center">
                                        <a class="label label-primary"
                                            href="{{ url(route('karyawan.edit', $karyawan->id)) }}" style='display: inline-block; margin-bottom: 10px;'>Edit</a>
                                        <form action="{{ url(route('karyawan.destroy', $karyawan->id)) }}"
                                            method='post' style='display: inline-block;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $karyawan->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $karyawan->id }}'
                                                style="display: none;"></button>
                                        </form>
                                    </td>
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

<script>
    const locationHrefHapusSemua = "{{ url('karyawan/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('karyawan/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('karyawan/create') }}";
    var columnOrders = [10];
    var urlSearch = "{{ url('karyawan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection