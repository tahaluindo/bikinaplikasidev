@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Riwayat Berobat</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Riwayat Berobat</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Pasien Id</th>
                                    <th>Penyakit Id</th>
                                    <th>Catatan</th>
                                    <th>Tanggal Berobat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($riwayat_berobat as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->pasien->nama }}</td>
                                        <td>
                                            {{ $item->penyakit->nama }}
                                        </td>
                                        <td>{{ $item->catatan }}</td>
                                        <td>{{ $item->tanggal_berobat }}</td>

                                        <td class="text-center">
                                            <a class="label label-primary"
                                               href="{{ url('/riwayat-berobat/' . $item->id . '/edit') }}">Edit</a>
                                            <form action="{{ url('/riwayat-berobat' . '/' . $item->id) }}"
                                                  method='post' style='display: inline;'
                                                  onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                @method('DELETE')
                                                @csrf
                                                <label class="label label-danger" href=""
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

                            <script>
                                const locationHrefHapusSemua = "{{ url('riwayat_berobat/hapus_semua') }}";
                                const locationHrefAktifkanSemua = "{{ url('riwayat_berobat/aktifkan_semua') }}";
                                const locationHrefCreate = "{{ url('riwayat_berobat/create') }}";
                                var columnOrders = [{{ $riwayat_berobat_count }}];
                                var urlSearch = "{{ url('riwayat_berobat') }}";
                                var q = "{{ $_GET['q'] ?? '' }}";
                                var placeholder = "Filter...";
                                var tampilkan_buttons = true;
                                var button_manual = true;
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
