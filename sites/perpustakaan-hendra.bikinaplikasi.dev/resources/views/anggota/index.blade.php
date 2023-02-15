@extends('layouts.app2')

@section('page-info')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ url('') }}/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Anggota</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="product-sales-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Id anggota</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Status</th>
                                    <th>Tipe Anggota</th>
                                    <th>Dibuat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($anggota as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->no_identitas }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_telepon }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->user ? $item->user->level : "" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->dibuat)->format('d-m-Y') }}</td>

                                        <td class="text-center">

                                            <a class="badge badge-warning"
                                               href="{{ url("/anggota/$item->id/cetak") }}" target="_blank">Cetak</a>

                                            <a class="badge badge-info"
                                               href="{{ url("/peminjaman?anggota_id=$item->id") }}">Peminjaman</a>
                                            <a class="badge badge-primary"
                                               href="{{ url('/anggota/' . $item->id . '/edit') }}">Edit</a>

                                            <form action="{{ url('/anggota' . '/' . $item->id) }}" method='post'
                                                  style='display: inline;'
                                                  onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                @method('DELETE')
                                                @csrf
                                                <label class="badge badge-danger" href=""
                                                       for='btnSubmit-{{ $item->id }}'
                                                       style='cursor: pointer;'>Hapus</label>
                                                <button type="submit" id='btnSubmit-{{ $item->id }}'
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
        const locationHrefHapusSemua = "{{ url('anggota/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('anggota/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('anggota/create') }}";
        var columnOrders = [{{ $anggota_count - 5 }}];
        var urlSearch = "{{ url('anggota') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection




