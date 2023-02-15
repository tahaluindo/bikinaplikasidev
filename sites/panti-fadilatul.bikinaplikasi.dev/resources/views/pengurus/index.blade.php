@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Pengurus</h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Jabatan</th>
                                        <th>Nama</th>
                                        <th>Jk</th>
                                        <th>Ttl</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pengurus as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jk }}</td>
                                            <td>{{ $item->ttl }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_hp }}</td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/pengurus/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/pengurus' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('pengurus/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pengurus/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pengurus/create') }}";
        var columnOrders = [{{ $pengurus_count - 3}}];
        var urlSearch = "{{ url('jabatan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection