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

<body class="container">

    <h4 class="text-center">
        {{ $sekolah->nama }} <br>
        Laporan Transaksi Lainnya <br>
        {{ $tanggal_awal }} sd {{ $tanggal_akhir }} <br>


    </h4>

    <div class="table-responsive" id='printTable'>
        <table class="table table-bordered table-condensed table-striped table-sm">
            <thead class="bg-success text-white">
                <tr>
                    <th width=2>No</th>
                    <th>Tanggal</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Debit</th>
                    <th class="text-center">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total_debit = 0;
                $total_kredit = 0;
                @endphp

                @foreach ($transaksi_lainnya_details as $index => $transaksi_lainnya_detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaksi_lainnya_detail->tanggal_bayar }}</td>
                    <td>{{ $transaksi_lainnya_detail->transaksi_lainnya->nama }}</td>
                    @if($transaksi_lainnya_detail->transaksi_lainnya->jenis == "Pemasukan")
                    <td class="text-center">{{ toIdr($transaksi_lainnya_detail->nominal_dibayar) }}</td>
                    <td class="text-center"> {{ toIdr(0) }} </td>

                    {{-- hitung total debit --}}
                    @php
                    $total_debit += $transaksi_lainnya_detail->nominal_dibayar;
                    @endphp

                    @else
                    <td class="text-center"> {{ toIdr(0) }} </td>
                    <td class="text-center">{{ toIdr($transaksi_lainnya_detail->nominal_dibayar) }}</td>

                    {{-- hitung total kredit --}}
                    @php
                    $total_kredit += $transaksi_lainnya_detail->nominal_dibayar;
                    @endphp
                    @endif
                </tr>
                @endforeach
                <tr>
                    <th colspan="3" class="text-center">
                        Total
                    </th>
                    <th class="text-center">{{ toIdr($total_debit) }}</th>
                    <th class="text-center"> {{ toIdr($total_kredit) }} </th>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
