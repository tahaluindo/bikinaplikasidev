@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>User Id</th><th>Deskripsi</th><th>Gambar Depan</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penjual as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->user->name }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td><a href="{{ \Storage::url($item->gambar_depan) }}">Lihat</a></td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/penjual/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/penjual' . '/' . $item->id) }}"
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
    const locationHrefHapusSemua = "{{ url('penjual/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('penjual/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('penjual/create') }}";
    var columnOrders = [{{ $penjual_count }}];
    var urlSearch = "{{ url('penjual') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection