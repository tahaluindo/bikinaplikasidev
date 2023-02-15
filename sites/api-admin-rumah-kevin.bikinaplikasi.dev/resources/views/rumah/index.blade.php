@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">{{ ucwords("rumah") }}</h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucwords("rumah") }}</li>
                    </ol>
                </div>
            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="card px-1">
                            <div class="card-body">
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

                                <div class="table-stats order-table ov-h table-responsive">

                                    <table class="table" id='dataTable'>
                                        <thead>
                                        <tr>
                                            <th width=3>No.</th>
                                            <th>Pemilik</th>
                                            <th>Nama</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Deskripsi</th>
                                            <th>Jumlah Kamar</th>
                                            <th>Gambar 1</th>
                                            <th>Gambar 2</th>
                                            <th>Gambar 3</th>
                                            <th>Gambar 4</th>
                                            <th>Gambar 5</th>
                                            <th>Harga Per Tahun</th>
                                            <th>Harga Per Bulan</th>
                                            <th>Status</th>
                                            <th>Alasan Penolakan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rumahs as $item)
                                            <tr>
                                                <th>{{ $loop->iteration }}.</th>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->alamat_lengkap }}</td>
                                                <td>{{ $item->latitude }}</td>
                                                <td>{{ $item->longitude }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>{{ $item->jumlah_kamar }}</td>
                                                <td>
                                                    <a href="{{ url($item->gambar1) }}">
                                                        <img src="{{ url($item->gambar1) }}" width="50" height="50">
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($item->gambar2)
                                                        <a href="{{ url($item->gambar2) }}">
                                                            <img src="{{ url($item->gambar2) }}" width="50" height="50">
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->gambar3)
                                                        <a href="{{ url($item->gambar3) }}">
                                                            <img src="{{ url($item->gambar3) }}" width="50" height="50">
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->gambar4)
                                                        <a href="{{ url($item->gambar4) }}">
                                                            <img src="{{ url($item->gambar4) }}" width="50" height="50">
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->gambar5)
                                                        <a href="{{ url($item->gambar5) }}">
                                                            <img src="{{ url($item->gambar5) }}" width="50" height="50">
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>{{ toIdr($item->harga_per_tahun) }}</td>
                                                <td>{{ toIdr($item->harga_per_bulan) }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->alasan_penolakan }}</td>

                                                <td class="text-center">
                                                    
                                                    <a class="label label-primary"
                                                       href="{{ url('/rumah/' . $item->id . '/edit') }}">Edit</a>

                                                    <form action="{{ url('/rumah' . '/' . $item->id) }}"
                                                          method='post' style='display: inline;'
                                                          onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <label class="label label-danger" href=""
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
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('rumah/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('rumah/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('rumah/create') }}";
        var columnOrders = [{{ $rumah_count - 3}}];
        var urlSearch = "{{ url('rumah') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
@endsection