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
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Penilaian Guru</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    @foreach($kriteria->sortByDesc('nilai')->values() as $item)
{{--                                        <th title="{{ $item->nama }}">K{{ $item->nama }}</th>--}}
                                        <th title="{{ $item->nama }}">K{{ $loop->iteration }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alternatif as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>

                                        @foreach($kriteria->sortByDesc('nilai')->values() as $itemKriteria)
                                            <td>{{ $item->alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->first()->kriteria_detail->nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Normalisasi Bobot</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                    <th>Normalisasi Bobot</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kriteria->sortByDesc('nilai') as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nilai }}</td>
                                        <td>{{ $item->nilai / $kriteria->sum('nilai') }}</td>
                                    </tr>
                                @endforeach
                                <tr data-id='{{ $item->id }}'>
                                    <td>

                                    </td>

                                    <td></td>
                                    <td><b>{{ $kriteria->sum('nilai') }}</b></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Utility Matriks</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    @foreach($kriteria->sortBy('nilai')->values() as $item)
                                        <th title="{{ $item->nama }}">K{{ $loop->iteration }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alternatif as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>

                                        @foreach($kriteria->sortByDesc('nilai')->values() as $itemKriteria)
                                            <td>{{ ($item->alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->first()->kriteria_detail->nilai - $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->min('kriteria_detail.nilai')) / ($alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->max('kriteria_detail.nilai') - $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->min('kriteria_detail.nilai')) }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px; margin-top: -420px;">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Hasil</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    @foreach($kriteria->sortBy('nilai')->values() as $item)
                                        <th title="{{ $item->nama }}">K{{ $loop->iteration }}</th>
                                    @endforeach
                                    <th>Total</th>
                                    <th>Ranking</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alternatif->sortByDesc('total') as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>

                                        @foreach($kriteria->sortByDesc('nilai')->values() as $itemKriteria)
                                            <td>{{ ($item->alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->first()->kriteria_detail->nilai - $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->min('kriteria_detail.nilai')) / ($alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->max('kriteria_detail.nilai') - $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->min('kriteria_detail.nilai')) * $alternatif_details->where('kriteria_detail.kriteria_id', $itemKriteria->id)->first()->kriteria_detail->kriteria->nilai / $kriteria->sum('nilai') }}</td>
                                        @endforeach
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $loop->iteration }}</td>
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




