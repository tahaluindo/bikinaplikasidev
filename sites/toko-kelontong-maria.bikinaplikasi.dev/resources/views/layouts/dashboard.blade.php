<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header" style="margin-bottom: 0px;">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <!-- [ Main Content ] start -->
                        <div class="row">

                            <div class="col-xl-6 col-md-6">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>Pembeli</h5>
                                    </div>
                                    <div class="card-body px-3 py-3">
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

                                        <div class="table-stats order-table ov-h table-responsive">

                                            <table class="table" id='dataTable'>
                                                <thead>
                                                <tr>
                                                    <th width=2>#</th>
                                                    <th>Pembeli Id</th>
                                                    <th>Total Hutang</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($pembeli as $item)
                                                    <tr data-id='{{ $item->id }}'>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>

                                                        <td>{{ $item->nama }}</td>
                                                                                                                
                                                        <td>{{ toIdr($item->tagihans->sum('total')) }}</td>

                                                        <td class="text-center">
                                                            @if($item->tagihans->sum('total'))
                                                            <a class="label label-success" onclick="return confirm('Yakin akan melunaskan semua tagihan?');"
                                                               href="{{ url('/tagihan/' . $item->id . '/lunaskan-semua') }}">Lunaskan
                                                                Semua</a>
                                                            @endif

                                                            <a class="label label-secondary"
                                                               href="{{ url('/tagihan/' . $item->id . '/tambah') }}">Detail Tagihan ({{ isset($item->tagihans) ? $item->tagihans->count() : 0 }})</a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h5>Tambah Pembeli</h5>
                                    </div>
                                    <div class="card-body px-3 py-3">

                                        <form class="form-horizontal form-material"
                                              action="{{ url('/pembeli') }}"
                                              method="post" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="from_dashboard" value="ya">

                                            <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                                <label for="nama" class="control-label">{{ ucwords('Nama') }}</label>
                                                <input placeholder="nama"
                                                       class="form-control form-control-line @error('nama') is-invalid @enderror"
                                                       name="nama"
                                                       type="text" id="nama"
                                                       value="{{ isset($pembeli->nama) ? $pembeli->nama : old('nama') }}"
                                                       required>

                                                @error('nama')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>

                                            <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
                                                <label for="keterangan"
                                                       class="control-label">{{ ucwords('Keterangan (Tidak Wajib)') }}</label>

                                                <input class="form-control" rows="5" name="keterangan"
                                                          type="textarea" id="keterangan" placeholder="keterangan"
                                                           value="{{ isset($pembeli->keterangan) ? $pembeli->keterangan : old('keterangan')}}">

                                                @error('keterangan')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit" name="button" value="buat-tagihan">Buat Tagihan</button>
                                                <button class="btn btn-secondary" type="submit" name="button" value="simpan">Simpan</button>
                                            </div>

                                        </form>
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
<!-- [ Main Content ] end -->
