@extends('layouts.print')

@section('judul-laporan')
    <h3 align="center">LAPORAN perhitungan {{ $perhitungan->nama }}</h3>
@endsection

@section('content')

    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
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
@endsection
