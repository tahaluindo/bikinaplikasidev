@extends("layouts.admin-lte.app")

@section('page') Data Penerima Beasiswa @endsection

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
                        <th>Tggl Mulai Daftar</th>
                        <th>Tggl Akhir Daftar</th>
                        <th>Tggl Akhir Perubahan Profile</th>
                        <th>Keterangan</th>
                        <th class="text-center" style='width: 15%;'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr data-id="{{ $project->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if(auth()->user()->level == "Tu")
                            {!! $project->getAspeks() !!}
                            @else
                            {!! $project->getAspekUsers() !!}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url("project/$project->id/alternatif") }}">{{ $project->nama }}</a>
                        </td>
                        <td>{{ $project->tanggal_mulai_daftar }}</td>
                        <td>{{ $project->tanggal_akhir_daftar }}</td>
                        <td>{{ $project->tanggal_akhir_perubahan_profile }}</td>
                        <td>{{ $project->keterangan }}</td>
                        @if(auth()->user()->level == "Tu")
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('project.edit', ['project' => $project->id])) }}">Edit</a>
                            <form action="{{ url(route('project.destroy', ['project' => $project->id])) }}"
                                method='post' style='display: inline;'
                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $project->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $project->id }}' style="display: none;"></button>
                            </form>
                        </td>
                        @else
                        <td class='text-center'>
                            @if(in_array($project->id, $alternatif_project_ids))
                            <a class="text-success">Teregistrasi</a>
                            @else
                            <a class="text-primary"
                                href="{{ url(route('project.register', ['project' => $project->id])) }}" onclick='return confirm("Yakin akan registrasi di project ini?")'>Registrasi</a>
                            @endif
                            {{-- <a class="text-success"
                                href="{{ url(route('project.edit', ['project' => $project->id])) }}">Teregistrasi</a> --}}
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
    var locationHrefHapusSemua = "{{ url('project/hapus_semua') }}";
    var locationHrefCreate = "{{ url('project/create') }}";

    @if(auth()->user()->level == "Tu")
    var columnOrders = [4];
    @else
    var columnOrders = [];
    @endif

    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Cari Data Penerima";

    @if(auth()->user()->level == "Tu")
    var tampilkan_buttons = true;
    var button_manual = true;
    @else
    var tampilkan_buttons = false;
    var button_manual = false;
    @endif

</script>
@endsection
