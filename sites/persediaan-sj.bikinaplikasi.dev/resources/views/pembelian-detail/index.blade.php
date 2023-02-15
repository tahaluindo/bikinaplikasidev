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
                                    <th>Barang Id</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pembelian_detail as $key => $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>{{ $item->barang->nama }}</td>
                                        <td>{{ toIdr($item->harga) }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ toIdr($item->total) }}</td>

                                        <td class="text-center">
                                            <a class="label label-primary"
                                               href="{{ url('/pembelian-detail/' . $item->id . '/edit') }}">Edit</a>
                                            <form
                                                action="{{ url('/pembelian-detail' . '/' . $item->id . "?pembelian_id=" . request()->pembelian_id) }}"
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
                                <tfoot>
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <strong>Total</strong>
                                    </td>

                                    <td></td>
                                    <td>{{ $pembelian_detail->sum('jumlah') }}</td>
                                    <td>{{ toIdr($pembelian_detail->sum('total')) }}</td>

                                    <td class="text-right">

                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- End Panel Web Designer -->
                </div>
            </div>
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('pembelian-detail/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pembelian-detail/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pembelian-detail/create') . "?pembelian_id=" . request()->pembelian_id }}";
        var columnOrders = [{{ $pembelian_detail_count - 3 }}];
        var urlSearch = "{{ url('pembelian-detail') . "?pembelian_id=" . request()->pembelian_id  }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection