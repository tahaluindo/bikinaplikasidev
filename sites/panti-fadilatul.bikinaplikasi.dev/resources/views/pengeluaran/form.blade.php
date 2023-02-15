<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    <label for="jumlah" class="control-label">{{ 'Jumlah' }}</label>
    
<div class="col-md-12">
    <input placeholder="jumlah" class="form-control form-control-line @error('jumlah') is-invalid @enderror" name="jumlah" type="number" id="jumlah" value="{{ isset($pengeluaran->jumlah) ? $pengeluaran->jumlah : old('jumlah') }}" required>
    
    @error('jumlah')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'Tanggal' }}</label>
    
<div class="col-md-12">
    <input placeholder="tanggal" class="form-control form-control-line @error('tanggal') is-invalid @enderror" name="tanggal" type="date" id="tanggal" value="{{ isset($pengeluaran->tanggal) ? $pengeluaran->tanggal : old('tanggal') }}" required>
    
    @error('tanggal')
    <span class="invalid-feedback text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

</div>
<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    <label for="keterangan" class="control-label">{{ 'Keterangan' }}</label>
    
    <div class="col-md-12">

        <textarea class="form-control" rows="5" name="keterangan" type="textarea" id="keterangan" placeholder="keterangan" required>{{ isset($pengeluaran->keterangan) ? $pengeluaran->keterangan : old('keterangan')}}</textarea>
        
        @error('keterangan')
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
