@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Tambah Rekening Donasi </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <form class="form-horizontal form-material"
                                      action="{{ url('/pengaturan/rekening-donasi/' . $rekening_donasi->id) }}"
                                      method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method("put")

                                    <div class="form-group {{ $errors->has('rekening_donasi') ? 'has-error' : ''}}">
                                        <label for="bank" class="control-label">{{ 'Rekening Donasi' }}</label>

                                        <div class="col-md-12">

                                            <select name="bank" class="form-control form-control-line" id="jk" required>
                                                @foreach (json_decode('{"Bri":"Bri","Bni":"Bni","Bca":"Bca","Mandiri":"Mandiri"}', true) as $optionKey => $optionValue)
                                                    <option {{ $optionValue == $rekening_donasi->bank ? "selected" : "" }} value="{{ $optionKey }}" {{ (isset($rekening_donasi->bank) && $rekening_donasi->bank == $optionKey) || old('jk') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                                                @endforeach
                                            </select>

                                            @error('bank')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('atas_nama') ? 'has-error' : ''}}">
                                        <label for="atas_nama" class="control-label">{{ 'Atas Nama' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="atas_nama"
                                                   class="form-control form-control-line @error('atas_nama') is-invalid @enderror"
                                                   name="atas_nama" type="text" id="atas_nama"
                                                   value="{{ isset($rekening_donasi->atas_nama) ? $rekening_donasi->atas_nama : old('atas_nama') }}">

                                            @error('atas_nama')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('no_rekening') ? 'has-error' : ''}}">
                                        <label for="no_rekening" class="control-label">{{ 'Atas Nama' }}</label>

                                        <div class="col-md-12">
                                            <input placeholder="no_rekening"
                                                   class="form-control form-control-line @error('no_rekening') is-invalid @enderror"
                                                   name="no_rekening" type="text" id="no_rekening"
                                                   value="{{ isset($rekening_donasi->no_rekening) ? $rekening_donasi->no_rekening : old('no_rekening') }}">

                                            @error('no_rekening')
                                            <span class="invalid-feedback text-danger" role="alert">
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
        </div>
    </div>

@endsection