<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- pakai bootstrap dari template monster-admin (biar sama aj) --}}
    <link href="{{ url('monster-admin-lite/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body class="">

    <h4 class="text-center">
        {{ $sekolah->nama }} <br>
        Laporan Pembayaran Santri <br>
        {{ $tanggal_awal }} sd {{ $tanggal_akhir }} <br>
    </h4>

    <div class="table-responsive" id='printTable'>
        <table class="table table-bordered table-condensed table-striped table-sm">
            <thead class="bg-success text-white">
                <tr>
                    <th width=2>No</th>
                    <th>Tanggal</th>
                    <th class="text-center">Kelas</th>
                    <th>Nama</th>
                    <th>Spp</th>
                    <th>Uang Makan</th>
                    <th>Belum</th>
                    <th>Potongan</th>
                    <th>Total</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran_santri_details as $index => $pembayaran_santri_detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembayaran_santri_detail->tanggal_bayar }}</td>
                    <td class="text-center">{{ $pembayaran_santri_detail->user->kelas->nama }}</td>
                    <td>{{ $pembayaran_santri_detail->user->nama }}</td>
                    <td>{{ toIdr($pembayaran_santri_detail->nominal_spp_dibayar / (100 - $pembayaran_santri_detail->potongan) * 100) }}</td>
                    <td>{{ toIdr($pembayaran_santri_detail->nominal_uang_makan_dibayar) }}</td>

                    @if($pembayaran_santri_detail->nominal_belum_dibayar < 0)
                    <td><b>-</b>{{ toIdr(abs($pembayaran_santri_detail->nominal_belum_dibayar)) }}</td>
                    @else
                    <td>{{ toIdr($pembayaran_santri_detail->nominal_belum_dibayar) }}</td>
                    @endif

                    <td>{{ $pembayaran_santri_detail->potongan }}%</td>

                    @if($pembayaran_santri_detail->nominal_belum_dibayar < 0)
                    <td>{{ toIdr($pembayaran_santri_detail->nominal_spp_dibayar +  $pembayaran_santri_detail->nominal_uang_makan_dibayar) }}</td>
                    @else
                    <td>{{ toIdr($pembayaran_santri_detail->nominal_spp_dibayar +  $pembayaran_santri_detail->nominal_uang_makan_dibayar - $pembayaran_santri_detail->nominal_belum_dibayar) }}</td>
                    @endif

                    <td class="text-center">{{ $pembayaran_santri_detail->status }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-center">
                        Total
                    </th>
                    <th>{{ toIdr($pembayaran_santri_details->sum('nominal_spp_dibayar')) }}</th>
                    <th>{{ toIdr($pembayaran_santri_details->sum('nominal_uang_makan_dibayar')) }}</th>
                    <th colspan="2">{{ toIdr($pembayaran_santri_details->sum('nominal_belum_dibayar')) }}</th>
                    <th colspan="2">{{ toIdr($pembayaran_santri_details->sum('nominal_spp_dibayar') + $pembayaran_santri_details->sum('nominal_uang_makan_dibayar')) }}</th>
                </tr>
            </tbody>
        </table>
    </div>


    <script>
        window.print();
    </script>
</body>

</html>
