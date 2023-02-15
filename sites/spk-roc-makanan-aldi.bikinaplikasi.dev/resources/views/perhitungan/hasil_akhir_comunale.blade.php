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
                            <label for="status" class="control-label">{{ 'Comunale Id' }}</label>

                            <div class="col-md-12">
                                <select name="comunale_id" class="form-control form-control-line" id="comunale_id">
                                    <option value=""
                                        {{ old('comunale_id') == '' || request()->comunale_id == '' ? 'selected' : '' }}>--
                                        Semua --</option>
                                    @foreach ($comunale as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('comunale_id') == $item->id || request()->comunale_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>

                                @error('comunale_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                            @if(request()->comunale_id )
                                            @if($itemPerangkingan['comunale_id'] == request()->comunale_id)
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
                                            @endif
                                            @else
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
                                            @endif
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
