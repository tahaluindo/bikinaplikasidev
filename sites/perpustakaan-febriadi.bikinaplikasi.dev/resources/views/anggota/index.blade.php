@extends('layouts.app2')

@section('content')
    <div class="content-header sty-one">
        <h1>Anggota</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Anggota</li>
        </ol>
    </div>

    <div class="content">
        <div class="row mb-2">
            <div class="col-xl-12">
                <a class="btn btn-outline-primary" href="?">Lihat Semua</a>
                <a class="btn btn-outline-primary" href="?level=Guru">Lihat Guru</a>
                <a class="btn btn-outline-primary" href="?level=Siswa">Lihat Siswa</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>No identitas</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Status</th>
                                <th>Level</th>
                                <th>Dibuat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($anggota as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->no_identitas }}</td>
                                    <td>{{ $item->user ? $item->user->email : "" }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->no_telepon }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->user ? $item->user->level : "" }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->dibuat)->format('y-M-D') }}</td>

                                    <td class="text-center">

                                        <a class="badge badge-info"
                                           href="{{ url("/peminjaman?anggota_id=$item->id") }}">Peminjaman</a>
                                        <a class="badge badge-primary"
                                           href="{{ url('/anggota/' . $item->id . '/edit') }}">Edit</a>

                                        <form action="{{ url('/anggota' . '/' . $item->id) }}" method='post'
                                              style='display: inline;'
                                              onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="badge badge-danger" href="" for='btnSubmit-{{ $item->id }}'
                                                   style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $item->id }}'
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


    <script>
        const locationHrefHapusSemua = "{{ url('anggota/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('anggota/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('anggota/create') }}";
        var columnOrders = [{{ $anggota_count - 5 }}];
        var urlSearch = "{{ url('anggota') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection


