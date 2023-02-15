@extends('layouts.app')

@section('content')
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
                                    <th>ID Barang</th>
                                    <th>Expire At</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($barang as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>
                                        <td>{{ "BRG-00000" . $item->id }}</td>
                                        <td>{{ $item->expire_at }}</td>
                                        <td>{{ toIdr($item->harga_beli) }}</td>
                                        <td>{{ toIdr($item->harga_jual) }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>
                                            <a href="{{ url($item->gambar) }}">
                                                <img src="{{ url($item->gambar) }}" alt="" srcset="" width="50"
                                                     height="50">
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a class="label label-primary"
                                               href="{{ url('/barang/' . $item->id . '/edit') }}">Edit</a>
                                            <form action="{{ url('/barang' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('barang/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('barang/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('barang/create') }}";
        var columnOrders = [{{ $barang_count - 4 }}];
        var urlSearch = "{{ url('barang') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection