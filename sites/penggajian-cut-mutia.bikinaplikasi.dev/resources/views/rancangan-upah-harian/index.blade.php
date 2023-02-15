@extends('layouts.app')

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <em class="fa fa-home"></em>
            </a>
        </li>

        <li class="active">Upah Harian</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Upah Harian</h1>
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
                                    <th>Jenis Pekerjaan</th>
                                    <th>Blok</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Jam Kerja</th>
                                    <th>Total</th>
                                    <th>Catatan</th>
                                    <th>Periode</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rancangan_upah_harians as $rancangan_upah_harian)
                                <tr data-id='{{ $rancangan_upah_harian->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $rancangan_upah_harian->karyawan->nama }}</td>
                                    <td>{{ $rancangan_upah_harian->jenis_pekerjaan }}</td>
                                    <td>{{ $rancangan_upah_harian->blok }}</td>
                                    <td>{{ $rancangan_upah_harian->satuan }}</td>
                                    <td>{{ toIdr($rancangan_upah_harian->harga_satuan) }}</td>
                                    <td>{{ $rancangan_upah_harian->jam_kerja }}</td>
                                    <td>{{ toIdr($rancangan_upah_harian->total) }}</td>
                                    <td>{{ $rancangan_upah_harian->catatan }}</td>
                                    <td>{{ $rancangan_upah_harian->periode }}</td>
                                                                                                            
                                    <td class="text-center">
                                        <a class="label label-primary"
                                            href="{{ url(route('rancangan-upah-harian.edit', $rancangan_upah_harian->id)) }}">Edit</a>
                                        <form action="{{ url(route('rancangan-upah-harian.destroy', $rancangan_upah_harian->id)) }}"
                                            method='post' style='display: inline;'
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="label label-danger" href="" for='btnSubmit-{{ $rancangan_upah_harian->id }}'
                                                style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $rancangan_upah_harian->id }}'
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
    const locationHrefHapusSemua = "{{ url('rancangan-upah-harian/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('rancangan-upah-harian/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('rancangan-upah-harian/create') }}";
    var columnOrders = [8];
    var urlSearch = "{{ url('rancangan-upah-harian') }}";
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