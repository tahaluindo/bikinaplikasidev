@extends('layouts.app2')

@section('content')
    <div class="page">

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xxl-12 col-xl-12">
                    <div class="card card-shadow">
                        <div class="card-block bg-white p-40">
                            <div class="col-md-12">
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>No identitas</th>
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
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_telepon }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->user ? $item->user->level : "" }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->dibuat)->format('d-M-Y') }}</td>

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
                                                    <label class="badge badge-danger" href=""
                                                           for='btnSubmit-{{ $item->id }}'
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




