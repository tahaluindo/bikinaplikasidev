@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Pelanggan Id</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>Dibuat Pada</th>
            <th class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($penjualan as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->pelanggan->nama }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->catatan }}</td>
                <td>{{ $item->created_at }}</td>

                <td class="text-center">
                    <a class="label label-default" onclick="window.open('{{ url('/penjualan/nota/' . $item->id) }}', '_blank');">Print</a>
                    <a class="label label-info"
                       href="{{ url('/penjualan-detail?penjualan_id=' . $item->id) }}">Detail</a>
                    <a class="label label-primary"
                       href="{{ url('/penjualan/' . $item->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/penjualan' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('penjualan/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('penjualan/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('penjualan/create') }}";
        var columnOrders = [{{ $penjualan_count - 3 }}];
        var urlSearch = "{{ url('penjualan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection