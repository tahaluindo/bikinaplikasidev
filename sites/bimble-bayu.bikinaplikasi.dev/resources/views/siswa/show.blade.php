</a>@extends('layouts.app')


@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>{{ ucwords("siswa") }}</h2>
                    </div>
                    <div class="col-lg-6 breadcrumb-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                </a></li>
                            <li class="breadcrumb-item">{{ ucwords("siswa") }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-12 xl-100 box-col-12">
                    <div class="card">
                        <div class="card-header no-border">
                            <ul class="creative-dots">
                                <li class="bg-primary big-dot"></li>
                                <li class="bg-secondary semi-big-dot"></li>
                                <li class="bg-warning medium-dot"></li>
                                <li class="bg-info semi-medium-dot"></li>
                                <li class="bg-secondary semi-small-dot"></li>
                                <li class="bg-primary small-dot"></li>
                            </ul>

                        </div>
                        <div class="card-body pt-0">

                            @if(session()->has("error"))
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get("error") }}
                                </div>
                            @elseif(session()->has("success"))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get("success") }}
                                </div>
                            @elseif(session()->has("warning"))
                                <div class="alert alert-warning" role="alert">
                                    {{ session()->get("warning") }}
                                </div>
                            @endif

                            <div class="activity-table table-responsive recent-table">
                                <table class="table" id='dataTable'>
                                    <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Jenjang</th>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Nama Ibu</th>
                                        <th>Pekerjaan Ibu</th>
                                        <th>Nama Ayah</th>
                                        <th>Pekerjaan Ayah</th>
                                        <th>Alamat Orang Tua</th>
                                        <th>No HP Orang Tua</th>
                                        <th>Berkas</th>
                                        <th>Nomor Registrasi</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-id='{{ $item->id }}'>

                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->jenjang->nama }}</td>
                                            <td>{{ $item->kelas->nama }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->agama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->nama_ibu }}</td>
                                            <td>{{ $item->pekerjaan_ibu }}</td>
                                            <td>{{ $item->nama_ayah }}</td>
                                            <td>{{ $item->pekerjaan_ayah }}</td>
                                            <td>{{ $item->alamat_orang_tua }}</td>
                                            <td>{{ $item->no_hp_orang_tua }}</td>
                                            <td>
                                                @if($item->berkas)
                                                    <a class="btn btn-sm btn-primary-outline"
                                                       href="{{ url($item->berkas) }}" download>Download</a>
                                                @endif
                                            </td>
                                            <td>{{ $item->nomor_registrasi }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td class="text-center">
                                                <a class="label label-primary"
                                                   href="{{ url('/siswa/' . $item->id . '/edit') }}">Edit</a>
                                                <form action="{{ url('/siswa' . '/' . $item->id) }}"
                                                      method='post' style='display: inline;'
                                                      onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <label class="label label-danger" href=""
                                                           for='btnSubmit-{{ $item->id }}'
                                                           style='cursor: pointer;'>Hapus</label>
                                                    <button type="submit" id='btnSubmit-{{ $item->id }}'
                                                            style="display: none;"></button>
                                                </form>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#example-head21" title="Copy"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
