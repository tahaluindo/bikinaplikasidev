@if(request()->segment(4) == "create")
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne">
                        Tambahkan 1 per satu
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="form-group {{ $errors->has('ayat') ? 'has-error' : ''}}">
                        <label for="ayat" class="control-label">{{ 'ayat' }}</label>

                        <input placeholder="ayat"
                               class="form-control form-control-line @error('ayat') is-invalid @enderror"
                               name="ayat"
                               type="text" id="ayat" value="{{ isset($ayat->ayat) ? $ayat->ayat : old('ayat') }}"
                               >

                        @error('ayat')
                        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                        @enderror
                    </div>

                    <div class="form-group {{ $errors->has('isi') ? 'has-error' : ''}}">
                        <label for="isi" class="control-label">{{ ucwords('Isi') }}</label>

                        <textarea class="form-control" rows="5" name="isi" type="textarea" id="editor-0"
                                  placeholder="isi"
                        >{{ isset($ayat->isi) ? $ayat->isi : old('isi')}}</textarea>

                        @error('isi')
                        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                        Tambahkan Sekaligus Banyak (jarak 2x enter)
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="form-group {{ $errors->has('items') ? 'has-error' : ''}}">
                        <label for="items" class="control-label">{{ ucwords('Items') }}</label>

                        <textarea class="form-control" rows="5" name="items" type="textarea" id="editor-0"
                                  placeholder="#1# ini isi ayat 1 
   
                              
#2# ini isi ayat 2"
                        >{{ isset($ayat->items) ? $ayat->items : old('items')}}</textarea>

                        @error('items')
                        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    @else 
    <div class="form-group {{ $errors->has('ayat') ? 'has-error' : ''}}">
                        <label for="ayat" class="control-label">{{ 'ayat' }}</label>

                        <input placeholder="ayat"
                               class="form-control form-control-line @error('ayat') is-invalid @enderror"
                               name="ayat"
                               type="text" id="ayat" value="{{ isset($ayat->ayat) ? $ayat->ayat : old('ayat') }}">

                        @error('ayat')
                        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                        @enderror
                    </div>

                    <div class="form-group {{ $errors->has('isi') ? 'has-error' : ''}}">
                        <label for="isi" class="control-label">{{ ucwords('Isi') }}</label>

                        <textarea class="form-control" rows="5" name="isi" type="textarea" id="editor-0"
                                  placeholder="isi"
                        >{{ isset($ayat->isi) ? $ayat->isi : old('isi')}}</textarea>

                        @error('isi')
                        <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                        @enderror
                    </div>

@endif


    <input type="hidden" name="judul_id" value="{{ request()->judul_id }}">

    <div class="form-group">
        <div class="col-sm-12">
            <button class="btn btn-success" type="submit">Simpan</button>
        </div>
    </div>

    <script>
        var q = "";
        var placeholder = "";
        var urlSearch = "";
    </script>