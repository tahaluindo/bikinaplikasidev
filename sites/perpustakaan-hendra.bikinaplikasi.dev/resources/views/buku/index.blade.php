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
                                    <li><span class="bread-blod">Buku</span>
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
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Kota</th>
                                        <th>Stok</th>
                                        <th>Ditambahkan</th>
                                        @if(!in_array(auth()->user()->level, ['Siswa', 'Guru']))
                                            <th class="text-center">Aksi</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($buku as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->kode_buku }} {{ $kode_buku->where('kode_start', "<=", $item->kode_buku)->where('kode_end', ">=", $item->kode_buku)->first() ? "(Ket: " . $kode_buku->where('kode_start', "<=", $item->kode_buku)->where('kode_end', ">=", $item->kode_buku)->first()->keterangan . ' | Rak: ' . $kode_buku->where('kode_start', "<=", $item->kode_buku)->where('kode_end', ">=", $item->kode_buku)->first()->lokasi_rak . ")" : "" }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->penulis }}</td>
                                            <td>{{ $item->penerbit }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>{{ $item->kota }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>{{ $item->ditambahkan }}</td>

                                            @if(!in_array(auth()->user()->level, ['Siswa', 'Guru']))
                                                <td class="text-center">
                                                    <a class="badge badge-primary"
                                                       href="{{ url('/buku/' . $item->id . '/edit') }}">Edit</a>
                                                    <form action="{{ url('/buku' . '/' . $item->id) }}" method='post'
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
        const locationHrefHapusSemua = "{{ url('buku/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('buku/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('buku/create') }}";
        var columnOrders = [{{ $buku_count - 5 }}];
        var urlSearch = "{{ url('buku') }}";
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

