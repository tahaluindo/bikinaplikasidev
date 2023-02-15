@extends('layouts.app2')

<style>
    .tab-pane.fade {
        display: none;
    }

    .active.in {
        display: inline-block;
    }

    .show {
        all: initial !important;
    }

    .footer-copyright-area {
        position: fixed;
        bottom: 0;
        width: 100%;
        margin-top: 23px;
    }
</style>

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
                <div class="col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-bottom: 20px;">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                               role="tab"
                               aria-controls="pills-home" aria-selected="true"> Kriteria </a>
                        </li>

                        @for($a = 1; $a <= count($kriteria->sortBy('urutan_prioritas')); $a++)
                            <li class="nav-item">
                                <a class="nav-link" id="pills-kriteria-{{ $kriteria[$a - 1]->id }}-tab"
                                   data-toggle="pill"
                                   href="#pills-kriteria-{{ $kriteria[$a - 1]->id }}" role="tab"
                                   aria-controls="pills-kriteria-{{ $kriteria[$a - 1]->id }}"
                                   aria-selected="false">{{ $kriteria[$a - 1]->nama }}</a>
                            </li>
                        @endfor

                        <li class="nav-item">
                            <a class="nav-link" id="pills-data-masyarakat-tab" data-toggle="pill"
                               href="#pills-data-masyarakat" role="tab"
                               aria-controls="pills-data-masyarakat" aria-selected="true">Data Masyarakat</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" id="pills-hasil-tab" data-toggle="pill" href="#pills-hasil" role="tab"
                               aria-controls="pills-hasil" aria-selected="true">
                                HASIL
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <form action="{{url("perhitungan/$perhitungan->id")}}" method="post" id="form-hitung">

                <div class="row tab-content mt-5" id="pills-tabContent">
                    <div class="col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        @for($a = 0; $a <= count($kriteria->sortBy('urutan_prioritas')); $a++)
                            @if($a == 0)
                                <div class="tab-pane fade active in"
                                     id="pills-home"
                                     aria-labelledby="pills-home-tab" style="margin-bottom: 30px">
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
                                                        <td title="{{ $item->nama }}"><b>{{ "C" . ($key1 + 1) }}</b>
                                                        </td>
                                                        @foreach($kriteria->sortBy('urutan_prioritas')->values() as $key2 => $item2)
                                                            <td>
                                                                @if($key1 == $key2)
                                                                    <input placeholder="nilai"
                                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                           type="text" min="1" id="nilai" value="1"
                                                                           readonly>
                                                                @else
                                                                    @if($key2 < $key1)
                                                                        <input placeholder="nilai"
                                                                               class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                               name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                               type="text" min="1" id="nilai"
                                                                               readonly
                                                                               value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : "auto" }}">
                                                                    @else
                                                                        <input placeholder="nilai"
                                                                               class="add-input form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                               name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                               type="text" min="1" id="nilai"
                                                                               value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : "" }}"
                                                                               required>
                                                                    @endif
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
                                <div class="tab-pane fade"
                                     id="pills-kriteria-{{ $kriteria[$a - 1]->id }}"
                                     aria-labelledby="pills-kriteria-{{ $kriteria[$a - 1]->id }}" role="tabpanel"
                                     style="margin-bottom: 30px">
                                    <div class="product-sales-chart">
                                        <div style="padding: 20px !important;" class="table-responsive">

                                            <h4 class="text-center"><u>Matriks
                                                    Konsistensi {{ $kriteria[$a - 1]->nama }}</u>
                                            </h4>
                                            <table class="table" id='dataTable'>
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    @foreach($kriteria[$a - 1]->kriteria_details->sortBy('urutan_prioritas')->values() as $key => $item)
                                                        <th title="{{ $item->keterangan }}">{{ "SC" . ($key + 1) }}</th>
                                                    @endforeach
                                                    <th>PRIORITY VECTOR</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($kriteria[$a - 1]->kriteria_details->sortBy('urutan_prioritas')->values() as $key1 => $item)
                                                    <tr data-id='{{ $item->id }}'>
                                                        <td title="{{ $item->keterangan }}">
                                                            <b>{{ "SC" . ($key1 + 1) }}</b>
                                                        </td>
                                                        @foreach($kriteria[$a - 1]->kriteria_details->sortBy('urutan_prioritas') as $key2 => $item2)
                                                            <td>
                                                                @if($key1 == $key2)
                                                                    <input placeholder="nilai"
                                                                           class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                           name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                           type="text" min="1" id="nilai" value="1"
                                                                           readonly>
                                                                @else
                                                                    @if($key2 < $key1)
                                                                        <input placeholder="nilai"
                                                                               class="form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                               name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                               type="text" min="1" id="nilai"
                                                                               readonly
                                                                               value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : "auto" }}">
                                                                    @else
                                                                        <input placeholder="nilai"
                                                                               class="add-input form-control form-control-line @error('nilai') is-invalid @enderror"
                                                                               name="matriks_konsistensi[{{ $a }}][nilai][]"
                                                                               type="text" min="1" id="nilai"
                                                                               value="{{ isset($hasil_hitung) ? $hasil_hitung[$a][$key1][$key2] : "" }}"
                                                                               required>
                                                                    @endif
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


                                                    @foreach($kriteria[$a - 1]->kriteria_details->sortBy('urutan_prioritas')->values() as $key2 => $item2)
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
                            @endif
                        @endfor

                        <div class="tab-pane fade"
                             id="pills-data-masyarakat"
                             aria-labelledby="pills-data-masyarakat-tab" role="tabpanel"
                             style="margin-bottom: 30px">
                            <div class="product-sales-chart">
                                <div style="padding: 20px !important;" class="table-responsive">

                                    <h4 class="text-center"><u>Data Masyarakat</u>
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
                                        @foreach($alternatif as $item)
                                            <tr data-id='{{ $item->id }}'>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>{{ $item->nama }}</td>

                                                @foreach($item->alternatif_details as $itemAlternatifDetail)
                                                    <td>{{ $itemAlternatifDetail->kriteria_detail->keterangan }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade"
                             id="pills-hasil"
                             aria-labelledby="pills-hasil-tab" role="tabpanel"
                             style="margin-bottom: 30px">
                            <div class="product-sales-chart">
                                <div style="padding: 20px !important;" class="table-responsive">

                                    <h4 class="text-center"><u>Hasil</u>
                                    </h4>

                                    @if(!isset($hasil_hitung))
                                        <button type="submit" class="btn btn-xl btn-primary btn-block"
                                                id="btn-submit-form-hitung">HITUNG
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-xl btn-primary btn-block"
                                                onclick="printDiv('print')">PRINT
                                        </button>

                                        <div id="print">

                                            <table class="table" id='dataTable'>
                                                <thead>
                                                <tr>
                                                    <th width=2>#</th>
                                                    <th>Nama</th>
                                                    @foreach($kriteria->sortBy('urutan_prioritas')->values() as $item)
                                                        <th>{{ $item->nama }}</th>
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
                                                        <th>{{ $item->nilai_kriteria_total }}</th>
                                                        <th>{{ $loop->iteration }}</th>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
