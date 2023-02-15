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
        @foreach($penyakit as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->nama }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/penyakit/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/penyakit' . '/' . $item->id) }}"
                    method='post' style='display: inline;'
                    onsubmit="return confirm('Yakin akan menghapus data ini?')">
                    @method('DELETE')
                    @csrf
                    <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                        style='cursor: pointer;'>Hapus</label>
                    <button type="submit" id='btnSubmit-{{ $item->id }}'
                        style="display: none;"></button>
                </form>
                <a class="label label-info"
                    href="{{ url('/saran-obat?penyakit_id=' . $item->id) }}">Saran Obat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('penyakit/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('penyakit/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('penyakit/create') }}";
    var columnOrders = [{{ $penyakit_count }}];
    var urlSearch = "{{ url('penyakit') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection