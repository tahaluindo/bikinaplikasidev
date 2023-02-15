@extends('layouts.app2')

@section('content')
    <div class="content-header sty-one">
        <h1>Kode Buku</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i>Kode Buku</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">

            <div class="col-xl-12">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Kode Buku</th>
                                <th>Keterangan</th>
                                <th>Lokasi Rak</th>

                                @if(!in_array(auth()->user()->level, ['Siswa', 'Guru']))
                                    <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kode_buku as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->kode_buku }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->lokasi_rak }}</td>

                                    @if(!in_array(auth()->user()->level, ['Siswa', 'Guru']))
                                    <td class="text-center">
                                        <a class="badge badge-primary"
                                           href="{{ url('/kode-buku/' . $item->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('/kode-buku' . '/' . $item->id) }}" method='post'
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
                                        @endif
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
        const locationHrefHapusSemua = "{{ url('kode-buku/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('kode-buku/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('kode-buku/create') }}";
        var columnOrders = [{{ $kode_buku_count - 2 }}];
        var urlSearch = "{{ url('kode-buku') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;

        @if(in_array(auth()->user()->level, ['Siswa', 'Guru']))
        var tampilkan_buttons = false;
        var button_manual = false;
        @endif
    </script>
@endsection
