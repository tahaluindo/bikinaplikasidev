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
                                    <li><span class="bread-blod">perhitungan</span>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Hasil</u>
                            </h4>

                            @if(!isset($hasil_hitung))
                            <button class="btn btn-xl btn-primary" form="form-hitung">HITUNG</button>
                            @else
                            <button class="btn btn-xl btn-primary" form="form-hitung" name="save" value="save">SIMPAN</button>
                            <button class="btn btn-xl btn-primary" form="form-hitung">HITUNG</button>
                            <button class="btn btn-xl btn-primary" form="form-hitung" name="print" value="print">PRINT</button>
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Nama</th>
                                        @foreach($kriteria->sortBy('urutan_prioritas')->values() as $item)
                                            <th title="{{ $item->nama }}">{{ $item->nama }}</th>
                                        @endforeach
                                        <th>Total</th>
                                        <th>Ranking</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alternatif->sortByDesc('nilai_kriteria_total')->values() as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->nama }}</td>

                                            @foreach($item->nilai_kriteria as $itemNilaiKriteria)
                                                <td>{{ $itemNilaiKriteria }}</td>
                                            @endforeach
                                            <td>{{ $item->nilai_kriteria_total }}</td>
                                            <th>{{ $loop->iteration }}</th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




