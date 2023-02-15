@extends('layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Pasien</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Pasien</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="row justify-content-between" style="margin-bottom: 10px;">

                                <div class="col-sm-12">
                                    <form method="POST" action="{{ url('admin/pasien/cari') }}"
                                          class="form-inline pull-right">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName2">Kata Kunci</label>
                                            <input name="cari" type="text" class="form-control" placeholder="Cari"
                                                   value="{{ isset($cari) ? $cari : '' }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </form>
                                </div>
                            </div>

                            @if (isset($cari))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Pencarian nama dengan kata kunci '{{$cari}}'</p>
                                    </div>
                                </div>
                            @endif
                            @if (empty($pasien))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Data Tidak Ada</p>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-12 col-sm-12 col-md-12 d-flex align-items-stretch">
                                    <div class="card bg-light shadow border card-default">
                                        <div class="card-body p-2">
                                            <div class="table-responsive">
                                                <table id="example1" class="table border table-hover text-nowrap">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Telepon</th>
                                                        <th>Bpjs</th>
                                                        <th>Alergi Obat</th>
                                                        <th>Riwayat Penyakit</th>
                                                        <th class="text-right">Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($pasien as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>PS-{{ $item['id'] }}</td>
                                                            <td>{{ $item['nama'] }}</td>
                                                            <td>
                                                                @if($item['jenis_kelamin'] == 'L')
                                                                    Laki-Laki
                                                                @else
                                                                    Perempuan
                                                                @endif
                                                            </td>
                                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item['tanggal_lahir'])->format('d/m/Y') }}
                                                                ({{ \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($item['tanggal_lahir'])) }}
                                                                Thn)
                                                            </td>
                                                            <td>{{ $item['alamat'] }}</td>
                                                            <td>{{ $item['tlpn'] }}</td>
                                                            <td>{{ $item['bpjs'] }}</td>
                                                            <td>{{ $item['alergi_obat'] }}</td>
                                                            <td>{{ $item['riwayat_penyakit'] }}</td>
                                                            <td class="text-right">
                                                                <a class="btn btn-danger btn-sm"
                                                                   href="{{ url('admin/pasien/'. $item['id']) }}"
                                                                   role="button"> <i
                                                                            class="fa fa-address-card"
                                                                            aria-hidden="true"></i>
                                                                    Detail</a>

                                                                <button type="button" data-id_data="{{$item['id']}}"
                                                                        data-kode_data="{{$item['id']}}"
                                                                        class="btn btn-danger btn-sm open-modal-hapus"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-hapus-{{ $item['id'] }}">
                                                                    <i class="fa fa-trash-alt"></i> Hapus
                                                                </button>
                                                            </td>
                                                        </tr>


                                                        {{-- modal hapus --}}
                                                        <div class="modal fade" id="modal-hapus-{{ $item['id'] }}">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header btn-info">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h4 class="modal-title text-white">
                                                                            Informasi</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p id="informasi">Yakin akan menghapus data
                                                                            ini?</p>
                                                                    </div>
                                                                    <div class="modal-footer btn-info justify-content-between">
                                                                        <form class="d-inline" method="POST"
                                                                              action="{{url('admin/pasien')}}">
                                                                            @method('delete')
                                                                            @csrf
                                                                            <input id="id" type="hidden" name="id"
                                                                                   value="{{ $item['id'] }}">
                                                                            <button type="button"
                                                                                    class="btn btn-success"
                                                                                    data-dismiss="modal">Close
                                                                            </button>

                                                                            <button type="submit"
                                                                                    class="btn btn-danger">
                                                                                Hapus
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection