@extends("layouts.admin-lte.app")

@section('page')
    @if(!request()->detail_perhitungan)
    Perangkingan
    @else
    Detail Perhitungan Alternatif
    @endif
@endsection

@section("content")
<input class='btn bg-red' type="button" onclick="printDiv('printableArea')" value="Print!">
@if(!request()->detail_perhitungan)
<a href="?detail_perhitungan=1" class="btn btn-success">Detail Perhitungan</a>
@endif
@if(auth()->user()->level == 'Admin')
<div class="row" id=printableArea style='margin-top: 10px;'>
    <div class="col-sm-12">
        @php $perangkingans = [] @endphp
        @foreach($aspeks as $aspek_index => $aspek)
        <div class="table-responsive" style='{{ request()->detail_perhitungan ? "" : "display: none;" }}'>

            <table class="table" id='dataTable'>
                <caption>
                    Aspek <a href='{{ url("aspek?aspek_id=$aspek->id") }}'>{{ $aspek->nama }}</a>
                </caption>
                <thead>
                    <tr class='bg-green'>
                            <td colspan="2">Perhitungan:</td>
                        @foreach($aspek->kriterias as $kriteria)
                        <th class="text-center">
                            <a  style='color: white;' href='{{ url("kriteria/$kriteria->id/kriteria_detail") }}'>{{ $kriteria->nama }}</a>
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatifs as $alternatif)
                    @php
                    $kriteria_detail_ids = $kriteria_details->whereIn('kriteria_id',
                    $aspek->kriterias->pluck('id')->toArray())->pluck('id')->toArray();
                    $alternatif_details = $alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids);
                    @endphp
                    <tr >
                        <td>{{ $loop->iteration }}</td>
                        <td><a href='{{ url("project/$project->id/alternatif?alternatif_id=$alternatif->id") }}'>{{ $alternatif->nama }}</a></td>

                        {{-- kalo datanya gak ada --}}
                        @if(!$alternatif_details->count())
                        @foreach($aspek->kriterias as $kriteria)
                        <td class='text-center'>-</td>
                        @endforeach
                        @endif
                        @foreach($alternatif_details as $alternatif_detail)
                        <td class="text-center">{{ $alternatif_detail->kriteria_detail->keterangan }}
                            ({{ $alternatif_detail->kriteria_detail->nilai }})</td>
                        @endforeach
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="2">
                            <strong>Nilai Kriteria<strong>
                        </td>
                        @foreach($aspek->kriterias as $kriteria)
                        <td class="text-center">{{ $kriteria->target }}</td>
                        @endforeach
                    </tr>

                    {{-- perhitungan nilai pemetaan gap --}}
                    <tr>
                        <td colspan="{{ $aspek->kriterias->count() }}"></td>
                    </tr>
                    <tr class="bg-teal">
                        <th colspan="2">Pemetaan GAP:</th>
                        @foreach($aspek->kriterias as $kriteria)
                        <th class="text-center">{{ $kriteria->nama }}</th>
                        @endforeach
                    </tr>

                    @foreach($alternatifs as $alternatif)
                    @php
                    $kriteria_detail_ids = $kriteria_details->whereIn('kriteria_id',
                    $aspek->kriterias->pluck('id')->toArray())->pluck('id')->toArray();
                    $alternatif_details = $alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama }}</td>
                        {{-- kalo datanya gak ada --}}
                        @if(!$alternatif_details->count())
                        @foreach($aspek->kriterias as $kriteria)
                        <td class='text-center'>-</td>
                        @endforeach
                        @endif

                        @foreach($alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids) as $alternatif_detail)
                        <td class="text-center">
                            {{ $alternatif_detail->kriteria_detail->nilai - $alternatif_detail->kriteria_detail->kriteria->target }}
                        </td>
                        @endforeach
                    </tr>
                    @endforeach

                    {{-- pembobotan nilai gap --}}
                    <tr>
                        <td colspan="{{ $aspek->kriterias->count() }}"></td>
                    </tr>
                    <tr class="bg-teal">
                        <th colspan="2">Pembobotan GAP:</th>

                        @foreach($aspek->kriterias as $kriteria)
                        <th class="text-center">
                            {{ $kriteria->nama }}
                        </th>
                        @endforeach
                    </tr>

                    @foreach($alternatifs as $alternatif)
                    @php
                    $kriteria_detail_ids = $kriteria_details->whereIn('kriteria_id',
                    $aspek->kriterias->pluck('id')->toArray())->pluck('id')->toArray();
                    $alternatif_details = $alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama }}</td>
                            {{-- kalo datanya gak ada --}}
                            @if(!$alternatif_details->count())
                            @foreach($aspek->kriterias as $kriteria)
                            <td class='text-center'>-</td>
                            @endforeach
                            @endif

                            @foreach($alternatif->alternatif_details->whereIn('kriteria_detail_id',
                            $kriteria_detail_ids) as $alternatif_detail)
                            @php
                            $bobot = $bobots->where('selisih', $alternatif_detail->kriteria_detail->nilai -
                            $alternatif_detail->kriteria_detail->kriteria->target)->first();
                            @endphp
                        <td class="text-center">
                            <a href='{{ url("bobot?bobot_id=$bobot->id") }}'>{{ $bobot->nilai }}</a></td>
                        @endforeach
                    </tr>
                    @endforeach

                    {{-- perhitungan factor --}}
                    <tr>
                        <td colspan="{{ $aspek->kriterias->count() }}"></td>
                    </tr>
                    <tr class="bg-teal">
                        <th colspan="2">Perhitungan Factor:</th>
                        @foreach($aspek->kriterias as $kriteria)
                        <th class="text-center">{{ $kriteria->nama }} ({{ $kriteria->jenis }})</th>
                        @endforeach
                        <th class="text-center">NCF (60%)</th>
                        <th class="text-center">NSF (40%)</th>
                        <th class="text-center">TOTAL</th>
                    </tr>

                    @foreach($alternatifs as $alternatif_index => $alternatif)
                    @php
                    $kriteria_detail_ids = $kriteria_details->whereIn('kriteria_id',
                    $aspek->kriterias->pluck('id')->toArray())->pluck('id')->toArray();
                    $alternatif_details = $alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama }}</td>
                            @php
                            $ncf = 0;
                            $total_ncf = 0;
                            $nsf = 0;
                            $total_nsf = 0;
                            $total = 0;
                            @endphp

                            @if(!$alternatif_details->count())
                            @foreach($aspek->kriterias as $kriteria)
                            <td class='text-center'>-</td>
                            @endforeach
                            @endif

                            @foreach($alternatif->alternatif_details->whereIn('kriteria_detail_id',
                            $kriteria_detail_ids) as $alternatif_detail)
                            @php
                            $bobot = $bobots->where('selisih', $alternatif_detail->kriteria_detail->nilai -
                            $alternatif_detail->kriteria_detail->kriteria->target)->first();
                            $ncf = $alternatif_detail->kriteria_detail->kriteria->jenis == "Core Factor" ? $ncf +=
                            $bobot->nilai : $ncf;
                            $total_ncf = $alternatif_detail->kriteria_detail->kriteria->jenis == "Core Factor" ?
                            ++$total_ncf : $total_ncf;
                            $nsf = $alternatif_detail->kriteria_detail->kriteria->jenis == "Secondary Factor" ? $nsf +=
                            $bobot->nilai : $nsf;
                            $total_nsf = $alternatif_detail->kriteria_detail->kriteria->jenis == "Secondary Factor" ?
                            ++$total_nsf : $total_nsf;
                            @endphp
                            <td class="text-center">{{ $bobot->nilai }}</td>
                            @endforeach
                        @php
                        if($total_ncf) {
                        $ncf = $ncf / $total_ncf;
                        } else {
                        $ncf = 0;
                        }

                        if($total_nsf) {
                        $nsf = $nsf / $total_nsf;
                        } else {
                        $nsf = 0;
                        }

                        $total_factor = ($ncf * 0.6) + ($nsf * 0.4);

                        // atur untuk perangkingans
                        $perangkingans[$alternatif_index]['alternatif'] = $alternatif;
                        $perangkingans[$alternatif_index]['aspek'][$aspek_index]['aspek'] = $aspek;
                        $perangkingans[$alternatif_index]['aspek'][$aspek_index]['total_factor'] = $total_factor;

                        @endphp
                        <td class="text-center">{{ round($ncf, 2) }}</td>
                        <td class="text-center">{{ round($nsf, 2) }}</td>
                        <td class="text-center">{{ $total_factor }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach

        {{-- hasil akhir / perangkingan --}}
        {{-- <div class="container row">
            <div class="col-md-12 bg-green" style="padding: 10px;">
                <h4>Perangkingan</h4>
            </div>
        </div> --}}
        <div class="table-responsive">

            <table class="table" id='dataTable'>
                <thead>
                    <tr class='bg-green'>
                        <td colspan="2">Perangkingan</td>
                        @foreach($aspeks as $aspek)
                        <th class='text-center'>
                            <a style='color: white;' href='{{ url("aspek?aspek_id=$aspek->id") }}'>{{ $aspek->nama }} ({{ $aspek->persen }}%)</a>
                        </th>
                        @endforeach
                        <th class='text-center'>Total</th>
                        <th class='text-center'>Rank</th>
                        <th class='text-center'>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perangkingans as $index_perangkingan => $perangkingan)
                    @php $total_perangkingan = 0; @endphp
                    @foreach($perangkingan['aspek'] as $perangkingan_aspek)
                    @php
                    $total_perangkingan += $perangkingan_aspek['total_factor'] * ($perangkingan_aspek['aspek']['persen']
                    / 100);
                    $perangkingans[$index_perangkingan]['total_perangkingan'] = $total_perangkingan;
                    @endphp
                    @endforeach
                    </tr>
                    @endforeach

                    @php
                    function cmp($a, $b)
                    {
                    if ($a['total_perangkingan'] == $b['total_perangkingan']) {
                    return 0;
                    }
                    return ($a['total_perangkingan'] > $b['total_perangkingan']) ? -1 : 1;
                    }

                    usort($perangkingans, "cmp");

                    @endphp

                    {{-- pembobotan nilai gap --}}

                    @foreach($perangkingans as $index_perangkingan => $perangkingan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href='{{ url("project/$project->id/alternatif?alternatif_id={$perangkingan['alternatif']->id}") }}'>{{ $perangkingan['alternatif']->nama }}</a>
                            {{-- {{ $perangkingan['alternatif']->nama }} --}}
                        </td>
                        @php $total_perangkingan = 0; @endphp
                        @foreach($perangkingan['aspek'] as $perangkingan_aspek)
                        @php
                        $total_perangkingan += $perangkingan_aspek['total_factor'] *
                        ($perangkingan_aspek['aspek']['persen'] / 100);
                        $perangkingans[$index_perangkingan]['total_perangkingan'] = $total_perangkingan;
                        @endphp
                        <td class='text-center'>{{ $perangkingan_aspek['total_factor'] }}</td>
                        @endforeach

                        {{-- untuk ngitung total & rank --}}
                        <td class='text-center'>{{ $perangkingan['total_perangkingan'] }}</td>
                        <td class='text-center'>{{ $loop->iteration }}</td>
                        <td class='text-center'>{!! $loop->iteration <= 10 ? "<span class='text-success'>Lulus</span>":"<span class='text-danger'>Tidak Lulus</span>" !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@else
<div class="row"id=printableArea style='margin-top: 10px;'>
    <div class="col-sm-12">
        @php $perangkingans = [] @endphp
        @foreach($aspeks as $aspek_index => $aspek)
        <div class="table-responsive" style='{{ request()->detail_perhitungan ? "" : "display: none;" }}'>

            <table class="table" id='dataTable'>
                <caption>
                    Aspek {{ $aspek->nama }}
                </caption>
                <thead>
                    <tr class='bg-green'>
                            <td colspan="2">Perhitungan:</td>
                        @foreach($aspek->kriterias as $kriteria)
                        <th class="text-center">
                            {{ $kriteria->nama }}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatifs as $alternatif)
                    @php
                    $kriteria_detail_ids = $kriteria_details->whereIn('kriteria_id',
                    $aspek->kriterias->pluck('id')->toArray())->pluck('id')->toArray();
                    $alternatif_details = $alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama }}</td>

                        {{-- kalo datanya gak ada --}}
                        @if(!$alternatif_details->count())
                        @foreach($aspek->kriterias as $kriteria)
                        <td class='text-center'>-</td>
                        @endforeach
                        @endif
                        @foreach($alternatif_details as $alternatif_detail)
                        <td class="text-center">{{ $alternatif_detail->kriteria_detail->keterangan }}
                            ({{ $alternatif_detail->kriteria_detail->nilai }})</td>
                        @endforeach
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="2">
                            <strong>Nilai Kriteria<strong>
                        </td>
                        @foreach($aspek->kriterias as $kriteria)
                        <td class="text-center">{{ $kriteria->target }}</td>
                        @endforeach
                    </tr>

                    {{-- perhitungan nilai pemetaan gap --}}
                    <tr>
                        <td colspan="{{ $aspek->kriterias->count() }}"></td>
                    </tr>
                    <tr class="bg-teal">
                        <th colspan="2">Pemetaan GAP:</th>
                        @foreach($aspek->kriterias as $kriteria)
                        <th class="text-center">{{ $kriteria->nama }}</th>
                        @endforeach
                    </tr>

                    @foreach($alternatifs as $alternatif)
                    @php
                    $kriteria_detail_ids = $kriteria_details->whereIn('kriteria_id',
                    $aspek->kriterias->pluck('id')->toArray())->pluck('id')->toArray();
                    $alternatif_details = $alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama }}</td>
                        {{-- kalo datanya gak ada --}}
                        @if(!$alternatif_details->count())
                        @foreach($aspek->kriterias as $kriteria)
                        <td class='text-center'>-</td>
                        @endforeach
                        @endif

                        @foreach($alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids) as $alternatif_detail)
                        <td class="text-center">
                            {{ $alternatif_detail->kriteria_detail->nilai - $alternatif_detail->kriteria_detail->kriteria->target }}
                        </td>
                        @endforeach
                    </tr>
                    @endforeach

                    {{-- pembobotan nilai gap --}}
                    <tr>
                        <td colspan="{{ $aspek->kriterias->count() }}"></td>
                    </tr>
                    <tr class="bg-teal">
                        <th colspan="2">Pembobotan GAP:</th>

                        @foreach($aspek->kriterias as $kriteria)
                        <th class="text-center">
                            {{ $kriteria->nama }}
                        </th>
                        @endforeach
                    </tr>

                    @foreach($alternatifs as $alternatif)
                    @php
                    $kriteria_detail_ids = $kriteria_details->whereIn('kriteria_id',
                    $aspek->kriterias->pluck('id')->toArray())->pluck('id')->toArray();
                    $alternatif_details = $alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama }}</td>
                            {{-- kalo datanya gak ada --}}
                            @if(!$alternatif_details->count())
                            @foreach($aspek->kriterias as $kriteria)
                            <td class='text-center'>-</td>
                            @endforeach
                            @endif

                            @foreach($alternatif->alternatif_details->whereIn('kriteria_detail_id',
                            $kriteria_detail_ids) as $alternatif_detail)
                            @php
                            $bobot = $bobots->where('selisih', $alternatif_detail->kriteria_detail->nilai -
                            $alternatif_detail->kriteria_detail->kriteria->target)->first();
                            @endphp
                        <td class="text-center">
                            {{ $bobot->nilai }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    {{-- perhitungan factor --}}
                    <tr>
                        <td colspan="{{ $aspek->kriterias->count() }}"></td>
                    </tr>
                    <tr class="bg-teal">
                        <th colspan="2">Perhitungan Factor:</th>
                        @foreach($aspek->kriterias as $kriteria)
                        <th class="text-center">{{ $kriteria->nama }} ({{ $kriteria->jenis }})</th>
                        @endforeach
                        <th class="text-center">NCF (60%)</th>
                        <th class="text-center">NSF (40%)</th>
                        <th class="text-center">TOTAL</th>
                    </tr>

                    @foreach($alternatifs as $alternatif_index => $alternatif)
                    @php
                    $kriteria_detail_ids = $kriteria_details->whereIn('kriteria_id',
                    $aspek->kriterias->pluck('id')->toArray())->pluck('id')->toArray();
                    $alternatif_details = $alternatif->alternatif_details->whereIn('kriteria_detail_id',
                        $kriteria_detail_ids);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama }}</td>
                            @php
                            $ncf = 0;
                            $total_ncf = 0;
                            $nsf = 0;
                            $total_nsf = 0;
                            $total = 0;
                            @endphp

                            @if(!$alternatif_details->count())
                            @foreach($aspek->kriterias as $kriteria)
                            <td class='text-center'>-</td>
                            @endforeach
                            @endif

                            @foreach($alternatif->alternatif_details->whereIn('kriteria_detail_id',
                            $kriteria_detail_ids) as $alternatif_detail)
                            @php
                            $bobot = $bobots->where('selisih', $alternatif_detail->kriteria_detail->nilai -
                            $alternatif_detail->kriteria_detail->kriteria->target)->first();
                            $ncf = $alternatif_detail->kriteria_detail->kriteria->jenis == "Core Factor" ? $ncf +=
                            $bobot->nilai : $ncf;
                            $total_ncf = $alternatif_detail->kriteria_detail->kriteria->jenis == "Core Factor" ?
                            ++$total_ncf : $total_ncf;
                            $nsf = $alternatif_detail->kriteria_detail->kriteria->jenis == "Secondary Factor" ? $nsf +=
                            $bobot->nilai : $nsf;
                            $total_nsf = $alternatif_detail->kriteria_detail->kriteria->jenis == "Secondary Factor" ?
                            ++$total_nsf : $total_nsf;
                            @endphp
                            <td class="text-center">{{ $bobot->nilai }}</td>
                            @endforeach
                        @php
                        if($total_ncf) {
                        $ncf = $ncf / $total_ncf;
                        } else {
                        $ncf = 0;
                        }

                        if($total_nsf) {
                        $nsf = $nsf / $total_nsf;
                        } else {
                        $nsf = 0;
                        }

                        $total_factor = ($ncf * 0.6) + ($nsf * 0.4);

                        // atur untuk perangkingans
                        $perangkingans[$alternatif_index]['alternatif'] = $alternatif;
                        $perangkingans[$alternatif_index]['aspek'][$aspek_index]['aspek'] = $aspek;
                        $perangkingans[$alternatif_index]['aspek'][$aspek_index]['total_factor'] = $total_factor;

                        @endphp
                        <td class="text-center">{{ round($ncf, 2) }}</td>
                        <td class="text-center">{{ round($nsf, 2) }}</td>
                        <td class="text-center">{{ $total_factor }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach

        {{-- hasil akhir / perangkingan --}}
        {{-- <div class="container row">
            <div class="col-md-12 bg-green" style="padding: 10px;">
                <h4>Perangkingan</h4>
            </div>
        </div> --}}
        <div class="table-responsive">

            <table class="table" id='dataTable'>
                <thead>
                    <tr class='bg-green'>
                        <td colspan="2">Perangkingan</td>
                        @foreach($aspeks as $aspek)
                        <th class='text-center'>
                            {{ $aspek->nama }} ({{ $aspek->persen }}%)
                        </th>
                        @endforeach
                        <th class='text-center'>Total</th>
                        <th class='text-center'>Rank</th>
                        <th class='text-center'>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perangkingans as $index_perangkingan => $perangkingan)
                    @php $total_perangkingan = 0; @endphp
                    @foreach($perangkingan['aspek'] as $perangkingan_aspek)
                    @php
                    $total_perangkingan += $perangkingan_aspek['total_factor'] * ($perangkingan_aspek['aspek']['persen']
                    / 100);
                    $perangkingans[$index_perangkingan]['total_perangkingan'] = $total_perangkingan;
                    @endphp
                    @endforeach
                    </tr>
                    @endforeach

                    @php
                    function cmp($a, $b)
                    {
                    if ($a['total_perangkingan'] == $b['total_perangkingan']) {
                    return 0;
                    }
                    return ($a['total_perangkingan'] > $b['total_perangkingan']) ? -1 : 1;
                    }

                    usort($perangkingans, "cmp");

                    @endphp

                    {{-- pembobotan nilai gap --}}

                    @foreach($perangkingans as $index_perangkingan => $perangkingan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $perangkingan['alternatif']->nama }}
                            {{-- {{ $perangkingan['alternatif']->nama }} --}}
                        </td>
                        @php $total_perangkingan = 0; @endphp
                        @foreach($perangkingan['aspek'] as $perangkingan_aspek)
                        @php
                        $total_perangkingan += $perangkingan_aspek['total_factor'] *
                        ($perangkingan_aspek['aspek']['persen'] / 100);
                        $perangkingans[$index_perangkingan]['total_perangkingan'] = $total_perangkingan;
                        @endphp
                        <td class='text-center'>{{ $perangkingan_aspek['total_factor'] }}</td>
                        @endforeach

                        {{-- untuk ngitung total & rank --}}
                        <td class='text-center'>{{ $perangkingan['total_perangkingan'] }}</td>
                        <td class='text-center'>{{ $loop->iteration }}</td>
                        <td class='text-center'>{{ $loop->iteration <= 10 ? "Lulus":"Tidak Lulus" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endif
@endsection

<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
