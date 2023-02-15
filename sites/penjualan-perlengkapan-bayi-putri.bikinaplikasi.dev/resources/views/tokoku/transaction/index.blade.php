@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-clipboard-list fa-fw"></span> Riwayat Transaksi</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                @if(session()->has('status'))
                <script>
                    alert("{{session()->get('status')}}")
                </script>
                @endif
            </div>
            @if(auth()->user()->role != 'U')
            <div class="col-md-12 mb-4">
                <a href="{{route('trCreate')}}" class="btn btn-success"><span class="fa fa-cash-register fa-fw"></span> Transaksi Baru</a>
            </div>
            @endif

            <div class="table-responsive">
                <table id="dataTables" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Status</th>
                        {{-- <th>Harga</th> --}}
                        <th>Jumlah</th>
                        @if(auth()->user()->role == 'U')
                        <th>Opsi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @if($data['parse']->count() == 0)
                    <tr>
                        <td colspan="8"> No Data </td>
                    </tr>
                    @else
                    @foreach ($data['parse'] as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->product->code}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>@if($item->type == 'S') <span class="badge badge-danger">{{$item->type == 'S' ? 'Jual':'Beli'}}</span> @elseif($item->type == 'retur_barang') <span class="badge badge-info">{{ $item->type }}</span> @elseif($item->type == 'return_penjualan') <span class="badge badge-warning">{{ $item->type }}</span> @else <span class="badge badge-success">{{$item->type == 'S' ? 'Jual':'Beli'}}</span> @endif </td>
                        {{-- <td>Rp{{number_format($item->price, 0, ',', '.')}}</td> --}}
                        <td>{{ abs($item->qty) }}</td>
                        {{-- <td>@if($item->type == 'S'){{abs($item->qty)*-1}}@else{{$item->qty}}@endif</td> --}}
                        @if(auth()->user()->role == 'U')
                        <td>
                            <a href="#deleteConfirm" type="button" class="btn btn-danger btn-sm delete" data-text="{{$item->product->name}}" data-value="{{$item->id}}">Hapus</a>
                        </td>
                        @endif
                        
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="deleteConfirm" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <form method="POST" action="{{route('trDelete')}}">
        {{method_field('delete')}}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus transaksi <strong class="modalDataText"></strong> ?</p>
                <input type="hidden" name="id" value="" class="modalDataValue">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">OK</button>
            </div>
        </div>
        {{csrf_field()}}
        </form>
    </div>
</div>
@endsection