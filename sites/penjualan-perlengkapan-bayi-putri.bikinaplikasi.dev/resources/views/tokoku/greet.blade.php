@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dasbor</h1>
    </div>
    <div class="container">
        <h1 class="mt-5">Selamat Datang di <span style="font-family: 'Chewy', cursive;">Aplikasi 3R Baby Shop Kota Jambi </span></h1>
        <p>Hai, <b>{{ Auth::user()->name }}</b></p>
        <hr />
        @if(auth()->user()->role != 'U')
        <div class="row">
            <div class="col-md-3">
                <h3>Barang Baru</h3>
                <p>Anda bisa menambahkan barang / produk baru disini</p>
                <p><a class="btn btn-success" href="{{route('pdCreate')}}" role="button"><span class="fa fa fa-plus"></span> Tambah</a></p>
            </div>
            <div class="col-md-3">
                <h3>Supplier</h3>
                <p>Anda bisa menambah supplier baru disini </p>
                <p><a class="btn btn-info" href="{{route('whCreate')}}" role="button"><span class="fa fa fa-plus"></span> Tambah</a></p>
            </div>
            {{-- <div class="col-md-3">
                <h3>Perhitungan Fisik</h3>
                <p>Tetapkan stok barang terlebih dahulu sebelum memulai proses jual / beli</p>
                <p><a class="btn btn-primary" href="{{route('soCreate')}}" role="button"><span class="fa fa fa-plus"></span> Perhitungan Fisik</a></p>
            </div> --}}
            <div class="col-md-3">
                <h3>Jual / Beli / Return</h3>
                <p>Lakukan transaksi jual beli / return barang disini</p>
                <p><a class="btn btn-primary" href="{{route('trCreate')}}" role="button"><span class="fa fa fa-plus"></span> Tambah</a></p>
            </div>
            <div class="col-md-3">
                <h3>Laporan Penjualan</h3>
                <p>Laporan barang yang telah terjual ke pelanggan</p>
                <p><a class="btn btn-primary" href="{{route('laporanPenjualanCreate')}}" role="button"><span class="fa fa-calendar-alt"></span> Lihat</a></p>
            </div>
            <div class="col-md-3">
                <h3>Laporan Pembelian</h3>
                <p>Laporan barang yang telah dibeli dari supplier</p>
                <p><a class="btn btn-primary" href="{{route('laporanPembelianCreate')}}" role="button"><span class="fa fa-calendar-alt"></span> Lihat</a></p>
            </div>
            <div class="col-md-3">
                <h3>Retur Barang</h3>
                <p>Laporan barang yang telah dikembalikan ke supplier</p>
                <p><a class="btn btn-primary" href="{{route('laporanPembelianReturnCreate')}}" role="button"><span class="fa fa-calendar-alt"></span> Lihat</a></p>
            </div>
            <div class="col-md-3">
                <h3>Laporan Barang</h3>
                <p>Laporan barang yang telah yang tersedia</p>
                <p><a class="btn btn-primary" href="{{route('laporanBarangCreate')}}" role="button"><span class="fa fa-calendar-alt"></span> Lihat</a></p>
            </div>
        </div>
        @endif
    </div>
</main>
@endsection