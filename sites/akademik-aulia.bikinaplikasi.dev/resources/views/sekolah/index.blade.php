@extends("layouts.admin-lte.app")

@section('page') Sekolah @endsection

@section("content")
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table" id='dataTable'>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Email</th>
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
                        <td>{{ $sekolah->email }}</td>
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

<script>
    var locationHrefHapusSemua = "{{ url('aspek/hapus_semua') }}";
    var locationHrefCreate = "{{ url('aspek/create') }}";
    var columnOrders = [3];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari aspek";
    var tampilkan_buttons = false;
    var button_manual = true;

</script>
@endsection
