@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Nama</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bahan as $item)
            <tr data-id='{{ $item->id }}'>
                <th>{{ $loop->iteration }}.</th>

                <td>{{ $item->nama }}</td>

                <td>{{ toIdr($item->harga_beli) }}</td>
                <td>{{ $item->stok }}</td>

                <td class="text-center">
                    <a class="label label-primary"
                       href="{{ url('/bahan/' . $item->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/bahan' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('bahan/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('bahan/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('bahan/create') }}";
        var columnOrders = [{{ $bahan_count - 4 }}];
        var urlSearch = "{{ url('bahan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection