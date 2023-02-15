@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-sm-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Raport Kelas {{ $kelas->nama }}</li>
            </ol>
        </div>
        <div class="col-md-6 col-sm-12 ">
            
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
                                    <th></th>
                                    <th>Nama</th>
                                    <th>Tahun</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($raports as $raport)
                                <tr data-id='{{ $raport->id }}'>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $raport->user->nama }}</td>
                                    <td>{{ $raport->tahun }}</td>
                                    <td>{{ $raport->semester }}</td>
                                    <td>{{ $raport->status }}</td>
                                    
                                    <td class="text-center">
                                        @if($raport->status == "Belum Diberikan")
                                        <a class="label label-info" href="{{ route('raport.updateStatus', $raport->id) }}?status=Sudah Diberikan" onclick="return confirm('Yakin akan memberikan raport?')">Berikan</a>
                                        @else
                                        <a class="label label-danger text-white">Sudah Berikan</a>
                                        @endif

                                        <a class="label label-success" href="{{ route('raport.print', $raport->id) }}">Print</a>
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
    const locationHrefHapusSemua = "{{ url('nilai/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('nilai/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('nilai/create') }}";
    var columnOrders = [5];
    var urlSearch = "{{ url('nilai') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = false;
    var button_manual = true;
</script>
@endsection