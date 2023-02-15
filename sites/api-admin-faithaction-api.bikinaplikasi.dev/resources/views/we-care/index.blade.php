@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">{{ ucwords("we care") }}</h4>
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javaScript:void();">Halaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucwords("we care") }}</li>
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
                                            <th>User</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Target Dana</th>
                                            <th>Gambar</th>
                                            <th>Deskripsi</th>
                                            <th>Target Tanggal</th>
                                            <th>Negara</th>
                                            <th>Kota</th>
                                            <th>Alamat</th>
                                            <th>Kode Pos</th>
                                            <th>Status</th>
                                            <th>Catatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($weCare as $item)
                                            <tr>
                                                <th>{{ $loop->iteration }}.</th>
                                                <td>{{ $item->user->fullName }}</td>
                                                <td>{{ $item->we_care_kategori->nama }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ toIdr($item->targetDana) }}</td>
                                                <td>
                                                    @if($item->gambar)
                                                        <a href="{{ url($item->gambar) }}">
                                                            <img src="{{ url($item->gambar) }}" width="50" height="50">
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>{{ $item->targetTanggal }}</td>
                                                <td>{{ $item->negara }}</td>
                                                <td>{{ $item->kota }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->kodePos }}</td>
                                                <td>
                                                    @if($item->status == 'Pending')
                                                        <span class="badge badge-warning">{{ $item->status }}</span>
                                                    @endif
                                                    
                                                    @if($item->status == 'Diterima')
                                                        <span class="badge badge-success">{{ $item->status }}</span>
                                                    @endif
                                                    
                                                    @if($item->status == 'Ditolak')
                                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                                    @endif

                                                </td>
                                                <td>{{ $item->catatan }}</td>

                                                <td class="text-center">

                                                    <a class="label label-primary"
                                                       href="{{ url('/we-care/' . $item->id . '/edit?status=Diterima') }}">Terima</a>

                                                    <a style='color: red !important;' class="label label-danger"
                                                       href="{{ url('/we-care/' . $item->id . '/edit?status=Ditolak') }}">Tolak</a>

                                                    <form action="{{ url('/we-care' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('we-care/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('we-care/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('we-care/create') }}";
        var columnOrders = [{{ 0 }}];
        var urlSearch = "{{ url('we-care') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
@endsection