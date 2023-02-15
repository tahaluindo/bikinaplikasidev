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
                                    <li><span class="bread-blod">Kode Buku</span>
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
                                    <th>Kode Buku</th>
                                    <th>Keterangan</th>
                                    <th>Lokasi Rak</th>

                                    @if(!in_array(auth()->user()->level, ['Siswa', 'Guru']))
                                        <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kode_buku as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->kode_buku }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->lokasi_rak }}</td>

                                        @if(!in_array(auth()->user()->level, ['Siswa', 'Guru']))
                                            <td class="text-center">
                                                <a class="badge badge-primary"
                                                   href="{{ url('/kode-buku/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/kode-buku' . '/' . $item->id) }}"
                                                      method='post'
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
                                        @endif
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
        const locationHrefHapusSemua = "{{ url('kode-buku/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('kode-buku/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('kode-buku/create') }}";
        var columnOrders = [{{ $kode_buku_count - 2 }}];
        var urlSearch = "{{ url('kode-buku') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;

        @if(in_array(auth()->user()->level, ['Siswa', 'Guru']))
        var tampilkan_buttons = false;
        var button_manual = false;
        @endif
    </script>
@endsection
