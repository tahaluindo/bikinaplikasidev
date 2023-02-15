@extends('layouts.app')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <em class="fa fa-home"></em>
            </a>
        </li>

        <li class="active">{{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ ucwords(preg_replace("/_/", " ", Request::segment(1))) }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                                <tr>
                                    <th width=20>No</th>
                                    <th>Pegawai</th>
                                    <th>Jabatan</th>
                                    <th>Nama Tugas</th>

                                    <th>Nomor Surat Tugas</th> 
                                    <th>Surat Tugas</th> 
                                    <th>Catatan</th>
                                    @if(in_array(auth()->user()->email, ['admin@gmail.com']))
                                    <th class="text-center">Aksi</th>
                                     @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tugass as $tugas)
                                <tr data-id='{{ $tugas->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $tugas->pegawai->nama }}</td>
                                    <td>{{  $tugas->pegawai->riwayat_jabatan->nama_jabatan }}</td> 
                                    <td>{{ $tugas->tugas }}</td>
                                    <td>{{ $tugas->nomor_st }}</td  >
                                    <td><a href="{{ url($tugas->file)}}" /> Download </a></td>
                                    <td>{{ $tugas->catatan }}</td>  
@if(in_array(auth()->user()->email, ['admin@gmail.com']))
                                    <td class="text-center">
                                        <a class="label label-primary"
                                            href="{{ url(route('tugas.edit', $tugas->id)) }}">Edit</a>
                                        <form action="{{ url(route('tugas.destroy', $tugas->id)) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $tugas->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $tugas->id }}'
                                                style="display: none;"></button>
                                        </form>
                                    </td>
                                     @endif
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
@if(in_array(auth()->user()->email, ['kepala@gmail.com','staf@gmail.com']))
<script>
    const locationHrefHapusSemua = "{{ url('tugas/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('tugas/aktifkan_semua') }}";
    //const locationHrefCreate = "{{ url('tugas/create') }}";
    var columnOrders = [0];
    var urlSearch = "{{ url('tugas') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endif

@if(in_array(auth()->user()->email, ['admin@gmail.com']))
<script>
    const locationHrefHapusSemua = "{{ url('tugas/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('tugas/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('tugas/create') }}";
    var columnOrders = [0];
    var urlSearch = "{{ url('tugas') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
 @endif
@endsection