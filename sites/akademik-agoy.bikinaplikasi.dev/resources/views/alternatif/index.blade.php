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
                        <th>Alamat Siswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Kelas</th>
                        <th>No. Telp</th>
                        <th>Nama Ayah</th>
                        <th>Pekerjaan Ayah</th>
                        <th>Nama Ibu</th>
                        <th>Pekerjaan Ibu</th>
                        @if(auth()->user()->level == "Tu")
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
                        <td>{{ $alternatif->alamat_siswa }}
                        <td>{{ $alternatif->tanggal_lahir }}
                        <td>{{ $alternatif->kelas->nama }}
                        <td>{{ $alternatif->no_telp }}
                        <td>{{ $alternatif->nama_ayah }}
                        <td>{{ $alternatif->pekerjaan_ayah }}
                        <td>{{ $alternatif->nama_ibu }}
                        <td>{{ $alternatif->pekerjaan_ibu }}
                        @if(auth()->user()->level == "Tu")
                        <td class='text-center'>
                            @if($alternatif->status == "Belum Disetujui")
                            <a style='display: inline-block; margin-top: 2px;' class="label label-success"
                                href="{{ url(route('alternatif.setujui', ['project' => $project->id, 'alternatif' => $alternatif->id])) }}"
                                onclick="return confirm('Yakin akan menyetujui?')">Setujui</a>
                            @elseif($alternatif->status == "Disetujui")
                            <a style='display: inline-block; margin-top: 2px;' class="label label-warning"
                                href="{{ url(route('alternatif.batalkan', ['project' => $project->id, 'alternatif' => $alternatif->id])) }}"
                                onclick="return confirm('Yakin akan membatalkan?')">Batalkan</a>
                            @elseif($alternatif->status == "Dibatalkan")
                            <a style='display: inline-block; margin-top: 2px;' class="label label-default">Dibatalkan</a>
                            @endif

                            {{-- <a style='display: inline-block; margin-top: 2px;' class="label label-success"
                                href="{{ url(route('alternatif.edit', ['project' => $project->id, 'alternatif' => $alternatif->id])) }}">Edit</a> --}}
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
    var button_manual = true;

</script>
@endsection
