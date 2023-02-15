@extends("layouts.admin-lte.app")

@section('page') Kriteria Detail @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Keterangan</th>
                        <th>Nilai</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriteria_details as $kriteria_detail)
                    <tr data-id="{{ $kriteria_detail->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kriteria_detail->keterangan }}</td>
                        <td>{{ $kriteria_detail->nilai }}</td>
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('kriteria_detail.edit', ['kriteria' => $kriteria_detail->kriteria_id, 'kriteria_detail' => $kriteria_detail->id])) }}">Edit</a>
                            <form
                                action="{{ url(route('kriteria_detail.destroy', ['kriteria' => $kriteria_detail->kriteria_id, 'kriteria_detail' => $kriteria_detail->id])) }}"
                                method='post' style='display: inline;'
                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $kriteria_detail->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $kriteria_detail->id }}'
                                    style="display: none;"></button>
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
    var locationHrefHapusSemua = '{{ url("kriteria/$kriteria->id/kriteria_detail/hapus_semua") }}';
    var locationHrefCreate = '{{ url("kriteria/$kriteria->id/kriteria_detail/create") }}';
    var columnOrders = [3];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari kriteria_detail";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
