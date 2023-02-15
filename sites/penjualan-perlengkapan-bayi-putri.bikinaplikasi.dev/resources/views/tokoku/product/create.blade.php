@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-plus-square fa-fw"></span> Barang Baru</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="POST" action="{{route('pdStore')}}" autocomplete="off" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="col-md-12 mb-4">
                    <label>Supplier</label>
                    <select class="form-control" name="supplier_id" required>
                        @if ($data['supplier']->count() == 0)
                            <option value="">Belum Ada Supplier</option>
                        @else
                            <option value="">-- Pilih --</option>
                            @foreach ($data['supplier'] as $opt)
                                <option value="{{$opt->id}}" {{old('supplier_id') == $opt->id ? 'selected':''}}>{{$opt->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-12 mb-2">
                    <label>Kode Barang</label>
                    <input type="text" name="code" class="form-control" value="{{old('code')}}" maxlength="10" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label>Deskripsi Barang</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" maxlength="100" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label>Harga Beli Satuan</label>
                    <input type="number" name="price" class="form-control" value="{{old('price')}}" maxlength="20" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label>Harga Beli Grosiran</label>
                    <input type="number" name="price_grosiran" class="form-control" value="{{old('price_grosiran')}}" maxlength="20" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label>Stok Minimum</label>
                    <input type="number" name="warn_stock" class="form-control" value="{{old('warn_stock')}}" maxlength="11" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label>Satuan Barang</label>
                    <select class="form-control" name="measure_id" required>
                        @if ($data['measure']->count() == 0)
                        <option value="">Belum Ada Satuan Barang</option>
                        @else
                        {{-- <option value="">-- Pilih --</option> --}}
                        @foreach ($data['measure'] as $opt)
                        <option value="{{$opt->id}}" {{old('measure_id') == $opt->id ? 'selected':''}}>{{$opt->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-12 mb-2">
                    <label>Berat</label>
                    <input type="number" name="berat" class="form-control" value="{{old('berat')}}" maxlength="11" required>
                </div>

                <div class="col-md-12 mb-2">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" maxlength="11" required>
                </div>

                <div class="col-md-12">
                    <a href="{{route('pdIndex')}}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
                </form>
            </div>

            <div class="col-md-6 mb-3">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</main>
@endsection