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
                    Penyewa
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
                <h2 class="card-inside-title">Edit Penyewa</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        {!! Form::open(['url'=> "penyewa/{$data->id}",'files' =>true,'enctype'=>'multipart/form-data']) !!}
                            @method('put')
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('kamar_id') ? "focused error" : "" }}">
                                    <label>Pilih Kamar Yang Kosong *</label>
                                    <select name="kamar_id" class="form-control" required>
                                        <option value="">--Pilih Kamar--</option>
                                        @foreach($kamars as $kamar)
                                            <option value="{{ $kamar->id }}"  @if($kamar->id === $data->kamar_id) selected @endif >
                                                Type: {{ $kamar->type->nama }} | Nomor: {{ $kamar->nomor }} | Status: {{ $kamar->status }} | Jumlah Penghuni: {{ $kamar->jumlah_penghuni ?? 0 }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($errors->has('kamar_id'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('kamar_id') }}</label>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('type_sewa') ? "focused error" : "" }}">
                                    <label>Type Sewa *</label>
                                    <select name="type_sewa" class="form-control" required>
                                        <option value="">--Pilih Type Sewa--</option>
                                            <option value="Harian" @if("Harian" === $data->type_sewa) selected @endif>
                                                Harian
                                            </option>
                                            <option value="Mingguan" @if("Mingguan" === $data->type_sewa) selected @endif>
                                                Mingguan
                                            </option>
                                            <option value="Bulanan" @if("Bulanan" === $data->type_sewa) selected @endif>
                                                Bulanan
                                            </option>
                                            <option value="Tahunan" @if("Tahunan" === $data->type_sewa) selected @endif>
                                                Tahunan
                                            </option>
                                    </select>
                                </div>
                                @if($errors->has('type_sewa'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('type_sewa') }}</label>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('nama') ? "focused error" : "" }}">
                                    <label>Nama Penyewa *</label>
                                    <input name='nama' type="text" class="form-control" placeholder="Nama" maxlength="50" minlength="1" value="{{ $data->nama }}" />
                                </div>
                                @if($errors->has('nama'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('nama') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('jumlah_penghuni') ? "focused error" : "" }}">
                                    <label>Jumlah Penghuni Disatu Kamar * (Berlaku biaya tambahan sesuai type)</label>
                                    <input name='jumlah_penghuni'  type="number" class="form-control" placeholder="Jumlah Penghuni Dikamar"  value='{{ $data->kamar->jumlah_penghuni ?? 0 }}' min='1' max='3' />
                                    @if($errors->has('jumlah_penghuni'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('jumlah_penghuni') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('no_hp') ? "focused error" : "" }}">
                                    <label>Nomer Hp *</label>
                                    <input name='no_hp'  type="number" class="form-control" placeholder="No Hp"  value='{{ $data->no_hp }}' min='99999' max='999999999999999' />
                                    @if($errors->has('no_hp'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('no_hp') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('foto_identitas') ? "focused error" : "" }}">
                                    <label>Foto Identitas (Contoh: KTP/SIM/PASPORT) *</label>
                                    <input name='foto_identitas'  type="file" class="form-control"/>
                                    @if($errors->has('foto_identitas'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('foto_identitas') }}</label>
                                    @endif
                                </div>
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
<!-- #END# Input -->
@endsection