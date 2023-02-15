@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Buku Tamu </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Nama</th>
                                        <th>Pesan Kesan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($buku_tamu as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->pesan_kesan }}</td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/buku-tamu/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/buku-tamu' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('buku-tamu/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('buku-tamu/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('buku-tamu/create') }}";
        var columnOrders = [{{ $buku_tamu_count }}];
        var urlSearch = "{{ url('buku-tamu') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = false;
        var button_manual = false;
    </script>
@endsection
