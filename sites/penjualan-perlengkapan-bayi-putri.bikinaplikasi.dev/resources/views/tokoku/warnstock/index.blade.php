@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-exclamation fa-fw"></span> Laporan Stok</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="float-left dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Supplier
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('wsIndex')}}">SEMUA</a>
                        @if($data['supplier']->count() > 0)
                        @foreach($data['supplier'] as $item)
                        <a class="dropdown-item" href="{{route('wsSortByWh',[$item->id])}}">{{$item->name}}</a>
                        @endforeach
                        @endif
                    </div>
                </div>
                &nbsp;
                {{-- <a class="btn btn-info" target="_blank" href="{{Request::segment(2) == '' ? route('wsExport','all'):route('wsExport',Request::segment(2))}}">Ekspor</a> --}}
            </div>
            <div class="table-responsive mb-4">
                <table id="dataTables" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Supplier</th>
                        <th>Kode Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Harga Satuan</th>
                        <th>Harga Grosiran</th>
                        <th>Stok Minimum</th>
                        <th>Total Stok</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($data['parse']) == 0)
                    <tr>
                        <td colspan="9"> No Data </td>
                    </tr>
                    @else
                    @foreach ($data['parse'] as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item[0]->product->supplier->name}}</td>
                        <td>{{$item[0]->product->code}}</td>
                        <td>{{$item[0]->product->name}}</td>
                        <td>Rp{{number_format($item[0]->product->price, 0, ',', '.')}}</td>
                        <td>Rp{{number_format($item[0]->product->price_grosiran, 0, ',', '.')}}</td>
                        <td>{{$item[0]->product->warn_stock}}</td>
                        <td>{{$item[0]->total_stock()}}</td>
                        <td>
                            @if($item[0]->total_stock() <= $item[0]->product->warn_stock)
                            <span class="badge badge-danger">Stok Rendah</span>
                            @else
                            <span class="badge badge-success">Aman</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection