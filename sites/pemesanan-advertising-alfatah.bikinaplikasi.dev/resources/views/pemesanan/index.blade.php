@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>ID-TRANSAKSI</th>
            <th>Pelanggan</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>Dibuat Pada</th>
            <th class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pemesanan as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ "TRX-00000" . $item->id }}</td>
                <td>{{ $item->pelanggan->nama }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->catatan }}</td>
                <td>{{ $item->created_at }}</td>

                <td class="text-center">
                    <a class="label label-default" onclick="window.open('{{ url('/pemesanan/nota/' . $item->id) }}', '_blank');">Print</a>
                    <a class="label label-info"
                       href="{{ url('/pemesanan-detail?pemesanan_id=' . $item->id) }}">Detail</a>
                    <a class="label label-primary"
                       href="{{ url('/pemesanan/' . $item->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/pemesanan' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('pemesanan/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pemesanan/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pemesanan/create') }}";
        var columnOrders = [{{ $pemesanan_count - 3 }}];
        var urlSearch = "{{ url('pemesanan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection