@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <div class="btn-group pull-right" role="group" aria-label="Button group">
                <a href="//wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down bg-light"> Import</a>
                <a href="//wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down bg-light"> Download Format</a>
                <a href="//wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down bg-light"> Export</a>
            </div>
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
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>No Identitas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <img class="img" src="{{ $user->foto }}" width="50" height="50">
                                    </td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->no_identitas }}</td>
                                    <td>
                                        <a class="label label-primary" href="e">Edit</a>
                                        <a class="label label-danger" href="e">Hapus</a>
                                        <a class="label label-success" href="e">Aktifkan</a>
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
    var locationHrefHapusSemua = "{{ url('user/hapus_semua') }}";
    var locationHrefCreate = "{{ url('user/create') }}";
    var columnOrders = [0, 1];
    var urlSearch = "{{ url('balasan') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "cari email tujuan";
    var tampilkan_buttons = true;
    var button_manual = true;

</script>
@endsection
