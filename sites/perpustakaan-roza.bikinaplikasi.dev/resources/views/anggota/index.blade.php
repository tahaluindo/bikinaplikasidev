@extends('layouts.app3')

@section('content')
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap mt-3">
                    <h2 class="title-1">Anggota</h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12  mt-3">
                <div class="table-responsive m-b-40">
                    <table class="table" id='dataTable'>
                        <thead>
                        <tr>
                            <th width=2>#</th>
                            <th>No induk</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Status</th>
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

                                <td>{{ $item->no_induk }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telepon }}</td>
                                <td>{{ $item->status }}</td>
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

    <script>
        const locationHrefHapusSemua = "{{ url('anggota/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('anggota/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('anggota/create') }}";
        var columnOrders = [{{ $anggota_count }}];
        var urlSearch = "{{ url('anggota') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection


