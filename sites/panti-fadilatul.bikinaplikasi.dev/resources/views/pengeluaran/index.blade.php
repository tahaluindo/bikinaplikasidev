@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Pengeluaran </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pengeluaran as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ toIdr($item->jumlah) }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->keterangan }}</td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/pengeluaran/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/pengeluaran' . '/' . $item->id) }}"
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
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        const locationHrefHapusSemua = "{{ url('pengeluaran/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pengeluaran/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pengeluaran/create') }}";
        var columnOrders = [{{ $pengeluaran_count }}];
        var urlSearch = "{{ url('pengeluaran') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection