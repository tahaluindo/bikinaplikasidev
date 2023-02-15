@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Donatur </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table" id='dataTable'>
                                    <thead>
                                        <tr>
                                            <th width=2>#</th>
                                            <th>Nama</th>
                                            <th>No Hp</th>
                                            <th>Nama Pemilik Rekening</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Pesan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($donatur as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->nama_pemilik_rekening }}</td>
                                            <td>{{ toIdr($item->jumlah) }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->pesan }}</td>

                                            <td class="text-center">
                                                @if($item->status == 'Terkonfirmasi')
                                                    Terkonfirmasi
                                                @else
                                                    <a class="badge badge-info badge-sm"
                                                   href="{{ url('/donatur/' . $item->id  . '/konfirmasi') }} " onclick="return confirm('Yakin akan mengkonfirmasi?')">Konfirmasi &nbsp;</a>
                                                @endif
                                                
                                                <a class="label label-primary"
                                                   href="{{ url('/donatur/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/donatur' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('donatur/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('donatur/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('donatur/create') }}";
        var columnOrders = [{{ 0 }}];
        var urlSearch = "{{ url('donatur') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection