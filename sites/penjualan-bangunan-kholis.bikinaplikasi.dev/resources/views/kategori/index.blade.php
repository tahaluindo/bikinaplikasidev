@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Nama</th>
            <th class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kategori as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->nama }}</td>

                <td class="text-center">
                    <a class="label label-primary"
                       href="{{ url('/produk?kategori_id=' . $item->id) }}">List Produk</a>
                    <a class="label label-primary"
                       href="{{ url('/kategori/' . $item->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/kategori' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('kategori/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('kategori/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('kategori/create') }}";
        var columnOrders = [0];
        var urlSearch = "{{ url('kategori') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection