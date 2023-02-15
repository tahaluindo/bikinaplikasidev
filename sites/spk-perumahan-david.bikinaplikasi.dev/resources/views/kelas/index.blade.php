@extends("layouts.admin-lte.app")

@section('page') Kelas @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelass as $kelas)
                    <tr data-id="{{ $kelas->id }}">
                        <td>{{ $loop->iteration }}
                        <td>
                            <a href="{{ url("kriteria?aspek_id=$kelas->id") }}">{{ $kelas->nama }}</a>
                        </td>
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('kelas.edit', ['kelas' => $kelas->id])) }}">Edit</a>
                            <form action="{{ url(route('kelas.destroy', ['kelas' => $kelas->id])) }}" method='post'
                                style='display: inline;' onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $kelas->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $kelas->id }}' style="display: none;"></button>
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
    var locationHrefHapusSemua = "{{ url('kelas/hapus_semua') }}";
    var locationHrefCreate = "{{ url('kelas/create') }}";
    var columnOrders = [2];
    var urlSearch = "{{ url('kelas') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari kelas";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
