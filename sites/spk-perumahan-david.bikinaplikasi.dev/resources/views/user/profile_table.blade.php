@extends("layouts.admin-lte.app")

@section('page') Data Diri Siswa @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No Identitas</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-id="{{ $alternatif->id }}">
                        <td>{{ $alternatif->nama }}
                        <td>{{ $alternatif->no_identitas }}
                        <td>{{ $alternatif->alamat }}
                        <td>{{ $alternatif->no_telp }}
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('user.edit', ['user' => auth()->user()->id])) }}">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var locationHrefHapusSemua = '{{ url("project/$project->id/alternatif/hapus_semua") }}';
    var locationHrefCreate = '{{ url("project/$project->id/alternatif/create") }}';
    var alternatifShow = '{{ url("project/$project->id/alternatif/alternatif_detail") }}';
    var columnOrders = [3];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari alternatif";
    var tampilkan_buttons = false;
    var button_manual = false;

</script>
@endsection
