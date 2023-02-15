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

                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Nilai Qi</h3>
                                </div>
                                <div class="col-md-6">
                                    <input class='btn btn-success btn-lg' type="button" onclick="printDiv('printableArea')"
                                        value="Cetak Data" style="float: right;">

                                </div>
                            </div>
                            <div id="printableArea">
                                <table class="table" id=''>
                                    <thead>
                                        <tr>
                                            <th width=2>Ranking</th>
                                            <th>Brand</th>
                                            <th>Genre</th>
                                            <th>Perkalian</th>
                                            <th>Exponential</th>
                                            <th>Nilai Qi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (collect($perangkingan)->sortByDesc('hasil') as $key => $itemPerangkingan)
                                            <tr data-id=''>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>{{ $itemPerangkingan['namaAlternatif'] }}</td>
                                                <td>{{ $itemPerangkingan['genre'] }}</td>
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
