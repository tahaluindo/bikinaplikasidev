@extends("layouts.admin-lte.app")

@section('page') Jadwal @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th></th>
                        <th>Mapel</th>
                        <th>Guru</th>
                        <th>Hari</th>
                        <th>Dari Jam</th>
                        <th>Sampai Jam</th>
                        <th>Status</th>

                        @if(in_array(auth()->user()->level, ['tu']))
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwals as $jadwal)
                    <tr data-id='{{ $jadwal->id }}'>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->mapel_detail->mapel->nama }}</td>
                        <td>{{ $jadwal->mapel_detail->user->nama }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ $jadwal->dari_jam }}</td>
                        <td>{{ $jadwal->sampai_jam }}</td>
                        <td>{{ $jadwal->status }}</td>

                        @if(in_array(auth()->user()->level, ['tu']))
                        <td class="text-center">
                            <a class="label label-primary" href="{{ url(route('jadwal.edit', ['jadwal' => $jadwal->id])) }}">Edit</a>
                            <form action="{{ url(route('jadwal.destroy', ['jadwal' => $jadwal->id])) }}"
                                method='post' style='display: inline;'
                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $jadwal->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $jadwal->id }}'
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
    const locationHrefHapusSemua = "{{ url('jadwal/hapus_semua') }}";
    const locationHrefCreate = "{{ url('jadwal/create') }}";
    var columnOrders = [6];
    var urlSearch = "{{ url('jadwal') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";

    @if(in_array(auth()->user()->level, ['guru', 'siswa']))
    var tampilkan_buttons = false;
    @else
    var tampilkan_buttons = true;
    @endif

    var button_manual = true;
</script>
@endsection
