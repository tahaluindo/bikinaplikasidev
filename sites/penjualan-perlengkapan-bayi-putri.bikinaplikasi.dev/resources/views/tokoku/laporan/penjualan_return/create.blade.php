@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-clipboard-list fa-fw"></span> Laporan Return Penjualan</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="POST" action="{{route('laporanPenjualanReturn')}}" autocomplete="off">
                    {{csrf_field()}}
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Awal</label>
                        <input id="datepicker" type="text" name="tanggal_awal" class="form-control" value="{{ date('Y-m-d') }}"
                            width="276" required>
                    </div>
                   
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Akhir</label>
                        <input id="datepicker2" type="text" name="tanggal_akhir" class="form-control" value="{{ date('Y-m-d') }}"
                            width="276" required>
                    </div>
                    
                    <div class="col-md-12">
                        <button class="btn btn-success" type="submit">Print</button>
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