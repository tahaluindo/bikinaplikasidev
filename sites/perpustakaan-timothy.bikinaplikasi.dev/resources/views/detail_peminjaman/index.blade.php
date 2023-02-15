@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Buku Id</th><th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail_peminjaman as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>{{ $item->buku_id }}</td><td>{{ $item->status }}</td>

                                    <td class="text-center">
                                        <a class="label label-primary"
                                            href="{{ url('/detail_peminjaman/' . $item->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('/detail_peminjaman' . '/' . $item->id) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
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

<script>
    const locationHrefHapusSemua = "{{ url('detail_peminjaman/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('detail_peminjaman/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('detail_peminjaman/create') }}";
    var columnOrders = [{{ $detail_peminjaman_count }}];
    var urlSearch = "{{ url('detail_peminjaman') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection
