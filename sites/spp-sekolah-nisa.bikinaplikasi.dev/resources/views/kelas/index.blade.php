@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Kelas</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kelas</li>
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
                        <table class="table table-sm" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=5>No</th>
                                    <th>Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kelass as $kelas)
                                <tr data-id="{{ $kelas->id }}">
                                    <td>{{ $loop->iteration }}
                                    <td>{{ $kelas->nama }}</td>
                                    <td class='text-center'>
                                        <a class="label label-primary" href="{{ route('kelas.edit', ['kelas' => $kelas->id]) }}">Edit</a>
                                        <form action="{{ route('kelas.destroy', ['kelas' => $kelas->id]) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $kelas->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $kelas->id }}'
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
    var locationHrefHapusSemua = "{{ route('kelas.hapus_semua') }}";
    var locationHrefCreate = "{{ route('kelas.create') }}";
    var columnOrders = [2];
    var urlSearch = "{{ url('kelas') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari kelas";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection
