@extends("layouts.admin-lte.app")

@section('page') Lokasi @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th width=5>No</th>
                        <th>Lokasi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lokasis as $lokasi)
                    <tr data-id="{{ $lokasi->id }}">
                        <td>{{ $loop->iteration }}
                        <td>
                            {{ $lokasi->lokasi }}
                        </td>
                        <td class='text-center'>
                            <a class="label label-success"
                                href="{{ url(route('lokasi.edit', ['lokasi' => $lokasi->id])) }}">Edit</a>
                            <form action="{{ url(route('lokasi.destroy', ['lokasi' => $lokasi->id])) }}" method='post'
                                style='display: inline;' onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                @method('DELETE')
                                @csrf
                                <label class="label label-danger" href="" for='btnSubmit-{{ $lokasi->id }}'
                                    style='cursor: pointer;'>Hapus</label>
                                <button type="submit" id='btnSubmit-{{ $lokasi->id }}' style="display: none;"></button>
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
    var locationHrefHapusSemua = "{{ url('lokasi/hapus_semua') }}";
    var locationHrefCreate = "{{ url('lokasi/create') }}";
    var columnOrders = [2];
    var urlSearch = "{{ url('lokasi') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari lokasi";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
