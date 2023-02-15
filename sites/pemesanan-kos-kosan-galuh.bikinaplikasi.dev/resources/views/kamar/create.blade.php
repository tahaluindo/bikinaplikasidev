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
                    Kamar
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
                <h2 class="card-inside-title">Tambah Kamar</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form id="form_validation" method="POST" action='{{ url("kamar") }}'>
                            {{ csrf_field() }}

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('type_id') ? "focused error" : "" }}">
                                    <label>Pilih Type Kamar *</label>
                                    <select name="type_id" class="form-control" required>
                                        <option value="">--Pilih Type--</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" @if($type->id == old('type_id')) selected @endif>
                                                Nama: {{ $type->nama }} | Harian: {{ $format_idr($type->harga_harian) }} | Mingguan: {{ $format_idr($type->harga_mingguan) }} | Bulanan: {{ $format_idr($type->harga_bulanan) }} | Tahunan: {{ $format_idr($type->harga_tahunan) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($errors->has('type_id'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('type_id') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('nomor') ? "focused error" : "" }}">
                                    <label>Inputkan Nomor Kamar *</label><br>
                                    <span>Nomor Telah Dipakai: ({{ $nomorTelahDipakai }})</span>
                                    <input name='nomor'  type="number" class="form-control" placeholder="Nomor"  value='{{ old("nomor") }}' min='1' max='100' />
                                    @if($errors->has('nomor'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('nomor') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('status') ? "focused error" : "" }}">
                                    <label>Pilih Status Kamar *</label>
                                    <select name="status" id='status' class="form-control" required>
                                        <option value="">--Pilih Status Kamar--</option>
                                            {{-- <option value="Terisi" @if("Terisi" == old("status")) selected @endif>Terisi</option> --}}
                                            <option value="Kosong" @if("Kosong" == old("status")) selected @endif>Kosong</option>
                                            <option value="Rusak" @if("Rusak" == old("status")) selected @endif>Rusak</option>
                                    </select>
                                </div>
                                @if($errors->has('status'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('status') }}</label>
                                @endif
                            </div>
{{-- 
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('jumlah_penghuni') ? "focused error" : "" }}">
                                    <input  name='jumlah_penghuni' id='jumlah_penghuni' type="number" class="form-control" placeholder="Jumlah Penghuni"  value='{{ old("jumlah_penghuni") }}'  min='0' max='5' />
                                    @if($errors->has('jumlah_penghuni'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('jumlah_penghuni') }}</label>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-line {{ $errors->has('lokasi') ? "focused error" : "" }}">
                                            <label>Inputkan Lokasi Kamar *</label>
                                            <input name='lokasi'  id='lokasi' type="text" class="form-control" placeholder="Lokasi"  value='{{ old("lokasi") }}' min='0' max='100' />
                                            @if($errors->has('lokasi'))
                                                <label id="name-error" class="error" for="name">{{ $errors->first('harga_harian') }}</label>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-line">
                                            <label>Lokasi Yang Pernah Ditambahkan</label>
                                            <select  class="form-control" id='kamar_lokasi_existed'>
                                            <option value="">--Atau Pilih Berdasarkan Lokasi Yang Pernah Ditambahkan--</option>
                                            @foreach($kamar_lokasi_existeds as $kamar_lokasi_existed)
                                                <option @if($kamar_lokasi_existed->lokasi == old('lokasi'))  selected @endif value="{{ $kamar_lokasi_existed->lokasi }}"> {{ $kamar_lokasi_existed->lokasi }} | Total Kamar: {{ $kamar->where('lokasi', $kamar_lokasi_existed->lokasi)->count() }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('keterangan') ? "focused error" : "" }}">
                                <label>Tambahkan Keterangan</label>
                                    <textarea name='keterangan' class="form-control" placeholder="Deskripsi" maxlength="500">{{ old("keterangan") }}</textarea>
                                    @if($errors->has('keterangan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('keterangan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <button type="submit" class="btn bg-blue waves-effect">
                                        <i class="material-icons">add</i>
                                        <span class="icon-name">Tambah</span>
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
<script>
    $(document).ready(function(){
        $('#status').on('change', function(){
            if($(this).val() != 'Terisi')
            {
                $('#jumlah_penghuni').attr('readonly', 'readonly').val(0);
                return;
            }

            $('#jumlah_penghuni').removeAttr('readonly').val('1').attr('min', 1);
        });

        $('#kamar_lokasi_existed').on('change', function(){
            if( $(this).val() != '' )
            {
                $('#lokasi').val($(this).val());
            }else
            {
                $('#lokasi').val("");
            }
        });
    });
</script>

@endsection