@extends('layouts.index')

@section('content')

<div class="block-header">
</div>
<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Type
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <h2 class="card-inside-title">Tambah Type</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form id="form_validation" method="POST" action='{{ url("type/$data->id") }}'>
                            @method('put')
                            {{ csrf_field() }}
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('nama') ? "focused error" : "" }}">
                                    <label>Nama Type *</label>
                                    <input name='nama' value='{{ $data->nama }}' type="text" class="form-control" placeholder="Nama" maxlength="50" minlength="1" />
                                </div>
                                @if($errors->has('nama'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('nama') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('harga_harian') ? "focused error" : "" }}">
                                    <label>Harga Harian *</label>
                                    <input name='harga_harian'   value='{{ $data->harga_harian }}' class="form-control cleave1" placeholder="Harga Harian" min='0' max='999999999' />
                                    @if($errors->has('harga_harian'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('harga_harian') }}</label>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-line {{ $errors->has('harian_tambahan') ? "focused error" : "" }}">
                                    <label>Harian Tambahan * (Biaya tambahan per orang per hari jika lebih dari 1)</label>
                                    <input name='harian_tambahan' class="form-control cleave5" placeholder="Harian Tambahan"  value='{{ $data->harian_tambahan }}' min='0' max='999999999' />
                                    @if($errors->has('harian_tambahan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('harian_tambahan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('harga_mingguan') ? "focused error" : "" }}">
                                    <label>Harga Mingguan *</label>
                                    <input  name='harga_mingguan'  value='{{ $data->harga_mingguan }}' class="form-control cleave2" placeholder="Harga Mingguan" min='0' max='999999999' />
                                    @if($errors->has('harga_mingguan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('harga_mingguan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('mingguan_tambahan') ? "focused error" : "" }}">
                                    <label>Mingguan Tambahan * (Biaya tambahan  per orang per minggu jika lebih dari 1)</label>
                                    <input name='mingguan_tambahan' class="form-control cleave6" placeholder="Mingguan Tambahan"  value='{{ $data->mingguan_tambahan }}' min='0' max='999999999' />
                                    @if($errors->has('mingguan_tambahan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('mingguan_tambahan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('harga_bulanan') ? "focused error" : "" }}">
                                    <label>Harga Bulanan *</label>
                                    <input  name='harga_bulanan'  value='{{ $data->harga_bulanan }}' class="form-control cleave3" placeholder="Harga Bulanan" min='0' max='999999999' />
                                    @if($errors->has('harga_bulanan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('harga_bulanan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('bulanan_tambahan') ? "focused error" : "" }}">
                                    <label>Bulanan Tambahan * (Biaya tambahan per orang per bulan jika lebih dari 1)</label>
                                    <input name='bulanan_tambahan' class="form-control cleave7" placeholder="Bulanan Tambahan"  value='{{ $data->bulanan_tambahan }}' min='0' max='999999999' />
                                    @if($errors->has('bulanan_tambahan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('bulanan_tambahan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('harga_tahunan') ? "focused error" : "" }}">
                                    <label>Harga Tahunan *</label>
                                    <input  name='harga_tahunan'  value='{{ $data->harga_tahunan }}' class="form-control cleave4" placeholder="Harga Tahunan" min='0' max='999999999' />
                                    @if($errors->has('harga_tahunan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('harga_tahunan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('tahunan_tambahan') ? "focused error" : "" }}">
                                    <label>Tahunan Tambahan * (Biaya tambahan per orang per tahun jika lebih dari 1)</label>
                                    <input name='tahunan_tambahan' class="form-control cleave8" placeholder="Tahunan Tambahan"  value='{{ $data->tahunan_tambahan }}' min='0' max='999999999' />
                                    @if($errors->has('tahunan_tambahan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('tahunan_tambahan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('fasilitas') ? "focused error" : "" }}">
                                    <label>Fasilitas (pisahkan dengan koma):</label>
                                    <input name='fasilitas' type="text" class="form-control" placeholder="Fasilitas (Pisahkan Dengan Koma)" maxlength="200" value='{{ $data->fasilitas }}' required />
                                </div>
                                @if($errors->has('fasilitas'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('fasilitas') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <button type="submit" class="btn bg-blue waves-effect">
                                        <i class="material-icons">save</i>
                                        <span class="icon-name">Save</span>
                                    </button>

                                    <button type="reset" class="btn btn-warning waves-effect">
                                        <i class="material-icons">refresh</i>
                                        <span class="icon-name">Reset</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection