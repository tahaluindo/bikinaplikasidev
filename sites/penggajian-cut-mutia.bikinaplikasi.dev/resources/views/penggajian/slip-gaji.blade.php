<style>
    .slip-gaji {
        padding: 20px;
    }

    .slip-gaji {
        width: 960px;
        margin: auto;
        text-align: initial;
    }


    * {
        color-adjust: exact !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    /*tr:nth-child(even) {*/
    /*    background-color: #dddddd;*/
    /*}*/
</style>

<body style="text-align: center;" onload="print()">
<div class="slip-gaji">
    <h1 style="text-align: center; margin: initial;">{{ env('OBJECT_NAME') }}</h1>
    <div style="text-align: center;">{{ env('object_location') }}</div>
    <div style="border: 1px solid black;"></div>
    <div style="text-align: center;"><u>SLIP GAJI KARYAWAN</u><br></div>
    <div style="text-align: center;">PERIODE: 01-{{ strtoupper(\Carbon\Carbon::parse(date("Y-m-d", strtotime("$periode-01")))->addDays(-1)->format("F")) }}-{{ \Carbon\Carbon::parse(date("Y-m-d", strtotime("$periode-01")))->addDays(-1)->format("Y") }}
        {{ $penggajian->tanggal }}</div>
    <br>
    <div style="border: 1px solid black;"></div>
    <p>
        NIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $penggajian->karyawan->nik }}
        <br>
        NAMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $penggajian->karyawan->nama }}<br>
        JABATAN&nbsp;&nbsp;: {{ @$penggajian->karyawan->riwayat_jabatans->where('status', 'Aktif')->first()->nama_jabatan }}
        <br>
        STATUS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $penggajian->karyawan->status }}<br>
    <p>

    <div>
        <div style="width:80%; display: inline-block;">
            <u><h4 style="margin: 50px 0 0 0;">PENGHASILAN &nbsp;&nbsp;&nbsp;</h4></u>

            <table>
                <thead>
                <tr>
                    <th>Jenis Pekerjaan</th>
                    <th></th>
                    <th>Jumlah</th>
                </tr>
                </thead>
                <tr>
                    <td>Gaji Pokok</td>
                    <td>Gaji bulan {{ $penggajian->periode }} {{ $penggajian->tahun }}
                        ({{ cal_days_in_month(CAL_GREGORIAN,date('m', strtotime("$periode-01")),$penggajian->tahun) - $total_hari_cuti }}
                        hari)
                    </td>
                    <td>{{ toIdr($penggajian->karyawan->riwayat_jabatans->where('status', 'Aktif')->first()->gaji_pokok) }}</td>
                </tr>
                <tr>
                    <td>Tonase Panen</td>
                    <td>{{ $penggajian->tonase_panen }}</td>
                    <td>@php
                            echo @toIdr(explode("x", $penggajian->tonase_panen)[0] * explode("x", $penggajian->tonase_panen)[1])
                        @endphp</td>
                </tr>
                <tr>
                    <td>Upah Harian Piringan</td>
                    <td>{{ $rancangan_upah_harian->first() ? $rancangan_upah_harian->first()->harga_satuan : "" }}
                        x {{ $rancangan_upah_harian->first() ? $rancangan_upah_harian->first()->satuan : "" }}</td>
                    <td>{{ toIdr($rancangan_upah_harian->first() ? $rancangan_upah_harian->first()->total : 0) }}</td>
                </tr>
                <tr>
                    <td>Bonus</td>
                    <td>{{ toIdr($penggajian->bonus) }}</td>
                    <td>{{ toIdr($penggajian->bonus) }}</td>
                </tr>
                <tr>
                    <th>Total A</th>
                    <th></th>
                    <th>{{ toIdr($penggajian->karyawan->riwayat_jabatans->where('status', 'Aktif')->first()->gaji_pokok + $rancangan_upah_harian->sum('total') + $penggajian->bonus + @explode("x", $penggajian->tonase_panen)[0] * @explode("x", $penggajian->tonase_panen)[1]) }}</th>
                </tr>
            </table>

            <u><h4 style="margin: 50px 0 0 0;">POTONGAN &nbsp;&nbsp;&nbsp;</h4></u>
            
             @php
                        $total_potongan_cuti = $total_hari_cuti * $cuti->sum('potongan');
                    @endphp
                    
            <table>
                <thead>
                <tr>
                    <th>Jenis Potongan</th>
                    <th>Jumlah</th>
                </tr>
                </thead>
                <tr>
                    <td>Pinjaman</td>
                    <td>{{ toIdr(explode(",", $penggajian->hutang) ? array_sum(explode(",", $penggajian->hutang)) : 0) }}</td>
                </tr>
                <tr>
                    <td>Bpjs Kesehatan x{{ $penggajian->karyawan->tanggungan }}</td>
                    <td>{{ toIdr($penggajian->bpjs * $penggajian->karyawan->tanggungan) }}</td>
                </tr>
                <tr>
                    <td>Cuti x{{ $total_hari_cuti }} Hari</td>
                    <td>{{ toIdr($total_potongan_cuti) }}</td>
                </tr>
                <tr>
                   
                    <th>Total B</th>
                    <th>{{ toIdr((explode(",", $penggajian->hutang) ? array_sum(explode(",", $penggajian->hutang)) : 0) + ($penggajian->bpjs * $penggajian->karyawan->tanggungan) + $total_potongan_cuti) }}</th>
                </tr>

            </table>

        </div>

    </div>

    <div style="padding: 20px; background-color: lightgrey; margin-top: 40px; text-align: center">
        <h2 style="margin: initial;">TOTAL PENERIMAAN BERSIH
            : {{ toIdr(@explode("x", $penggajian->tonase_panen)[0] * @explode("x", $penggajian->tonase_panen)[1] + $penggajian->karyawan->riwayat_jabatans->where('status', 'Aktif')->first()->gaji_pokok + $rancangan_upah_harian->sum('total') - ($penggajian->bpjs * $penggajian->karyawan->tanggungan) + $penggajian->bonus - $total_potongan_cuti - (explode(",", $penggajian->hutang) ? array_sum(explode(",", $penggajian->hutang)) : 0)) }}</strong></h2>
        <i>Terbilang
            : {{ terbilang(@explode("x", $penggajian->tonase_panen)[0] * @explode("x", $penggajian->tonase_panen)[1] + $penggajian->karyawan->riwayat_jabatans->where('status', 'Aktif')->first()->gaji_pokok + $rancangan_upah_harian->sum('total') - ($penggajian->bpjs * $penggajian->karyawan->tanggungan) + $penggajian->bonus - $total_potongan_cuti - (explode(",", $penggajian->hutang) ? array_sum(explode(",", $penggajian->hutang)) : 0)) }}</strong></i>
    </div>

    <div style="width: 45%; display: inline-block; text-align: center; margin-top: 75px;">
        Diterima Oleh
        <div style="padding-top: 100px;">

        </div>
        {{ $penggajian->karyawan->nama }}
    </div>

    <div style="width: 45%; display: inline-block; text-align: center; margin-top: 75px;">
        Admin Keuangan
        <div style="padding-top: 100px;">

        </div>
        Yurnila Wati
    </div>
</div>

<script>
    window.print();
</script>
</body>

