@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 50px;">


            <div class="col-md-8">
                @if(count(session()->all()))

                    @if(session()->has("error"))
                        <div class="alert alert-danger  text-center" role="alert">
                            {{ session()->get("error") }}
                        </div>
                    @elseif(session()->has("success"))
                        <div class="alert alert-success  text-center" role="alert">
                            {{ session()->get("success") }}
                        </div>
                    @elseif(session()->has("warning"))
                        <div class="alert alert-warning  text-center" role="alert">
                            {{ session()->get("warning") }}
                        </div>
                    @endif

                @endif

                <div class="card">
                    <div class="card-header">{{ __('Booking Kamar') }} <a style="float: right;" class="btn btn-sm btn-info text-white pull-right" href="{{ route('login') }}">Login</a> </div>

                    <div class="card-body">
                        <form action="{{ url('/penyewa/register-from-booking') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="hidden" name="from_booking" value="yes">

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('kamar_id') ? "focused error" : "" }}">
                                    <label>Pilih Kamar Yang Kosong *</label>
                                    <select name="kamar_id" class="form-control" required>
                                        <option value="">--Pilih Kamar--</option>
                                        @foreach($kamars as $kamar)
                                            <option value="{{ $kamar->id }}"
                                                    @if($kamar->id === old('kamar_id')) selected @endif >
                                                Type: {{ $kamar->type->nama }} | Nomor: {{ $kamar->nomor }} |
                                                Status: {{ $kamar->status }} | Jumlah
                                                Penghuni: {{ $kamar->jumlah_penghuni }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($errors->has('kamar_id'))
                                    <label id="name-error" class="error"
                                           for="name">{{ $errors->first('kamar_id') }}</label>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('type_sewa') ? "focused error" : "" }}">
                                    <label>Type Sewa *</label>
                                    <select name="type_sewa" class="form-control" required>
                                        <option value="">--Pilih Type Sewa--</option>
                                        <option value="Harian" @if("Harian" === old('type_sewa')) selected @endif>
                                            Harian
                                        </option>
                                        <option value="Mingguan"
                                                @if("Mingguan" === old('type_sewa')) selected @endif>
                                            Mingguan
                                        </option>
                                        <option value="Bulanan" @if("Bulanan" === old('type_sewa')) selected @endif>
                                            Bulanan
                                        </option>
                                        <option value="Tahunan" @if("Tahunan" === old('type_sewa')) selected @endif>
                                            Tahunan
                                        </option>
                                    </select>
                                </div>
                                @if($errors->has('type_sewa'))
                                    <label id="name-error" class="error"
                                           for="name">{{ $errors->first('type_sewa') }}</label>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('nama') ? "focused error" : "" }}">
                                    <label>Nama Penyewa *</label>
                                    <input name='nama' type="text" class="form-control" placeholder="Nama"
                                           maxlength="50" minlength="1" value="{{ old('nama') }}"/>
                                </div>
                                @if($errors->has('nama'))
                                    <label id="name-error" class="error"
                                           for="name">{{ $errors->first('nama') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('jumlah_penghuni') ? "focused error" : "" }}">
                                    <label>Jumlah Penghuni Disatu Kamar * (Berlaku biaya tambahan sesuai
                                        type)</label>
                                    <input name='jumlah_penghuni' type="number" class="form-control"
                                           placeholder="Jumlah Penghuni Dikamar"
                                           value='{{ old('jumlah_penghuni') }}' min='1' max='3'/>
                                    @if($errors->has('jumlah_penghuni'))
                                        <label id="name-error" class="error"
                                               for="name">{{ $errors->first('jumlah_penghuni') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('no_hp') ? "focused error" : "" }}">
                                    <label>Nomer Hp *</label>
                                    <input name='no_hp' type="number" class="form-control" placeholder="No Hp"
                                           value='{{ old('no_hp') }}' min='99999' max='999999999999999'/>
                                    @if($errors->has('no_hp'))
                                        <label id="name-error" class="error"
                                               for="name">{{ $errors->first('no_hp') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('foto_identitas') ? "focused error" : "" }}">
                                    <label>Foto Identitas (Contoh: KTP/SIM/PASPORT) *</label>
                                    <input name='foto_identitas' type="file" class="form-control" required/>
                                    @if($errors->has('foto_identitas'))
                                        <label id="name-error" class="error"
                                               for="name">{{ $errors->first('foto_identitas') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group" style="display: none;">
                                <div class="form-line">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <input name='tambah_tagihan_langsung' type="checkbox" class="filled-in"
                                                   id="ig_checkbox">
                                            <label for="ig_checkbox">Tambah Tagihan Otomatis (Langsung ke form renew tagihan)</label>
                                        </span>
                                        <div class=""></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <button type="submit" class="btn bg-blue waves-effect">
                                        <span class="icon-name">Simpan</span>
                                    </button>

                                    <button type="reset" class="btn btn-warning waves-effect">
                                        <span class="icon-name">Reset</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
