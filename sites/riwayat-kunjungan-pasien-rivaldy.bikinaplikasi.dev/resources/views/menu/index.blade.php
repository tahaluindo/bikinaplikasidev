@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Penjual Id</th><th>Nama</th><th>Harga</th><th>Deskripsi</th><th>Stok</th><th>Gambar</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menu as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->penjual->user->name }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ toIdr($item->harga) }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->stok }}</td>
            <td>
                <a href="{{ \Storage::url($item->gambar) }}">Lihat</a>
            </td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/menu/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/menu' . '/' . $item->id) }}"
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
    const locationHrefHapusSemua = "{{ url('menu/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('menu/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('menu/create') }}";
    var columnOrders = [{{ $menu_count }}];
    var urlSearch = "{{ url('menu') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection