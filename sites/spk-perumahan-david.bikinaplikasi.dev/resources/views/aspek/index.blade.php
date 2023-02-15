@extends("layouts.admin-lte.app")

@section('page') Aspek @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Nama</th>
                        <th>Persen (%)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aspeks as $aspek)
                    <tr data-id="{{ $aspek->id }}">
                        <td>{{ $loop->iteration }}
                        <td>
                            <a href="{{ url("kriteria?aspek_id=$aspek->id") }}">{{ $aspek->nama }}</a>
                        </td>
                        <td>{{ $aspek->persen }}</td>
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('aspek.edit', ['aspek' => $aspek->id])) }}">Edit</a>
                            <form action="{{ url(route('aspek.destroy', ['aspek' => $aspek->id])) }}" method='post'
                                style='display: inline;' onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $aspek->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $aspek->id }}' style="display: none;"></button>
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
    var locationHrefHapusSemua = "{{ url('aspek/hapus_semua') }}";
    var locationHrefCreate = "{{ url('aspek/create') }}";
    var columnOrders = [3];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari aspek";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
