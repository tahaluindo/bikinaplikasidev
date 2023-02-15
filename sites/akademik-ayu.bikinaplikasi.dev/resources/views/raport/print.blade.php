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

</style>

<div id='tableData'>
    <div style="width: 65%;">
        <table style="width: 100%; display: inline-block; margin-right: 110px;" id='tableHead1'>
            <tr>
                <td>Nama Sekolah</td>
                <td style="border-left: 0px;">SMK N 1 MUARO JAMBI</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>Jl. Lintas Timur Sumatera KM. 28, RT.02, Tunas Mudo, Sekernan, Tunas Mudo, Sekernan, Kabupaten Muaro Jambi, Jambi 36657</td>
            </tr>
            <tr>
                <td>Nama Peserta Didik</td>
                <td>{{ $raport->user->nama }}</td>
            </tr>
        </table>
    </div>
    
    <div style="width: 25%; float: right; margin-top: -110px;">
        <table style="width: 100%; display: inline-block; " id='tableHead2'>
            <tr>
                <td>NIS</td>
                <td>{{ $raport->user->no_identitas }}</td>
            </tr>

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

    <strong>Capaian Kompetensi</strong>

    <table style='width: 100%;' id='tableRaport'>
        <tr  rowspan="2">
            <td colspan=2 rowspan="2">Mata Pelajaran</td>
            <td colspan="2">Pengetahuan <br> (Kl 3)</td>
            <td colspan="2">Keterampilan <br> (Kl 4)</td>
            <td colspan="2">Sikap Spiritual Dan Sosial <br> (Kl 1 dan Kl 2)</td>
        </tr>

        <tr>
            
            <td>Angka</td>
            <td>Predikat</td>
            
            <td>Angka</td>
            <td>Predikat</td>

            <td>Dalam Mapel</td>
            <td>Antar Mapel</td>
        </tr>

        {{-- kelompok dan nilai --}}
        <tr>
            <td colspan="2" class="text-left">
                <strong>Kelompok A (Wajib)</strong>
            </td>

            <td>1-4</td>
            <td></td>

            <td>1-4</td>
            <td></td>

            <td>SB/B/C/K</td>

            <td rowspan="{{ $mapel_totals }}">
                <div class='text-justify' style='width: 200px; padding: 10px;'>
                    Peserta didik sudah menunjukkan 
                    kesungguhannya dalam mengamalkan ajaran 
                    agamanya dengan sangat baik.
                    Sudah menunjukkan sikap santun, 
                    kerjasama, gotong royong, cinta
                    damai, ramah lingkungan, Namun
                    masih perlu ditingkatkan lagi 
                    sikap jujur, percaya diri, peduli.
                </div>
            </td>
        </tr>
        
        @foreach($nilai_detail_as as $key => $nilai_detail_a)
        <tr>
            <td width=5 style='padding: 5px;'>
                {{ $loop->iteration }}.
            </td>

            <td class="text-left">
                {{ $nilai_detail_a->nilai->mapel_detail->mapel->nama }} <br>
                Nama Guru: {{ $nilai_detail_a->nilai->mapel_detail->user->nama }}
            </td>

            <td>{{ $nilai_detail_a->angka_kl_3 }}</td>
            <td>{{ $nilai_detail_a->predikat_kl_3 }}</td>

            <td>{{ $nilai_detail_a->angka_kl_4 }}</td>
            <td>{{ $nilai_detail_a->predikat_kl_4 }}</td>

            <td>{{ $nilai_detail_a->dalam_mapel_kl_1_kl_2 }}</td>

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
                {{ $nilai_detail_b->nilai->mapel_detail->mapel->nama }} <br>
                Nama Guru: {{ $nilai_detail_b->nilai->mapel_detail->user->nama }}
            </td>

            <td>{{ $nilai_detail_b->angka_kl_3 }}</td>
            <td>{{ $nilai_detail_b->predikat_kl_3 }}</td>

            <td>{{ $nilai_detail_b->angka_kl_4 }}</td>
            <td>{{ $nilai_detail_b->predikat_kl_4 }}</td>

            <td>{{ $nilai_detail_b->dalam_mapel_kl_1_kl_2 }}</td>
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
                {{ $nilai_detail_c->nilai->mapel_detail->mapel->nama }} <br>
                Nama Guru: {{ $nilai_detail_c->nilai->mapel_detail->user->nama }}
            </td>

            <td>{{ $nilai_detail_c->angka_kl_3 }}</td>
            <td>{{ $nilai_detail_c->predikat_kl_3 }}</td>

            <td>{{ $nilai_detail_c->angka_kl_4 }}</td>
            <td>{{ $nilai_detail_c->predikat_kl_4 }}</td>

            <td>{{ $nilai_detail_c->dalam_mapel_kl_1_kl_2 }}</td>
        </tr>
        @endforeach

    </table>
</div>

<script>
    print();
</script>