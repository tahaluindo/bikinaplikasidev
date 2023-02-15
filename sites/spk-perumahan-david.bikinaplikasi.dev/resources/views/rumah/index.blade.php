@extends("layouts.admin-lte.app")

@section('page') Rumah @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Lokasi</th>
                        <th>Type</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rumahs as $rumah)
                    <tr data-id="{{ $rumah->id }}">
                        <td>{{ $loop->iteration }}
                        <td>{{ $rumah->lokasi->lokasi }}</td>
                        <td>
                            {{ $rumah->type->type }}
                        </td>
                        <td>{{ $rumah->alamat }}</td>
                        <td>{{ $rumah->keterangan }}</td>
                        <td>{{ $rumah->status }}</td>
                        <td>{{ toIdr($rumah->harga) }}</td>
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('rumah.edit', ['rumah' => $rumah->id])) }}">Edit</a>
                            <form action="{{ url(route('rumah.destroy', ['rumah' => $rumah->id])) }}" method='post'
                                style='display: inline;' onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $rumah->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $rumah->id }}' style="display: none;"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var locationHrefHapusSemua = "{{ url('rumah/hapus_semua') }}";
    var locationHrefCreate = "{{ url('rumah/create') }}";
    var columnOrders = [6];
    var urlSearch = "{{ url('rumah') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari rumah";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
