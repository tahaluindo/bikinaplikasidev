@extends("layouts.admin-lte.app")

@section('page') Alternatif @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Nama</th>
                        <th>No Identitas</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        @if(auth()->user()->level == "Admin")
                        <th class="text-center" >Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatifs as $alternatif)
                    <tr data-id="{{ $alternatif->id }}">
                        <td>{{ $loop->iteration }}
                        <td>{{ $alternatif->nama }}
                        <td>{{ $alternatif->no_identitas }}
                        <td>{{ $alternatif->alamat }}
                        <td>{{ $alternatif->no_telp }}
                        @if(auth()->user()->level == "Admin")
                        <td class='text-center'>
                            <a style='display: inline-block; margin-top: 2px;' class="label label-success"
                                href="{{ url(route('alternatif.edit', ['project' => $project->id, 'alternatif' => $alternatif->id])) }}">Edit</a>
                            <a style='display: inline-block; margin-top: 2px;' class="label label-info"
                                href="{{ url("project/$project->id/alternatif/alternatif_detail?alternatif_id=" . $alternatif->id) }}">Lihat Perhitungan</a>
                            <form
                                action="{{ url(route('alternatif.destroy', ['project' => $project->id, 'alternatif' => $alternatif->id])) }}"
                                method='post' style='display: inline;'
                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label style='display: inline-block; margin-top: 2px;' class="label label-danger" href="" for='btnSubmit-{{ $alternatif->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $alternatif->id }}'
                                    style="display: none;"></button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
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
    var tampilkan_buttons = true;
    var button_manual = false;

</script>
@endsection
