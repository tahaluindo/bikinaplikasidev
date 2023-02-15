@extends('layouts.index')

@section('content')

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class='row'>
                        <div class='col-md-6 col-sm-6 col-xs-6'>
                            <button type="button" class="btn btn-success waves-effect" onclick="exportToExcel('xlsx');">
                                <i class="material-icons">print</i>
                                <span>Print Ke Excel</span>
                            </button>

                            <button type="button" class="btn btn-info waves-effect"
                                    onclick="printDiv('laporanLabaRugi');">
                                <i class="material-icons">html</i>
                                <span>Print Ke Html</span>
                            </button>
                        </div>

                        <div class='col-md-6 col-sm-6 col-xs-6'>
                            <form class="right" action="{{ url('laporan/show_from_periode') }}" method="post">
                                @csrf
                                <div class="row clearfix">

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="awal_bulan" id='awal_bulan'
                                                       value='{{ $awal_bulan ?? date('Y-m-d') }}' class="form-control"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="form-group">
                                            <div>
                                                <label for="bulan">Sampai: </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="akhir_bulan" id='akhir_bulan'
                                                       value='{{ $akhir_bulan ?? date('Y-m-d') }}' class="form-control"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Go
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="body" id='laporanLabaRugi' style="-webkit-print-color-adjust: exact;">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover labaRugi">
                            <caption>
                                <h2 class="text-center">
                                    <div>Kos Kosan</div>
                                    <div>Laporan</div>
                                    <div>Periode {{ $awal_bulan ?? date('d-m-Y') }}
                                        S/D {{ $akhir_bulan ?? date('d-m-Y') }} </div>
                                </h2>
                            </caption>
                            <thead>
                            <tr class="active">
                                <th class="text-center">Jenis / Tggl</th>
                                <th class="text-center" colspan="2">Keterangan</th>
                                <th class="text-center">DEBIT</th>
                                <th class="text-center">KREDIT</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr class="active">
                                <th colspan="5">Sudah Bayar</th>
                            </tr>
                            @foreach($sudah_bayars as $sudah_bayar)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($sudah_bayar->created_at)) }}</td>
                                    <td colspan="2">
                                        - Tagihan: <a href="{{ url("perpanjangan_sewa/$sudah_bayar->tagihan_id") }}"
                                                      target='_blank'>{{ $sudah_bayar->tagihan_id }}</a>,
                                        <a href="{{ url("penyewa/{$sudah_bayar->tagihan->penyewa->id}") }}"
                                           target='_blank'>{{ $sudah_bayar->tagihan->penyewa->nama }}</a>, {{ $sudah_bayar->methode }}
                                        , {{ $sudah_bayar->status }}
                                    </td>
                                    <td class="text-center">
                                        {{ $format_idr($sudah_bayar->total) }}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="5"></td>
                            </tr>

                            <tr class="active">
                                <th colspan="5">Pemasukkan Lain-Lain</th>

                            </tr>
                            @foreach($pemasukan_lain_lains as $pemasukan_lain_lain)
                                <tr>
                                    <td>{{ $pemasukan_lain_lain->tggl }}</td>
                                    <td colspan="2">
                                        {{ $pemasukan_lain_lain->keterangan }}
                                    </td>
                                    <td class="text-center">
                                        {{ $format_idr($pemasukan_lain_lain->total) }}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="5"></td>
                            </tr>

                            <tr class="active">
                                <th colspan="5">Pengeluaran Lain-Lain</th>
                            </tr>
                            @foreach($pengeluaran_lain_lains as $pengeluaran_lain_lain)
                                <tr>
                                    <td>{{ $pengeluaran_lain_lain->tggl }}</td>
                                    <td colspan="2">
                                        {{ $pengeluaran_lain_lain->keterangan }}
                                    </td>
                                    <td>
                                    </td>
                                    <td class="text-center">
                                        {{ $format_idr($pengeluaran_lain_lain->total) }}
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="5"></td>
                            </tr>

                            <tr class="active">
                                <th colspan="3">Total</th>
                                <th class="text-center">
                                    {{ $format_idr($total_debit) }}
                                </th>
                                <th class="text-center">
                                    {{ $format_idr($total_kredit) }}
                                </th>
                            <tr>

                            <tr class="bg-cyan">
                                <th colspan='3'>
                                    @if($laba_rugi < 0)
                                        <s>Laba</s> /<b>Rugi</b>
                                    @else
                                        <b>Laba</b> / <s>Rugi</s>
                                    @endif
                                </th>
                                <th class="active text-success text-center">
                                    {{ $laba_rugi < 0 ? "": $format_idr($laba_rugi) }}
                                </th>
                                <th class='active text-danger text-center'>
                                {{ $laba_rugi < 0 ? $format_idr(abs($laba_rugi)) :  ""}}
                                </td>
                            <tr>
                            </tbody>
                        </table>
                        <div style="width: 25%; float: right; text-align: center; margin-top: 20px;">
                            {{ 'Kota Jambi' }}<p>
                            {{ date('Y-m-d') }}
                            <div style="height: 50px;">

                            </div>
                            {{ "Suwarko" }}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <script>
        function printDiv(divName) {
            const originalContents = document.body.innerHTML;
            for (let i = 0; i < document.getElementsByTagName('a').length; i++) {
                document.getElementsByTagName('a')[i].removeAttribute('href')

            }

            document.body.innerHTML = document.getElementById(divName).innerHTML;

            window.print();
            window.location.href = '';
            document.body.innerHTML = originalContents;
        }
    </script>

@endsection
