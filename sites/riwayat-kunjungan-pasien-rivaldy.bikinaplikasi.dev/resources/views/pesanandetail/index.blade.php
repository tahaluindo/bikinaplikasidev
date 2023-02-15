@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Pesanan Id</th><th>Menu Id</th><th>Jumlah</th><th>Harga</th><th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pesanandetail as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->pesanan_id }}</td><td>{{ $item->menu->nama }}</td><td>{{ $item->jumlah }}</td><td>{{ toIdr($item->harga) }}</td><td>{{ toIdr($item->total) }}</td>

        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('pesanandetail/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('pesanandetail/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('pesanandetail/create') }}";
    var columnOrders = [{{ $pesanandetail_count }}];
    var urlSearch = "{{ url('pesanandetail') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = false;
    var button_manual = true;
</script>
@endsection