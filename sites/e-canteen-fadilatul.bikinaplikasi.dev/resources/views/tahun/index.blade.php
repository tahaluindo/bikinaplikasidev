@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Tahun</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tahun as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->tahun }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/tahun/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/tahun' . '/' . $item->id) }}"
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
    const locationHrefHapusSemua = "{{ url('tahun/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('tahun/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('tahun/create') }}";
    var columnOrders = [{{ $tahun_count }}];
    var urlSearch = "{{ url('tahun') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection