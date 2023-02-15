@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Sekolah</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Desrkipsi</th>
                                    <th>Visi</th>
                                    <th>Misi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sekolahs as $sekolah)
                                <tr>
                                    <td>{{ $sekolah->nama }}</td>
                                    <td>{{ $sekolah->no_telp }}</td>
                                    <td>{{ $sekolah->alamat }}</td>
                                    <td>{!! $sekolah->deskripsi !!}</td>
                                    <td>{!! $sekolah->visi !!}</td>
                                    <td>{!! $sekolah->misi !!}</td>
                                    <td>
                                        <a class="label label-primary" href="{{ url(route('sekolah.edit', $sekolah->id)) }}">Edit</a>
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
    var locationHrefHapusSemua = "{{ url('sekolah/hapus_semua') }}";
    var locationHrefCreate = "{{ url('sekolah/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari email tujuan";
    var tampilkan_buttons = false;
    var button_manual = true;

</script>
@endsection
