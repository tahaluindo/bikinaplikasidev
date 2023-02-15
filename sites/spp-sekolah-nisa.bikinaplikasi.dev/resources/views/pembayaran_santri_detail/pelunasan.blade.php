@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pembayaran Santri Detail ({{ $pembayaranSantri->keterangan }})</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Pembayaran Santri</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            action="{{ url(route('pembayaran_santri_detail.lunaskan_update', ['pembayaran_santri' => $pembayaranSantri->id, 'pembayaran_santri_detail' => $pembayaranSantriDetail->id])) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="col-md-12">User</label>
                                <div class="col-md-12">
                                    <input type="text"
                                        class="form-control form-control-line @error('user_id') is-invalid @enderror"
                                        value='{{ old('tags') == "" ? "{$pembayaranSantriDetail->user->nama} | Kelas: {$pembayaranSantriDetail->user->kelas->nama} | Id: {$pembayaranSantriDetail->user->id}" : old('tags')}}'
                                        name='tags' id='tags' required placeholder="cari user..." readonly>

                                    <input id="user_id" name='user_id' type='hidden'
                                        value="{{ old('user_id') == "" ? $pembayaranSantriDetail->user->id : old('user_id')}}">
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Bulan Pembayaran</label>
                                <div class="col-md-12">
                                    @foreach($pembayaran_santri_bulans as $index => $pembayaran_santri_bulan)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox"
                                                id="inlineCheckbox-{{ $pembayaran_santri_bulan->id }}"
                                                value="{{ $pembayaran_santri_bulan->id }}"
                                                
                                                @if(in_array($pembayaran_santri_bulan->id, old("pembayaran_santri_bulan") ?? []) || in_array($pembayaran_santri_bulan->id, $pembayaran_santri_bulan_ids))
                                                checked style='pointer-events: none;'
                                                @else
                                                disabled
                                                @endif
                                                
                                                name="pembayaran_santri_bulans[]">
                                            {{ $pembayaran_santri_bulan->nama }}
                                        </label>
                                    </div>
                                    @endforeach

                                    @error('pembayaran_santri_bulans.*')
                                    <span class="invalid-feedback" role="alert">
                                        {!! implode('', $errors->first('pembayaran_santri_bulans[]')) !!}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Nominal Belum Dibayar (Perbulan)</label>
                                <div class="col-md-12">
                                    <input id='nominal_belum_dibayar' type="number" placeholder="0"
                                        class="form-control form-control-line @error('nominal_belum_dibayar') is-invalid @enderror"
                                        value='{{ old('nominal_belum_dibayar') == "" ? $pembayaranSantriDetail->nominal_belum_dibayar : old('nominal_belum_dibayar')  }}'
                                        name='nominal_belum_dibayar' readonly>

                                    @error('nominal_belum_dibayar')
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
                                        value='{{ old('tanggal_bayar') == "" ? $pembayaranSantriDetail->tanggal_bayar : old('tanggal_bayar') }}'
                                        name='tanggal_bayar' id='tanggal_bayar'>

                                    @error('tanggal_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit" id='submit'>Lunaskan</button>
                                    <button class="btn btn-info" type="submit" name='cetak_kwitansi' id='cetak_kwitansi'
                                        value='cetak_kwitansi'>Cetak Kwitansi</button>
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
