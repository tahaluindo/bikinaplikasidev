@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-list-ol fa-fw"></span> Perhitungan Fisik</h1>
    </div>
    <div class="container mb-5">
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
                <a href="{{route('soCreate')}}" class="btn btn-primary">Buat Baru</a>
            </div>
            @endif

            <div class="table-responsive mb-4">
                <table id="dataTables" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Deskripsi Barang</th>
                            <th>Harga Satuan</th>
                            <th>Harga Grosiran</th>
                            <th>Stok Minimum</th>
                            <th>SO Periode ini</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data['parse']) == 0)
                        <tr>
                            <td colspan="8"> No Data </td>
                        </tr>
                        @else
                        @foreach ($data['parse'] as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->product->code}}</td>
                            <td>{{$item->product->name}}</td>
                            <td>Rp{{number_format($item->product->price, 0, ',', '.')}}</td>
                            <td>Rp{{number_format($item->product->price_grosiran, 0, ',', '.')}}</td>
                            <td>{{$item->product->warn_stock}}</td>
                            <td>{{$item->qty}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Grup">
                                    <a href="{{route('soEdit',[$item->id])}}" type="button"
                                        class="btn btn-info btn-sm">Ubah</a>
                                        @if(auth()->user()->role != 'U')
                                    <a href="#deleteConfirm" type="button" class="btn btn-danger btn-sm delete"
                                        data-text="{{$item->product->name}}" data-value="{{$item->id}}">Hapus</a>
                                        @endif
                                </div>
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
<!-- Modal -->
<div class="modal fade" id="deleteConfirm" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <form method="POST" action="{{route('soDelete')}}">
            {{method_field('delete')}}
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan menghapus <strong class="modalDataText"></strong> dari Perhitungan Fisik periode saat
                        ini?</p>
                    <input type="hidden" name="id" value="" class="modalDataValue">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">OK</button>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection