<div class='row'>
    <div class='col-md-6'>
    <form class="form-horizontal form-material" action="{{ url(route('pesanan.print')) }}"
    method="post" enctype="multipart/form-data">
    @csrf
        
    <div class="form-group">
        <label class="col-md-12">Tanggal Awal</label>
        <div class="col-md-12">
            <input type="date" 
                class="form-control form-control-line" id="example-tanggal_awal"
                value='{{ old('tanggal_awal') }}' name='tanggal_awal' min=1 required>
            
            @error('tanggal_awal')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-md-12">Tanggal Akhir</label>
        <div class="col-md-12">
            <input type="date" 
                class="form-control form-control-line" id="example-tanggal_akhir"
                value='{{ old('tanggal_akhir') }}' name='tanggal_akhir' min=1 required>
            
            @error('tanggal_akhir')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
        
        
    <div class="form-group">
        <label class="col-md-12">Field</label>
        <div class="col-md-12">
            <select class="form-control form-control-line" name='field'  required>
                @foreach(['penjual_id','meja_id','atas_nama','status'] as $field)
                <option value="{{ $field }}" @if(old('field')==$field)
                    selected @endif>{{ ucwords(preg_replace("/_/", " ", $field)) }}</option>
                @endforeach
            </select>
            @error('field')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-md-12">Order</label>
        <div class="col-md-12">
            <select class="form-control form-control-line" name='order'  required>
                @foreach(['ASC', 'DESC'] as $order)
                <option value="{{ $order }}" @if(old('order')==$order)
                    selected @endif>{{ $order }}</option>
                @endforeach
            </select>
            @error('order')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
            
    <div class="form-group">
        <label class="col-md-12">Status</label>
        <div class="col-md-12">
            <select class="form-control form-control-line" name='status'  required>
                @foreach(['Dibayar','Diproses','Dibatalkan'] as $status)
                <option value="{{ $status }}" @if(old('status')==$status)
                    selected @endif>{{ ucwords(preg_replace("/_/", " ", $status)) }}</option>
                @endforeach
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
        
    <div class="form-group">
        <div class="col-sm-12">
            <button name='preview' value='true' class="btn btn-info" type="submit">Preview</button>
            <button class="btn btn-primary" type="submit">Print Html</button>
{{--            <button name='print_excel' value='true'  class="btn btn-success" type="submit">Print Excel</button>--}}
        </div>
    </div>
</form>
</div>
</div>