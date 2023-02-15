@extends("layouts.admin-lte.app")

@section('page') User @endsection

@section("content")
<div class="row page-titles">
    <div class="col-md-offset-6 col-md-6 col-sm-12 ">
        <div class="btn-group pull-right" role="group" aria-label="Button group">
            <span>
            <a id='dropdownGuru' class="btn pull-right hidden-sm-down bg-light dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">Guru</a>
            <div class="dropdown-menu" aria-labelledby="dropdownGuru">
                <a class="dropdown-item" href="{{ url('user?user=semua_guru') }}">Semua Guru</a>
                @foreach($mapels as $mapel)
                <a class="dropdown-item" href='{{ url("user?user=guru&mapel_id={$mapel->id}") }}'>{{ $mapel->nama }}</a>
                @endforeach
            </div>
            </span>
            <span>
            <a id='dropdownKelas' class="btn pull-right hidden-sm-down bg-light dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">Siswa</a>
            <div class="dropdown-menu" aria-labelledby="dropdownKelas">
                <a class="dropdown-item" href="{{ url('user?user=semua_siswa') }}">Semua Siswa</a>
                @foreach($kelass as $kelas)
                <a class="dropdown-item" href='{{ url("user?user=siswa&kelas_id={$kelas->id}") }}'>{{ $kelas->nama }}</a>
                @endforeach
            </div>
        </span>
            <a href="{{ url('user/import') }}" class="btn pull-right hidden-sm-down bg-light">
                Import</a>
            <a href="{{ url('user/download_format') }}" class="btn pull-right hidden-sm-down bg-light">
                Download Format</a>
            <a href="{{ url('user/export') }}" class="btn pull-right hidden-sm-down bg-light">
                Export</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Kelas</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>No Identitas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    {{-- user yang sedang login tidak perlu melihat datanya disini, dia harus melihatnya melalui profile --}}
                    @php if($user->level == auth()->user()->level): continue; endif; @endphp
                    <tr data-id='{{ $user->id }}'>
                        <td>
                            <img class="img" src="{{ $user->foto }}" width="50" height="50">
                        </td>
                        <td>{{ $user->kelas->nama ?? "" }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->level }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->no_identitas }}</td>
                        <td>
                            <a class="label label-primary"
                                href="{{ url(route('user.show', ['user' => $user->id])) }}">Edit</a>
                            <form action="{{ url(route('user.destroy', ['user' => $user->id])) }}"
                                method='post' style='display: inline;'
                                onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $user->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $user->id }}'
                                    style="display: none;"></button>
                            </form>
                            @if($user->status == 'tidak aktif')
                            <a class="label label-success"
                                href="{{ url(route('user.aktifkan', ['user' => $user->id])) }}" style='display: inline-block; margin-top: 5px;'>Aktifkan</a>
                            @elseif($user->status == 'aktif')
                            <a class="label label-warning"
                                href="{{ url(route('user.nonaktifkan', ['user' => $user->id])) }}" style='display: inline-block; margin-top: 5px;'>Nonaktifkan</a>
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
    const locationHrefHapusSemua = "{{ url('user/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('user/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('user/create') }}";
    var columnOrders = [0, 4, 8];
    var urlSearch = "{{ url('user') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
    const locationHrefNaikKelas = "{{ route('user.naik_kelas') }}";
</script>
@endsection
