@extends("layouts.admin-lte.app")

@section('page') Nilai @endsection

@section("content")
<div class="row">
    <div class="col-sm-12" @if(auth()->user()->level == 'siswa') style='margin-top: -20px;' @endif>
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th></th>
                        <th>Guru</th>
                        <th>Mapel</th>
                        <th>Kelas</th>
                        <th>
                            Tahun <br>
                            Pelajaran
                        </th>
                        <th>
                            Semester
                        </th>


                        @if(in_array(auth()->user()->level, ['guru']))
                        <th class="text-center">Aksi</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach($nilais as $nilai)
                    <tr data-id='{{ $nilai->id }}'>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nilai->mapel_detail->user->nama }}</td>
                        <td>{{ $nilai->mapel_detail->mapel->nama }}</td>
                        <td>{{ $nilai->mapel_detail->kelas->nama }}</td>
                        <td>{{ $nilai->tahun }}</td>
                        <td>{{ $nilai->semester }}</td>

                        <td class="text-center">
                            @if(in_array(auth()->user()->level, ['guru']))
                            <a class="label label-info" href="{{ url(route('nilai_detail.index')) }}?nilai_id={{ $nilai->id }}">Detail</a>

                            <a class="label label-primary" href="{{ url(route('nilai.edit', ['nilai' => $nilai->id])) }}">Edit</a>
                            <form action="{{ url(route('nilai.destroy', ['nilai' => $nilai->id])) }}"
                                method='post' style='display: inline;'
                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $nilai->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $nilai->id }}'
                                    style="display: none;"></button>
                            </form>
                            @else
                            <a class="label label-info" href="{{ url(route('nilai_detail.index')) }}?nilai_id={{ $nilai->id }}">Detail</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const locationHrefHapusSemua = "{{ url('nilai/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('nilai/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('nilai/create') }}";
    var columnOrders = [5];
    var urlSearch = "{{ url('nilai') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";

    @if(in_array(auth()->user()->level, ['guru']))
    var tampilkan_buttons = true;
    var button_manual = true;
    @else
    var tampilkan_buttons = true;
    var button_manual = true;
    @endif

</script>
@endsection
