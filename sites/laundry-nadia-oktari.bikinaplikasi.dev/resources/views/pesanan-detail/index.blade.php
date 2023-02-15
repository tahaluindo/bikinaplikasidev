@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Pesanan Id</th><th>Paket Id</th><th>Jumlah</th><th>Harga</th><th>Total</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pesanandetail as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->pesanan_id }}</td><td>{{ $item->paket_id }}</td><td>{{ $item->jumlah }}</td><td>{{ $item->harga }}</td><td>{{ $item->total }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/pesanan-detail/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/pesanan-detail' . '/' . $item->id) }}"
                    method='post' style='display: inline;'
                    onsubmit="return confirm('Yakin akan menghapus data ini?')">
                    @method('DELETE')
                    @csrf
                    <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                        style='cursor: pointer;'>Hapus</label>
                    <button type="submit" id='btnSubmit-{{ $item->id }}'
                        style="display: none;"></button>
                </form>
            </td>
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
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection