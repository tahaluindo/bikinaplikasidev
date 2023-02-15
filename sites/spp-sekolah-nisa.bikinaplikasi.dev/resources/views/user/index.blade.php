@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User</h4>

                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @foreach($kelas_users as $kelas_user)
                            <li class="breadcrumb-item"><a href="?kelas_id={{ $kelas_user->id }}">Kelas {{ $kelas_user->nama }}</a></li>
                            @endforeach
                        </ol>
                    </nav>
                </div>

                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Kelas</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-sm" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=5>No</th>
                                    <th>Kelas</th>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
                                    <th>Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr data-id="{{ $user->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($user->level == 'siswa')
                                        <a href="?kelas_id={{ $user->kelas->id }}">
                                            {{ $user->kelas->nama ?? "" }}
                                        </a>
                                        @endif
                                    </td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->angkatan }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class='text-center'>
                                        <a class="label label-primary" href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a>
                                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $user->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $user->id }}'
                                                style="display: none;"></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var locationHrefHapusSemua = "{{ url('user/hapus_semua') }}";
    var locationHrefCreate = "{{ url('user/create') }}";
    var columnOrders = [4];
    var urlSearch = "{{ url('user') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "filter data...";
    var tampilkan_buttons = true;
    var button_manual = true;

    // khusus export
    var locationHrefExport = "{{ route('user.import_or_export') }}";

    // khusus naik kelas
    var locationHrefUbahKelas = "{{ route('user.ubah_kelas') }}";
</script>
@endsection
