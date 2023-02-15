@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Transaksi Lainnya</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item">Transaksi Lainnya</li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal form-material"
                            action="{{ route('transaksi_lainnya.update', ['transaksi_lainnya' => $transaksiLainnya->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="col-md-12">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Pembelian x"
                                        class="form-control form-control-line @error('nama') is-invalid @enderror"
                                        value='{{ old('nama') == "" ? $transaksiLainnya->nama : old('nama') }}' name='nama'>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Jenis</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='jenis'>
                                        <option value="Pengeluaran" @if(old('jenis') == "Pengeluaran" || $transaksiLainnya->jenis == "Pengeluaran") selected @endif>Pengeluaran</option>
                                        <option value="Pemasukan" @if(old('jenis') == "Pemasukan" || $transaksiLainnya->jenis == "Pemasukan") selected @endif>Pemasukan</option>
                                    </select>

                                    @error('jenis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
