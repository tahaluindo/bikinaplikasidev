@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pembayaran Infaq Detail ({{ $pembayaranInfaq->tahun }})</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Pembayaran Infaq</li>
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
                            action="{{ url(route('pembayaran_infaq_detail.update', ['pembayaran_infaq' => $pembayaranInfaq->id, 'pembayaran_infaq_detail' => $pembayaranInfaqDetail->id])) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="col-md-12">User</label>
                                <div class="col-md-12">
                                    <input type="text"
                                        class="form-control form-control-line @error('tags') is-invalid @enderror"
                                        value='{{ old('tags') == "" ? "{$pembayaranInfaqDetail->user->nama} | Kelas:{$pembayaranInfaqDetail->user->kelas->nama} | Id:{$pembayaranInfaqDetail->user->id}" : old('tags')}}' name='tags' id='tags' required
                                        placeholder="cari user...">

                                    <input id="user_id" name='user_id' type='hidden' value="{{ old('user_id') == "" ? $pembayaranInfaqDetail->user->id : old('user_id')}}">
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Status</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='status'>
                                        <option value="Lunas" @if(old('status')=="Lunas" || $pembayaranInfaqDetail->status == "Lunas" ) selected @endif>Lunas</option>
                                        <option value="Belum Lunas" @if(old('status')=="Belum Lunas" || $pembayaranInfaqDetail->status == "Belum Lunas"  ) selected @endif>
                                            Belum Lunas</option>
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Tanggal Bayar</label>
                                <div class="col-md-12">
                                    <input type="text"
                                        class="flatpickr form-control form-control-line @error('tanggal_bayar') is-invalid @enderror"
                                        value='{{ old('tanggal_bayar') == "" ? $pembayaranInfaqDetail->tanggal_bayar : old('tanggal_bayar') }}'
                                        name='tanggal_bayar' id='tanggal_bayar'>

                                    @error('tanggal_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Nominal Dibayar</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="0"
                                        class="form-control form-control-line @error('nominal_dibayar') is-invalid @enderror"
                                        value='{{ old('nominal_dibayar') == "" ? $pembayaranInfaqDetail->nominal_dibayar : old('nominal_dibayar')  }}'
                                        name='nominal_dibayar'>

                                    @error('nominal_dibayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--  <div class="form-group">
                                <label class="col-md-12">Catatan (Tidak Wajib)</label>
                                <div class="col-md-12">
                                    <textarea id='editor-1' style="height: 130px !important;"
                                        class="form-control form-control-line @error('catatan') is-invalid @enderror"
                                        name='catatan'>{{ old('catatan') == "" ? $pembayaranInfaqDetail->catatan : old('catatan')  }}</textarea>

                                    @error('catatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>  --}}

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit" id='submit'>Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
