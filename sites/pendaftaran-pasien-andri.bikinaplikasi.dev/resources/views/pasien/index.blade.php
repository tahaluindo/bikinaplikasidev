@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Pasien</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pasien</a></li>
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
                                    <th>ID Bpjs</th>
                                    <th>Nomor Berobat</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Keluhan penyakit</th>
                                    <th>No Ktp</th>
                                    <th>BPJS</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pasien as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->id_bpjs }}</td>
                                        <td>{{ $item->nomor_berobat }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->umur }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->keluhan_penyakit }}</td>
                                        <td>{{ $item->no_ktp }}</td>
                                        <td>{{ $item->bpjs }}</td>

                                        <td class="text-center">
                                            @if(in_array(auth()->user()->level, ['Admin', '']))
                                            <a class="label label-primary"
                                               href="{{ url('/pasien/' . $item->id . '/edit') }}">Edit</a>
                                            
                                            <form action="{{ url('/pasien' . '/' . $item->id) }}"
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
                                            @endif
                                            
                                            <a class="label label-info"
                                               href="{{ url('/riwayat_berobat?pasien_id=' . $item->id) }}">Riwayat
                                                Berobat</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <script>
                                const locationHrefHapusSemua = "{{ url('pasien/hapus_semua') }}";
                                const locationHrefAktifkanSemua = "{{ url('pasien/aktifkan_semua') }}";
                                const locationHrefCreate = "{{ url('pasien/create') }}";
                                var columnOrders = [{{ $pasien_count }}];
                                var urlSearch = "{{ url('pasien') }}";
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
