@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Tugas</li>
                <li class="breadcrumb-item active">Detail</li>
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
                                    <th>Nama Siswa</th>
                                    <th class="text-center">File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tugas->tugas_details as $tugas_detail)
                                <tr>
                                    <td>{{ $tugas_detail->user->nama }}</td>
                                    <td class="text-center">
                                        <a class="label label-warning" href="{{ url($tugas_detail->file) }}" download>Download</a>
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
    var locationHrefHapusSemua = "{{ url('tugas/hapus_semua') }}";
    var locationHrefCreate = "{{ url('tugas/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('tugas') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari nama siswa";

    var tampilkan_buttons = false;
    var button_manual = false;

</script>
@endsection
