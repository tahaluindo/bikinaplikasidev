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
                <form action="{{url("perhitungan/$perhitungan->id")}}" method="post" id="form-hitung">
                    @for($a = 0; $a <= count($kriteria->sortBy('urutan_prioritas')); $a++)
                        @if($a == 0)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                                <div class="product-sales-chart">
                                    <div style="padding: 20px !important;" class="table-responsive">

                                        <h4 class="text-center"><u>Matriks Konsistensi Kriteria</u></h4>
                                        <table class="table" id='dataTable'>
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                @foreach($kriteria->sortBy('urutan_prioritas')->values() as $key => $item)
                                                    <th title="{{ $item->nama }}">{{ "C" . ($key + 1) }}</th>
                                                @endforeach
                                                <th>PRIORITY VECTOR</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($kriteria->sortBy('urutan_prioritas')->values() as $key1 => $item)
                                                <tr data-id='{{ $item->id }}'>
                                                    <td title="{{ $item->nama }}"><b>{{ "C" . ($key1 + 1) }}</b></td>
                                                    @foreach($kriteria->sortBy('urutan_prioritas')->values() as $key2 => $item2)
                                                        <td>
                                                            @if($key1 == $key2)
                                                                <input placeholder="nilai"
                                                                       class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                       name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                       type="text" min="1" id="nilai" value="1"
                                                                       readonly>
                                                            @else
                                                                <input placeholder="nilai"
                                                                       class="add-input form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                       name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                       type="text" min="1" id="nilai"
                                                                       value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : "" }}"
                                                                >
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                    <td>
                                                        <input placeholder="nilai"
                                                               class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                               name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                               type="text" min="1" id="nilai"
                                                               readonly
                                                               value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2 + 1] : "auto_priority" }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                @foreach($kriteria->sortBy('urutan_prioritas')->values() as $key2 => $item2)
                                                    <td>
                                                        <input placeholder="nilai"
                                                               class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                               name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                               type="text" min="1" id="nilai"
                                                               readonly
                                                               value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 1][$key2] : "auto_sum" }}">
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly
                                                           value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 1][$key2 + 1] : "auto_sum_priority" }}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="{{ $kriteria->count() + 1 }}">Principle Eign Value</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly
                                                           value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][0] : "auto_principle_eign_value" }}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="{{ $kriteria->count() + 1 }}">Consistency Index</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly
                                                           value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][1] : "auto_consistency_index" }}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="{{ $kriteria->count() + 1 }}">Consistency Ratio</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly
                                                           value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][2] : "auto_consistency_ratio" }}">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                                <div class="product-sales-chart">
                                    <div style="padding: 20px !important;" class="table-responsive">

                                        <h4 class="text-center"><u>Matriks Konsistensi {{ $kriteria[$a - 1]->nama }}</u>
                                        </h4>
                                        <table class="table" id='dataTable'>
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                @foreach($alternatif->sortBy('urutan_prioritas')->values() as $key => $item)
                                                    <th title="{{ $item->nama }}">{{ "SC" . ($key + 1) }}</th>
                                                @endforeach
                                                <th>PRIORITY VECTOR</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($alternatif->sortBy('urutan_prioritas')->values() as $key1 => $item)
                                                <tr data-id='{{ $item->id }}'>
                                                    <td title="{{ $item->nama }}"><b>{{ "SC" . ($key1 + 1) }}</b>
                                                    </td>
                                                    @foreach($alternatif->sortBy('urutan_prioritas')->values() as $key2 => $item2)
                                                        <td>
                                                            @if($key1 == $key2)
                                                                <input placeholder="nilai"
                                                                       class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                       name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                       type="text" min="1" id="nilai" value="1"
                                                                       readonly>
                                                            @else
                                                                <input placeholder="nilai"
                                                                       class="add-input form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                       name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                       type="text" min="1" id="nilai"
                                                                       value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : "" }}"
                                                                >
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                    <td>
                                                        <input placeholder="nilai"
                                                               class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                               name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                               type="text" min="1" id="nilai"
                                                               readonly
                                                               value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2 + 1] : "auto_priority" }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>


                                                @foreach($alternatif->sortBy('urutan_prioritas')->values() as $key2 => $item2)
                                                    <td>
                                                        <input placeholder="nilai"
                                                               class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                               name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                               type="text" min="1" id="nilai"
                                                               readonly
                                                               value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 1][$key2] : "auto_sum" }}">
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly
                                                           value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 1][$key2 + 1] : "auto_sum_priority" }}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="{{ $alternatif->count() + 1 }}">Principle Eign Value</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly
                                                           value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][0] : "auto_principle_eign_value" }}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="{{ $alternatif->count() + 1 }}">Consistency Index</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly
                                                           value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][1] : "auto_consistency_index" }}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="{{ $alternatif->count() + 1 }}">Consistency Ratio</td>
                                                <td>
                                                    <input placeholder="nilai"
                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                           type="text" min="1" id="nilai"
                                                           readonly
                                                           value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1 + 2][2] : "auto_consistency_ratio" }}">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                </form>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 30px">
                    <div class="product-sales-chart">
                        <div style="padding: 20px !important;" class="table-responsive">

                            <h4 class="text-center"><u>Data Alternatif</u>
                            </h4>

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    @foreach($kriteria->sortBy('urutan_prioritas')->values() as $item)
                                        <th title="{{ $item->nama }}">{{ $item->nama }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alternatif->sortBy('urutan_prioritas')->values() as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>

                                        @forelse($item->nilai_kriteria ?? [] as $itemNilaiKriteria)
                                            <td>{{ $itemNilaiKriteria }}</td>
                                        @empty
                                            <td></td>
                                        @endforelse
                                        <td>{{ $item->nilai_kriteria_total }}</td>
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

                            <h4 class="text-center"><u>Hasil</u>
                            </h4>

                            @if(!isset($hasil_hitung))
                                <button class="btn btn-xl btn-primary" form="form-hitung">HITUNG</button>
                            @else
                                <button class="btn btn-xl btn-primary" form="form-hitung" name="save" value="save">
                                    SIMPAN
                                </button>
                                <button class="btn btn-xl btn-primary" form="form-hitung">HITUNG</button>
                                <button class="btn btn-xl btn-primary" form="form-hitung" name="print" value="print">
                                    PRINT
                                </button>
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




