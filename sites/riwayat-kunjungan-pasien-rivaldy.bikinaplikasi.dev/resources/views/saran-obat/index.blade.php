@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Penyakit Id</th><th>Obat Id</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($saranobat as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->penyakit->nama }}</td>
            <td>{{ $item->obat->nama }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/saran-obat/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/saran-obat' . '/' . $item->id) }}"
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
    const locationHrefHapusSemua = "{{ url('saran_obat/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('saran_obat/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('saran_obat/create') }}?penyakit_id=" + {{ request()->penyakit_id }};
    var columnOrders = [{{ $saranobat_count }}];
    var urlSearch = "{{ url('saran_obat') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection