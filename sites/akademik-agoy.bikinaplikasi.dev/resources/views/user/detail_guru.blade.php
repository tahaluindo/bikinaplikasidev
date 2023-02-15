@extends("layouts.admin-lte.app")

@section('page') Akun @endsection

@section("content")
    <div class="row page-titles">
        <div class="col-md-offset-6 col-md-6 col-sm-12 ">
            <div class="btn-group pull-right" role="group" aria-label="Button group">
            <span>
            <a id='dropdownGuru' class="btn pull-right hidden-sm-down bg-light dropdown-toggle" data-toggle="dropdown"
               href="#" role="button"
               aria-haspopup="true" aria-expanded="false">Guru</a>
            <div class="dropdown-menu" aria-labelledby="dropdownGuru">
                <a class="dropdown-item" href="{{ url('user?user=semua_guru') }}">Semua Guru</a>
                @foreach($mapels as $mapel)
                    <a class="dropdown-item"
                       href='{{ url("user?user=guru&mapel_id={$mapel->id}") }}'>{{ $mapel->nama }}</a>
                @endforeach
            </div>
            </span>
                <span>
            <a id='dropdownKelas' class="btn pull-right hidden-sm-down bg-light dropdown-toggle" data-toggle="dropdown"
               href="#" role="button"
               aria-haspopup="true" aria-expanded="false">Siswa</a>
            <div class="dropdown-menu" aria-labelledby="dropdownKelas">
                <a class="dropdown-item" href="{{ url('user?user=semua_siswa') }}">Semua Siswa</a>
                @foreach($kelass as $kelas)
                    <a class="dropdown-item"
                       href='{{ url("user?user=siswa&kelas_id={$kelas->id}") }}'>{{ $kelas->nama }}</a>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>{{ request()->user == 'semua_guru' ? "NIP" : (request()->user == 'semua_siswa' ? "NISN" : "NIP / NISN") }}</th>

                        <th>Nama</th>
                        <th>Nuptk</th>
                        <th>Status Kepegawaian</th>
                        <th>Jenis Ptk</th>
                        <th>Gelar Depan</th>
                        <th>Gelar Belakang</th>
                        <th>Jenjang</th>
                        <th>Jurusan Prodi</th>
                        <th>Sertifikasi</th>
                        <th>Tamat Kerja</th>
                        <th>Tugas Tambahan</th>
                        <th>Mengajar</th>
                        <th>Jam Tugas Tambahan</th>
                        <th>Jjm</th>
                        <th>Total Jjm</th>
                        <th>Siswa</th>
                        <th>Kompetensi</th>

                    </tr>
                    </thead>
                    <tbody>
                    {{-- user yang sedang login tidak perlu melihat datanya disini, dia harus melihatnya melalui profile --}}
                    <tr data-id='{{ $user->id }}'>
                        <td>
                            <img class="img" src="{{ url($user->foto ?? "") }}" width="50" height="50">
                        </td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->level }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->no_identitas }}</td>


                        <td>{{ $user->guru_detail->nama }}</td>
                        <td>{{ $user->guru_detail->nuptk }}</td>
                        <td>{{ $user->guru_detail->status_kepegawaian }}</td>
                        <td>{{ $user->guru_detail->jenis_ptk }}</td>
                        <td>{{ $user->guru_detail->gelar_depan }}</td>
                        <td>{{ $user->guru_detail->gelar_belakang }}</td>
                        <td>{{ $user->guru_detail->jenjang }}</td>
                        <td>{{ $user->guru_detail->jurusan_prodi }}</td>
                        <td>{{ $user->guru_detail->sertifikasi }}</td>
                        <td>{{ $user->guru_detail->tamat_kerja }}</td>
                        <td>{{ $user->guru_detail->tugas_tambahan }}</td>
                        <td>{{ $user->guru_detail->mengajar }}</td>
                        <td>{{ $user->guru_detail->jam_tugas_tambahan }}</td>
                        <td>{{ $user->guru_detail->jjm }}</td>
                        <td>{{ $user->guru_detail->total_jjm }}</td>
                        <td>{{ $user->guru_detail->siswa }}</td>
                        <td>{{ $user->guru_detail->kompetensi }}</td>

                    </tr>
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
        var tampilkan_buttons = false;
        var button_manual = false;
        const locationHrefNaikKelas = "{{ route('user.naik_kelas') }}";
    </script>
@endsection
