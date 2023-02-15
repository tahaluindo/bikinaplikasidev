@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Nama</th>
            <th>Expire At</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Gambar</th>
            <th class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($produk as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->nama }}</td>
                <td>{{ $item->expire_at }}</td>
                <td>{{ toIdr($item->harga_beli) }}</td>
                <td>{{ toIdr($item->harga_jual) }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->satuan }}</td>
                <td>
                    <a href="{{ url($item->gambar) }}">
                        <img src="{{ url($item->gambar) }}" alt="" srcset="" width="50" height="50">
                    </a>
                </td>

                <td class="text-center">
                    <a class="label label-primary"
                       href="{{ url('/produk/' . $item->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/produk' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('produk/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('produk/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('produk/create') }}";
        var columnOrders = [{{ $produk_count - 4 }}];
        var urlSearch = "{{ url('produk') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection