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
                                    <th>Karyawan</th>
                                    <th>Gaji Pokok</th>
                                    <th>Tonase Panen</th>
                                    <th>Bpjs</th>
                                    <th>Bonus</th>
                                    <th>Hutang</th>
                                    <th>Periode</th>
                                    <th>Tahun</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penggajians as $penggajian)
                                <tr data-id='{{ $penggajian->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $penggajian->karyawan->nama }}</td>
                                    <td>{{ toIdr($penggajian->gaji_pokok) }}</td>
                                    <td>{{ $penggajian->tonase_panen }} 
                                    (@php
                                    echo @toIdr(explode("x", $penggajian->tonase_panen)[0] * explode("x", $penggajian->tonase_panen)[1])
                                    @endphp)
                                    </td>
                                    <td>{{ toIdr($penggajian->bpjs) }}</td>
                                    <td>{{ toIdr($penggajian->bonus) }}</td>
                                    <td>
                                        @foreach(explode(",", $penggajian->hutang) ?? [] as $hutang)
                                        {{ toIdr($hutang) }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{ $penggajian->periode }}</td>
                                    <td>{{ $penggajian->tahun }}</td>
                                    <td>{{ $penggajian->tanggal }}</td>
                                    <td>{{ $penggajian->catatan }}</td>
                                                                        
                                    <td class="text-center">
                                        <a class="label label-primary"
                                            href="{{ url(route('penggajian.slip-gaji', $penggajian->id)) }}" target="_blank">Slip Gaji</a>
                                        <a class="label label-primary"
                                            href="{{ url(route('penggajian.edit', $penggajian->id)) }}">Edit</a>
                                        <form action="{{ url(route('penggajian.destroy', $penggajian->id)) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $penggajian->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $penggajian->id }}'
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
    const locationHrefHapusSemua = "{{ url('penggajian/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('penggajian/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('penggajian/create') }}";
    var columnOrders = [8];
    var urlSearch = "{{ url('penggajian') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    
    @if(auth()->user()->email == 'pemimpin@gmail.com')
        var tampilkan_buttons = false;
        var button_manual = false;
    @else
        var tampilkan_buttons = true;
        var button_manual = true;
    @endif
</script>
@endsection