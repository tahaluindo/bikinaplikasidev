@extends('layouts.app')

@section('content')
    <!-- Page -->
    <div class="page">

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xxl-12 col-xl-12">
                    <!-- Panel Web Designer -->
                    <div class="card card-shadow">
                        <div class="card-block bg-white p-40">
                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <th>No Hp</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pelanggan as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_hp }}</td>

                                        <td class="text-center">
                                            <a class="label label-primary"
                                               href="{{ url('/pelanggan/' . $item->id . '/edit') }}">Edit</a>
                                            <form action="{{ url('/pelanggan' . '/' . $item->id) }}"
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
                        </div>
                    </div>
                    <!-- End Panel Web Designer -->
                </div>
            </div>
        </div>
    </div>
        
    <script>
        const locationHrefHapusSemua = "{{ url('pelanggan/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pelanggan/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pelanggan/create') }}";
        var columnOrders = [{{ $pelanggan_count }}];
        var urlSearch = "{{ url('pelanggan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection