@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Anggota Id</th>
            <th>User Petugas Id</th>
            <th>Tanggal</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peminjaman as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->anggota->nama }}</td>
            <td>{{ $item->user_petugas->name }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->tanggal_pengembalian }}</td>
            <td>{{ $item->status }}</td>

            <td class="text-center">
                <a class="label label-info" href="{{ url('/peminjaman/' . $item->id) }}">Detail / Pengembalian</a>
                <a class="label label-primary" href="{{ url('/peminjaman/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/peminjaman' . '/' . $item->id) }}" method='post' style='display: inline;'
                    onsubmit="return confirm('Yakin akan menghapus data ini?')">
                    @method('DELETE')
                    @csrf
                    <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                        style='cursor: pointer;'>Hapus</label>
                    <button type="submit" id='btnSubmit-{{ $item->id }}' style="display: none;"></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('peminjaman/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('peminjaman/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('peminjaman/create') }}";
    var columnOrders = [{{ $peminjaman_count }}];
    var urlSearch = "{{ url('peminjaman') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection