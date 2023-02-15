@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Kota</th>
            <th>Stok</th>
            <th>Ditambahkan</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($buku as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->kode_buku }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->penulis }}</td>
            <td>{{ $item->penerbit }}</td>
            <td>{{ $item->tahun }}</td>
            <td>{{ $item->kota }}</td>
            <td>{{ $item->stok }}</td>
            <td>{{ $item->ditambahkan }}</td>

            <td class="text-center">
                <a class="label label-primary" href="{{ url('/buku/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/buku' . '/' . $item->id) }}" method='post' style='display: inline;'
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
const locationHrefHapusSemua = "{{ url('buku/hapus_semua') }}";
const locationHrefAktifkanSemua = "{{ url('buku/aktifkan_semua') }}";
const locationHrefCreate = "{{ url('buku/create') }}";
var columnOrders = [{{ $buku_count }}];
var urlSearch = "{{ url('buku') }}";
var q = "{{ $_GET['q'] ?? '' }}";
var placeholder = "Filter...";
var tampilkan_buttons = true;
var button_manual = true;
</script>
@endsection