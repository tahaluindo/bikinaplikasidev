@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Kegiatan Panti</h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($kegiatan_panti ?? [] as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <a href="{{ url($item->gambar) }}">
                                                <img src="{{ url($item->gambar) }}" width="50" height="50"/>
                                                </a>
                                            </td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/pengaturan/kegiatan-panti/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/pengaturan/kegiatan-panti' . '/' . $item->id) }}"
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
                                    @empty
                                       
                                    @endforelse
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
        const locationHrefHapusSemua = "{{ url('pengaturan/kegiatan-panti/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pengaturan/kegiatan-panti/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pengaturan/kegiatan-panti/create') }}";
        var columnOrders = [ 0 ];
        var urlSearch = "{{ url('jabatan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection