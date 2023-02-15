@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Peminjaman Id</th>
            <th>Tanggal</th>
            <th>Denda Terlambat</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Jatuh Tempo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengembalian as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->peminjaman->anggota->nama }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ toIdr($item->denda_terlambat) }}</td>
            <td>{{ $item->peminjaman->tanggal }}</td>
            <td>{{ $item->peminjaman->tanggal_pengembalian }}</td>

        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('pengembalian/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('pengembalian/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('pengembalian/create') }}";
    var columnOrders = [{{ $pengembalian_count }}];
    var urlSearch = "{{ url('pengembalian') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = false;
    var button_manual = true;
</script>
@endsection