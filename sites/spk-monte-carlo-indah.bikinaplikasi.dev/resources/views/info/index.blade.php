@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2 text-center">
        <div style="font-size: 17px; margin-bottom: 50px; text-align: left;">
                Selamat Datang, <strong>{{ auth()->user()->name }}</strong>
        </div>

        <img src="{{ url('image/logo.png') }}" width="250">
</div>

<div class="col-md-8 col-md-offset-2 text-justify" style="font-size: 17px; margin-top: 50px">
        
        <p>
        Aplikasi web ini bertujuan untuk memberikan gambaran prediksi penjualan produk di PT. Perkebunanan Nusantara VI
        (PTPN 6) Kota Jambi. Dalam aplikasi web prediksi ini dapat memprediksikan volume penjualan dan harga/Kg produk
        pada periode yang akan datang melalui laporan penjualan dari laporan Rencana Kerja dan Anggaran Perusahaan PTPN
        6 Kota Jambi. <p><p>
        Produk penjualan yang diprediksi dalam aplikasi ini adalah produk minyak sawit, inti sawit, teh ekspor, teh
        lokal dan kopi arabica. Diharapkan dengan adanya aplikasi prediksi penjualan ini dapat membantu perusahaan untuk
        memprediksi penjualan yang terdiri dari volume dan harga/Kg dengan akurasi yang baik.
    
</div>


@endsection