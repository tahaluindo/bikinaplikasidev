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
                        <th>Kelas</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>{{ request()->user == 'semua_guru' ? "NIP" : (request()->user == 'semua_siswa' ? "NISN" : "NIP / NISN") }}</th>
                        <th>Nipd</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Nik</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Rt</th>
                        <th>Rw</th>
                        <th>Dusun</th>
                        <th>Kelurahan</th>
                        <th>Kode Pos</th>
                        <th>Jenis Tinggal</th>
                        <th>Alat Transportasi</th>
                        <th>Skhun</th>
                        <th>Penerima Kps</th>
                        <th>No Kps</th>
                        <th>Nama Ayah</th>
                        <th>Tahun Lahir Ayah</th>
                        <th>Jenjang Pendidikan Ayah</th>
                        <th>Pekerjaan Ayah</th>
                        <th>Penghasilan Ayah</th>
                        <th>Nik Ayah</th>
                        <th>Nama Ibu</th>
                        <th>Tahun Lahir Ibu</th>
                        <th>Jenjang Pendidikan Ibu</th>
                        <th>Pekerjaan Ibu</th>
                        <th>Penghasilan Ibu</th>
                        <th>Nik Ibu</th>
                        <th>No Peserta Ujian Nasional</th>
                        <th>No Seri Ijazah</th>
                        <th>Penerima Kip</th>
                        <th>Nomor Kip</th>
                        <th>Nama Di Kip</th>
                        <th>Nomor Kks</th>
                        <th>No Registrasi Akta Lahir</th>
                        <th>Bank</th>
                        <th>Nomor Rekening Bank</th>
                        <th>Rekening Atas Nma</th>
                        <th>Layak Pip</th>
                        <th>Alasan Layak Pip</th>
                        <th>Kebutuhan Khusus</th>
                        <th>Sekolah Asal</th>
                        <th>Anak Ke Berapa</th>
                        <th>Lintang</th>
                        <th>Bujur</th>
                        <th>No Kk</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Lingkar Kepala</th>
                        <th>Jumlah Saudara Kandung</th>
                        <th>Jarak Rumah Kesekolah</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- user yang sedang login tidak perlu melihat datanya disini, dia harus melihatnya melalui profile --}}

                    <tr data-id='{{ $user->id }}'>
                        <td>
                            <img class="img" src="{{ url($user->foto ?? "") }}" width="50" height="50">
                        </td>
                        <td>{{ $user->kelas->nama ?? "" }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->level }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->no_identitas }}</td>


                        <td>{{ $user->nipd}}</td>
                        <td>{{ $user->tempat_lahir}}</td>
                        <td>{{ $user->tanggal_lahir}}</td>
                        <td>{{ $user->nik}}</td>
                        <td>{{ $user->agama}}</td>
                        <td>{{ $user->alamat}}</td>
                        <td>{{ $user->rt}}</td>
                        <td>{{ $user->rw}}</td>
                        <td>{{ $user->dusun}}</td>
                        <td>{{ $user->kelurahan}}</td>
                        <td>{{ $user->kode_pos}}</td>
                        <td>{{ $user->jenis_tinggal}}</td>
                        <td>{{ $user->alat_transportasi}}</td>
                        <td>{{ $user->skhun}}</td>
                        <td>{{ $user->penerima_kps}}</td>
                        <td>{{ $user->no_kps}}</td>
                        <td>{{ $user->nama_ayah}}</td>
                        <td>{{ $user->tahun_lahir_ayah}}</td>
                        <td>{{ $user->jenjang_pendidikan_ayah}}</td>
                        <td>{{ $user->pekerjaan_ayah}}</td>
                        <td>{{ $user->penghasilan_ayah}}</td>
                        <td>{{ $user->nik_ayah}}</td>
                        <td>{{ $user->nama_ibu}}</td>
                        <td>{{ $user->tahun_lahir_ibu}}</td>
                        <td>{{ $user->jenjang_pendidikan_ibu}}</td>
                        <td>{{ $user->pekerjaan_ibu}}</td>
                        <td>{{ $user->penghasilan_ibu}}</td>
                        <td>{{ $user->nik_ibu}}</td>
                        <td>{{ $user->no_peserta_ujian_nasional}}</td>
                        <td>{{ $user->no_seri_ijazah}}</td>
                        <td>{{ $user->penerima_kip}}</td>
                        <td>{{ $user->nomor_kip}}</td>
                        <td>{{ $user->nama_di_kip}}</td>
                        <td>{{ $user->nomor_kks}}</td>
                        <td>{{ $user->no_registrasi_akta_lahir}}</td>
                        <td>{{ $user->bank}}</td>
                        <td>{{ $user->nomor_rekening_bank}}</td>
                        <td>{{ $user->rekening_atas_nama}}</td>
                        <td>{{ $user->layak_pip}}</td>
                        <td>{{ $user->alasan_layak_pip}}</td>
                        <td>{{ $user->kebutuhan_khusus}}</td>
                        <td>{{ $user->sekolah_asal}}</td>
                        <td>{{ $user->anak_Ke_berapa}}</td>
                        <td>{{ $user->lintang}}</td>
                        <td>{{ $user->bujur}}</td>
                        <td>{{ $user->no_kk}}</td>
                        <td>{{ $user->berat_badan}}</td>
                        <td>{{ $user->tinggi_badan}}</td>
                        <td>{{ $user->lingkar_kepala}}</td>
                        <td>{{ $user->jumlah_saudara_kandung}}</td>
                        <td>{{ $user->jarak_rumah_kesekolah}}</td>
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
