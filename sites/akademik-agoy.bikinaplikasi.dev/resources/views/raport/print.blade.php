<style>
    #tableData {
        width: 100%;
        margin: auto;
    }

    #tableRaport td {
        text-align: center;
    }

    th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    #tableHead1, #tableHead1 th, #tableHead1 td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    table {
        border: 0px solid black !important;
        border-collapse: collapse !important;
    }

    .text-left {
        text-align: left !important;
        padding-left: 5px;
    }

    .text-justify {
        text-align: justify !important;
        padding-left: 5px;
        word-wrap: break-word;
    }

    td {
        padding: 2.5px;
    }

    @media print {
        .pagebreak {
            page-break-before: always;
        }

        /* page-break-after works, as well */
    }
</style>

<div id='tableData'>
    <div style="width: 65%;">
        <table style="width: 100%; display: inline-block; margin-right: 110px;" id='tableHead1'>
            <tr>
                <td>Nama Sekolah</td>
                <td style="border-left: 0px;">{{ env('APP_OBJECT_NAME') }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ env('APP_OBJECT_LOCATION') }}</td>
            </tr>
            <tr>
                <td>Nama Peserta Didik</td>
                <td>{{ ucwords($raport->user->nama) }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>{{ $raport->user->no_identitas }}</td>
            </tr>
        </table>
    </div>

    <div style="width: 25%; float: right; margin-top: -75px;">
        <table style="width: 100%; display: inline-block; " id='tableHead2'>

            <tr>
                <td>Kelas</td>
                <td>{{ $raport->user->kelas->nama }}</td>
            </tr>

            <tr>
                <td>Semester</td>
                <td>{{ $raport->semester }}</td>
            </tr>

            <tr>
                <td>Tahun Pelajaran</td>
                <td>{{ $raport->tahun }}/{{ $raport->tahun + 1 }}</td>
            </tr>
        </table>
    </div>

    <div style='margin-top: 20px;'></div>

    <h2 style="text-align: center">Capaian Hasil Belajar</h2>
    <h3>A. Sikap</h3>
    <strong>1. Sikap Spiritual</strong>
    <p>

    <table style='width: 100%;' id='tableRaport'>
        <tr>
            <td width="20%">Predikat</td>
            <td width="80%">Deskripsi</td>
        </tr>

        <tr style="height: 150px; word-break: break-word;">

            <td>{{ $hasil_nilai->predikat_sikap_spiritual }}</td>
            <td style="text-align: left">
                {{ $hasil_nilai->deskripsi_sikap_spiritual }}
            </td>
        </tr>
    </table>


    <p>
        <strong>2. Sikap Sosial</strong>
    <p>

    <table style='width: 100%;' id='tableRaport'>
        <tr>
            <td width="20%">Predikat</td>
            <td width="80%">Deskripsi</td>
        </tr>

        <tr style="height: 150px; word-break: break-word;">

            <td>{{ $hasil_nilai->predikat_sikap_sosial }}</td>
            <td style="text-align: left">
                {{ $hasil_nilai->deskripsi_sikap_sosial }}
            </td>
        </tr>
    </table>

    <div style='margin-top: 40px;'></div>

    <div style="border-bottom: 2px solid grey; height: 200px;">
        <div style='width: 25%; float: right'>
            Jambi, {{ date("d F Y") }}<br>
            Wali Kelas,
            <div style="height: 60px;">

            </div>
            <strong>Maina Efnita, S.Pd,</strong><br>
            NIP. 196805251996022002
        </div>
    </div>


    {{-- Keterampilan --}}
    <div style='margin-top: 20px;' class="pagebreak"></div>


    <div style="width: 65%;">
        <table style="width: 100%; display: inline-block; margin-right: 110px;" id='tableHead1'>
            <tr>
                <td>Nama Sekolah</td>
                <td style="border-left: 0px;">{{ env('APP_OBJECT_NAME') }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ env('APP_OBJECT_LOCATION') }}</td>
            </tr>
            <tr>
                <td>Nama Peserta Didik</td>
                <td>{{ ucwords($raport->user->nama) }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>{{ $raport->user->no_identitas }}</td>
            </tr>
        </table>
    </div>

    <div style="width: 25%; float: right; margin-top: -75px;">
        <table style="width: 100%; display: inline-block; " id='tableHead2'>

            <tr>
                <td>Kelas</td>
                <td>{{ $raport->user->kelas->nama }}</td>
            </tr>

            <tr>
                <td>Semester</td>
                <td>{{ $raport->semester }}</td>
            </tr>

            <tr>
                <td>Tahun Pelajaran</td>
                <td>{{ $raport->tahun }}/{{ $raport->tahun + 1 }}</td>
            </tr>
        </table>
    </div>

    <div style='margin-top: 20px;'></div>

    <h3>B. Pengetahuan</h3>
    <strong>Kriteria Ketuntasan Minimal = 65</strong>
    <p>

    <table style='width: 100%;' id='tableRaport'>
        <tr rowspan="2">
            <td colspan=2 rowspan="2">Mata Pelajaran</td>
            <td colspan="6">Pengetahuan</td>
        </tr>

        <tr>

            <td>Nilai</td>
            <td>Predikat</td>


            <td colspan="3">Deskripsi</td>
        </tr>

        {{-- kelompok dan nilai --}}
        <tr>
            <td colspan="6" class="text-left">
                <strong>Kelompok A (Wajib)</strong>
            </td>

        </tr>

        @foreach($nilai_detail_as as $key => $nilai_detail_a)
            <tr>
                <td width=5 style='padding: 5px;'>
                    {{ $loop->iteration }}.
                </td>

                <td class="text-left">
                    {{ $nilai_detail_a->nilai->mapel_detail->mapel->nama }}
                </td>

                <td>{{ $nilai_detail_a->rata_rata_pengetahuan }}</td>
                <td>{{ $nilai_detail_a->predikat_pengetahuan }}</td>


                <td>{{ $nilai_detail_a->deskripsi_pengetahuan }}</td>

            </tr>
        @endforeach

        <tr>
            <td colspan="7" class="text-left">
                <strong>Kelompok B (Wajib)</strong>
            </td>
        </tr>

        @foreach($nilai_detail_bs as $key => $nilai_detail_b)
            <tr>
                <td width=5 style='padding: 5px;'>
                    {{ $loop->iteration }}.
                </td>

                <td class="text-left">
                    {{ $nilai_detail_b->nilai->mapel_detail->mapel->nama }}
                </td>

                <td>{{ $nilai_detail_b->rata_rata_pengetahuan }}</td>
                <td>{{ $nilai_detail_b->predikat_pengetahuan }}</td>

                <td>{{ $nilai_detail_b->deskripsi_pengetahuan }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="7" class="text-left">
                <strong>Kelompok C (Peminatan)</strong>
            </td>
        </tr>

        @foreach($nilai_detail_cs as $key => $nilai_detail_c)
            <tr>
                <td width=5 style='padding: 5px;'>
                    {{ $loop->iteration }}.
                </td>

                <td class="text-left">
                    {{ $nilai_detail_c->nilai->mapel_detail->mapel->nama }}
                </td>

                <td>{{ $nilai_detail_c->rata_rata_pengetahuan }}</td>
                <td>{{ $nilai_detail_c->predikat_pengetahuan }}</td>

                <td>{{ $nilai_detail_c->deskripsi_pengetahuan }}</td>
            </tr>
        @endforeach

    </table>

    <div style="border-bottom: 2px solid grey; height: 200px;"></div>
















    {{-- Keterampilan --}}
    <div style='margin-top: 20px;' class="pagebreak"></div>

    <div style="width: 65%;">
        <table style="width: 100%; display: inline-block; margin-right: 110px;" id='tableHead1'>
            <tr>
                <td>Nama Sekolah</td>
                <td style="border-left: 0px;">{{ env('APP_OBJECT_NAME') }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ env('APP_OBJECT_LOCATION') }}</td>
            </tr>
            <tr>
                <td>Nama Peserta Didik</td>
                <td>{{ ucwords($raport->user->nama) }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>{{ $raport->user->no_identitas }}</td>
            </tr>
        </table>
    </div>

    <div style="width: 25%; float: right; margin-top: -75px;">
        <table style="width: 100%; display: inline-block; " id='tableHead2'>

            <tr>
                <td>Kelas</td>
                <td>{{ $raport->user->kelas->nama }}</td>
            </tr>

            <tr>
                <td>Semester</td>
                <td>{{ $raport->semester }}</td>
            </tr>

            <tr>
                <td>Tahun Pelajaran</td>
                <td>{{ $raport->tahun }}/{{ $raport->tahun + 1 }}</td>
            </tr>
        </table>
    </div>

    <div style='margin-top: 20px;'></div>

    <h3>C. Keterampilan</h3>
    <strong>Kriteria Ketuntasan Minimal = 65</strong>
    <p>

    <table style='width: 100%;' id='tableRaport'>
        <tr rowspan="2">
            <td colspan=2 rowspan="2">Mata Pelajaran</td>
            <td colspan="6">Pengetahuan</td>
        </tr>

        <tr>

            <td>Nilai</td>
            <td>Predikat</td>


            <td colspan="3">Deskripsi</td>
        </tr>

        {{-- kelompok dan nilai --}}
        <tr>
            <td colspan="6" class="text-left">
                <strong>Kelompok A (Wajib)</strong>
            </td>

        </tr>

        @foreach($nilai_detail_as as $key => $nilai_detail_a)
            <tr>
                <td width=5 style='padding: 5px;'>
                    {{ $loop->iteration }}.
                </td>

                <td class="text-left">
                    {{ $nilai_detail_a->nilai->mapel_detail->mapel->nama }}
                </td>

                <td>{{ $nilai_detail_a->keterampilan }}</td>
                <td>{{ $nilai_detail_a->predikat_keterampilan }}</td>


                <td>{{ $nilai_detail_a->deskripsi_keterampilan }}</td>

            </tr>
        @endforeach

        <tr>
            <td colspan="7" class="text-left">
                <strong>Kelompok B (Wajib)</strong>
            </td>
        </tr>

        @foreach($nilai_detail_bs as $key => $nilai_detail_b)
            <tr>
                <td width=5 style='padding: 5px;'>
                    {{ $loop->iteration }}.
                </td>

                <td class="text-left">
                    {{ $nilai_detail_b->nilai->mapel_detail->mapel->nama }}
                </td>

                <td>{{ $nilai_detail_b->keterampilan }}</td>
                <td>{{ $nilai_detail_b->predikat_keterampilan }}</td>

                <td>{{ $nilai_detail_b->deskripsi_keterampilan }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="7" class="text-left">
                <strong>Kelompok C (Peminatan)</strong>
            </td>
        </tr>

        @foreach($nilai_detail_cs as $key => $nilai_detail_c)
            <tr>
                <td width=5 style='padding: 5px;'>
                    {{ $loop->iteration }}.
                </td>

                <td class="text-left">
                    {{ $nilai_detail_c->nilai->mapel_detail->mapel->nama }}
                </td>

                <td>{{ $nilai_detail_c->keterampilan }}</td>
                <td>{{ $nilai_detail_c->predikat_keterampilan }}</td>

                <td>{{ $nilai_detail_c->deskripsi_keterampilan }}</td>
            </tr>
        @endforeach

    </table>




    <div style="border-bottom: 2px solid grey; height: 200px;"></div>







    <div style='margin-top: 20px;' class="pagebreak"></div>

    <div style="width: 65%;">
        <table style="width: 100%; display: inline-block; margin-right: 110px;" id='tableHead1'>
            <tr>
                <td>Nama Sekolah</td>
                <td style="border-left: 0px;">{{ env('APP_OBJECT_NAME') }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ env('APP_OBJECT_LOCATION') }}</td>
            </tr>
            <tr>
                <td>Nama Peserta Didik</td>
                <td>{{ ucwords($raport->user->nama) }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>{{ $raport->user->no_identitas }}</td>
            </tr>
        </table>
    </div>


    <div style="width: 25%; float: right; margin-top: -75px;">
        <table style="width: 100%; display: inline-block; " id='tableHead2'>

            <tr>
                <td>Kelas</td>
                <td>{{ $raport->user->kelas->nama }}</td>
            </tr>

            <tr>
                <td>Semester</td>
                <td>{{ $raport->semester }}</td>
            </tr>

            <tr>
                <td>Tahun Pelajaran</td>
                <td>{{ $raport->tahun }}/{{ $raport->tahun + 1 }}</td>
            </tr>
        </table>
    </div>


    <h3>D. EKSTRAKURIKULER</h3>
    <p>

    <table style='width: 100%;' id='tableRaport'>
        <tr>
            <td width="5%">No.</td>
            <td width="30%">Kegiatan Ekstrakurikuler</td>
            <td width="30%">Predikat</td>
            <td width="30%">Keterangan</td>
        </tr>

        @foreach($hasil_nilai->nama_ekstrakurikuler as $key => $item)
            @if($item)
                <tr style="word-break: break-word;">

                    <td>{{ $loop->iteration }}</td>
                    <td style="text-align: left">
                        {{ $item }}
                    </td>
                    <td style="text-align: left">
                        {{ $hasil_nilai->predikat_ekstrakurikuler[$key] }}
                    </td>
                    <td style="text-align: left">
                        {{ $hasil_nilai->keterangan_ekstrakurikuler[$key] }}
                    </td>
                </tr>
            @endif
        @endforeach
    </table>


    <h3>E. PRESTASI</h3>
    <p>

    <table style='width: 100%;' id='tableRaport'>
        <tr>
            <td width="5%">No.</td>
            <td width="30%">Jenis Prestasi</td>
            <td width="65%">Keterangan</td>
        </tr>

        @foreach($hasil_nilai->jenis_prestasi as $key => $item)
            @if($item)
                <tr style="word-break: break-word;">

                    <td>{{ $loop->iteration }}</td>
                    <td style="text-align: left">
                        {{ $item }}
                    </td>
                    <td style="text-align: left">
                        {{ $hasil_nilai->keterangan_jenis_prestasi[$key] }}
                    </td>
                </tr>
            @endif
        @endforeach
    </table>


    <h3>F. KETIDAKHADIRAN</h3>
    <p>

    <table style='width: 50% !important;' id='tableRaport'>


        <tr style="word-break: break-word;">

            <td WIDTH="30%" STYLE="text-align: left">Sakit</td>
            <td style="text-align: left" width="5%">
                :
            </td>
            <td style="text-align: left">
                {{ $hasil_nilai->sakit }}
            </td>
        </tr>


        <tr style="word-break: break-word;">

            <td WIDTH="30%" STYLE="text-align: left">Izin</td>
            <td style="text-align: left" width="5%">
                :
            </td>
            <td style="text-align: left">
                {{ $hasil_nilai->izin }}
            </td>
        </tr>


        <tr style="word-break: break-word;">

            <td WIDTH="30%" STYLE="text-align: left">Tanpa Keterangan</td>
            <td style="text-align: left" width="5%">
                :
            </td>
            <td style="text-align: left">
                {{ $hasil_nilai->tanpa_keterangan }}
            </td>
        </tr>
    </table>


    <h3>G. CATATAN WALI KELAS</h3>
    <p>

    <div style="border: 1px solid black; height: 60px;"></div>


    <h3>H. TANGGAPAN ORANG TUA / WALI</h3>
    <p>

    <div style="border: 1px solid black; height: 60px;"></div>


    <div style='margin-top: 20px;'></div>


        <div style="width: 100%; display: flex; flex-wrap: nowrap;">
            <div style='width: 25%;'>
                Mengetahui<br>
                Orant Tua / Wali,
                <div style="height: 40px;">

                </div>
                .......................
            </div>

            <div style='width: 25%; margin-left: 70px; margin-right: 70px;'>
                Mengetahui<br>
                Kepala Sekolah,
                <div style="height: 40px;">

                </div>
                <strong>Inagunah, S.Pd, M.Pd.I</strong><br>
                NIP. 197006061997021001
            </div>

            <div style='width: 25%;'>
                Jambi, {{ date("d F Y") }}<br>
                Wali Kelas,
                <div style="height: 40px;">

                </div>
                <strong>{{ ucwords(auth()->user()->nama) }}, S.Pd,</strong><br>
                NIP. 196805251996022002
            </div>
        </div>
    </div>


<script>
    print();
</script>