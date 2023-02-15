@extends("layouts.admin-lte.app")

@section('page') Type @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Type</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                    <tr data-id="{{ $type->id }}">
                        <td>{{ $loop->iteration }}
                        <td>
                            <a href="{{ url("kriteria?aspek_id=$type->id") }}">{{ $type->type }}</a>
                        </td>
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('type.edit', ['type' => $type->id])) }}">Edit</a>
                            <form action="{{ url(route('type.destroy', ['type' => $type->id])) }}" method='post'
                                style='display: inline;' onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $type->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $type->id }}' style="display: none;"></button>
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
    var locationHrefHapusSemua = "{{ url('type/hapus_semua') }}";
    var locationHrefCreate = "{{ url('type/create') }}";
    var columnOrders = [2];
    var urlSearch = "{{ url('type') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari type";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
