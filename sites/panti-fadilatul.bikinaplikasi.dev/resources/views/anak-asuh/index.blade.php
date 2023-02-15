

@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Anak Asuh </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table" id='dataTable'>
                                    <thead>
                                        <tr>
                                            <th width=2>#</th>
                                            <th>Nama</th>
                                            <th>Jk</th>
                                            <th>Ttl</th>
                                            <th>Pendidikan</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($anak_asuh as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jk }}</td>
                                            <td>{{ $item->ttl }}</td>
                                            <td>{{ $item->pendidikan }}</td>
                                            <td>{{ $item->status }}</td>

                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   
                                                   href="{{ url('/anak-asuh/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/anak-asuh' . '/' . $item->id) }}"
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
        const locationHrefHapusSemua = "{{ url('anak-asuh/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('anak-asuh/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('anak-asuh/create') }}";
        var columnOrders = [{{ $anak_asuh_count - 2 }}];
        var urlSearch = "{{ url('jabatan') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection