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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <h3>Matrix Pencocokan Kriteria</h3>
                            <table class="table" id='dataTable1'>
                                <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Alternatif</th>

                                        @foreach ($kriteria->sortBy('urutan_prioritas') as $kriteriaItem)
                                            <th>{{ $kriteriaItem->kode }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matrixPencocokanKriteria as $itemMatrixPencocokanKriteria)
                                        <tr data-id=''>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $itemMatrixPencocokanKriteria['namaAlternatif'] }}</td>

                                            @foreach ($kriteria->sortBy('urutan_prioritas') as $kriteriaItem)
                                                <td>{{ $itemMatrixPencocokanKriteria["$kriteriaItem->kode"] }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <h3>Matrix Normalisasi</h3>
                            <table class="table" id='dataTable2'>
                                <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Alternatif</th>

                                        @foreach ($kriteria->sortBy('urutan_prioritas') as $kriteriaItem)
                                            <th>{{ $kriteriaItem->kode }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matrixPencocokanKriteria as $key => $itemMatrixPencocokanKriteria)
                                        <tr data-id=''>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $itemMatrixPencocokanKriteria['namaAlternatif'] }}</td>

                                            @foreach ($normalisasiMatrixKeputusan[$key] as $normalisasiMatrixKeputusanItem)
                                                <td>{{ $normalisasiMatrixKeputusanItem }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <h3>Bobot Kriteria</h3>
                            <table class="table" id='dataTable3'>
                                <thead>
                                    <tr>
                                        @foreach ($kriteria->sortBy('urutan_prioritas') as $kriteriaItem)
                                            <th>{{ $kriteriaItem->kode }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id=''>
                                        @foreach ($pembobotanKriteria as $key => $itemPembobotanKriteria)
                                            <td>
                                                {{ $itemPembobotanKriteria }}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;">

                            <h3>Nilai Qi</h3>
                            <table class="table" id='dataTable4'>
                                <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Keterangan</th>
                                        <th>Perkalian</th>
                                        <th>Exponential</th>
                                        <th>Nilai Qi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (collect($perangkingan) as $key => $itemPerangkingan)
                                        <tr data-id=''>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $itemPerangkingan['namaAlternatif'] }}</td>
                                            <td>{{ $itemPerangkingan['perkalian'] }}</td>
                                            <td>{{ $itemPerangkingan['exponential'] }}</td>
                                            <td>{{ $itemPerangkingan['hasil'] }}</td>
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
        const locationHrefHapusSemua = "{{ url('perhitungan/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('perhitungan/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('perhitungan/create') }}";
        var columnOrders = [0];
        var urlSearch = "{{ url('perhitungan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
@endsection
