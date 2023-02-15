@extends("layouts.admin-lte.app")

@section('page') Kriteria @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Aspek</th>
                        <th>Nama</th>
                        <th>Target</th>
                        <th>Jenis</th>
                        <th>Gap</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriterias as $kriteria)
                    <tr data-id="{{ $kriteria->id }}">
                        <td>{{ $loop->iteration }}
                        <td>{{ $kriteria->aspek->nama }}</td>
                        <td>
                            <a href="{{ url("kriteria/$kriteria->id/kriteria_detail") }}">{{ $kriteria->nama }}</a>
                        </td>
                        <td>{{ $kriteria->target }}</td>
                        <td>{{ $kriteria->jenis }}</td>
                        <td>{{ $kriteria->gap }}</td>
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('kriteria.edit', ['kriteria' => $kriteria->id])) }}">Edit</a>
                            <form action="{{ url(route('kriteria.destroy', ['kriteria' => $kriteria->id])) }}" method='post'
                                style='display: inline;' onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $kriteria->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $kriteria->id }}' style="display: none;"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var locationHrefHapusSemua = "{{ url('kriteria/hapus_semua') }}";
    var locationHrefCreate = "{{ url('kriteria/create') }}";
    var columnOrders = [6];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari kriteria";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
