@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Pemasok Id</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>Dibuat Pada</th>
            <th class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pembelian as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->pemasok->nama }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->catatan }}</td>
                <td>{{ $item->created_at }}</td>

                <td class="text-center">
                    <a class="label label-info"
                       href="{{ url('/pembelian-detail?pembelian_id=' . $item->id) }}">Detail</a>
                    <a class="label label-primary"
                       href="{{ url('/pembelian/' . $item->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/pembelian' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('pembelian/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pembelian/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pembelian/create') }}";
        var columnOrders = [{{ $pembelian_count - 4 }}];
        var urlSearch = "{{ url('pembelian') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection