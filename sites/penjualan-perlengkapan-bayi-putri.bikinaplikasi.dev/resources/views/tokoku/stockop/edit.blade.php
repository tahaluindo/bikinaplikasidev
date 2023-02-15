@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-edit fa-fw"></span> Ubah Perhitungan Fisik</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="POST" action="{{route('soUpdate',[$data['parse']->id])}}" autocomplete="off">
                {{method_field('put')}}
                {{csrf_field()}}
                <div class="col-md-12 mb-2">
                    <label>Barang</label>
                    <input type="text" class="form-control" value="{{$data['parse']->product->name}}" disabled>
                </div>
                <div class="col-md-12 mb-2">
                    <label>Jumlah Stok Tersedia</label>
                    <input type="text" name="qty" class="form-control" value="{{$data['parse']->qty}}" maxlength="20" required>
                </div>
                {{-- <div class="col-md-12 mb-2">
                    <label>Supplier</label>
                    <select class="form-control" name="supplier_id" required>
                        @if ($data['supplier']->count() == 0)
                            <option value="">Belum Ada Supplier</option>
                        @else
                            <option value="">-- Pilih --</option>
                            @foreach ($data['supplier'] as $opt)
                                <option value="{{$opt->id}}" {{$data['parse']->supplier_id == $opt->id ? 'selected':''}}>{{$opt->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div> --}}
                <div class="col-md-12 mb-4">
                </div>
                <div class="col-md-12">
                    <a class="btn btn-secondary" href="{{route('soIndex')}}">Batal</a>
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