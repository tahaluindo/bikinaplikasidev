@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Rekening Donasi</h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Bank</th>
                                        <th>Atas Nama</th>
                                        <th>NO Rekening</th>
                                        <th>Gambar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rekening_donasi as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->bank }}</td>
                                            <td>{{ $item->atas_nama }}</td>
                                            <td>{{ $item->no_rekening }}</td>
                                            <td><img src="{{ url($item->gambar) }}" width="50" height="50"/></td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/pengaturan/rekening-donasi/' . $item->id . '/edit') }}">Edit</a>
                                                <form
                                                    action="{{ url('/pengaturan/rekening-donasi' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('pengaturan/rekening-donasi/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pengaturan/rekening-donasi/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pengaturan/rekening-donasi/create') }}";
        var columnOrders = [0];
        var urlSearch = "{{ url('pengaturan/rekening-donasi') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection