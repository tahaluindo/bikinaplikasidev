@extends('layouts.app3')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-4">
                <div class="media">
                    <div class="media-body">
                        <h4 class="page-header-title">Barang</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="panel px-2">
                    <div class="panel-body">
                        <h4 class="box-title" style="">Barang</h4>
                        <h4 class="box-title" style="margin-bottom: -30px !important">Nilai
                            Buku: {{ toIdr($barang->nilai_perolehan - $penyusutan->sum('jumlah')) }}</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-stats order-table ov-h">

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th>Jenis Id</th>
                                    <th>Satuan Id</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Umur Manfaat (Thn)</th>
                                    <th>Harga Per Unit</th>
                                    <th>Nilai Perolehan</th>
                                    <th>Penyusutan Per Tahun</th>
                                    <th>Kondisi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr data-id='{{ $item->id }}'>

                                    <td>{{ $item->jenis->keterangan }}</td>
                                    <td>{{ $item->satuan->nama }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->umur_manfaat }}</td>
                                    <td>{{ toIdr($item->harga_per_unit) }}</td>
                                    <td>{{ toIdr($item->nilai_perolehan) }}</td>
                                    <td>{{ $item->penyusutan_per_tahun }}</td>
                                    <td>{{ $item->kondisi }}</td>

                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="panel px-2">
                    <div class="panel-body">
                        <h4 class="box-title" style="margin-bottom: -30px !important">Penyusutan
                            @if($barang->nilai_perolehan - $penyusutan->sum('jumlah') > 0)
                                <a href="{{ route('penyusutan.create') }}?barang_id={{ $barang->id }}"
                                   class="btn btn-info btn-sm">Buat</a>
                            @else
                                <a class="btn btn-secondary btn-sm">Habis</a>
                            @endif

                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-stats order-table ov-h">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Tahun ke</th>
                                    <th>Jumlah</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($penyusutan->sortBy('tahun_ke') as $item)
                                    <tr data-id='{{ $item->id }}'>

                                        <td>{{ $item->tahun_ke }}</td>
                                        <td>{{ toIdr($item->jumlah) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td colspan="2" class="text-right">
                                        <strong>{{ toIdr($penyusutan->sum('jumlah')) }}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="panel px-2">
                    <div class="panel-body">
                        <h4 class="box-title" style="margin-bottom: -30px !important">Pembelian</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-stats order-table ov-h">

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pembelian as $item)
                                    <tr data-id='{{ $item->id }}'>

                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ toIdr($item->total) }}</td>
                                        <td>{{ $item->tanggal }}</td>
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


@endsection

