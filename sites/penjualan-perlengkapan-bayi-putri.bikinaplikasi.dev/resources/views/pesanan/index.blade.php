@extends('layouts.pengunjung.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="fa fa-clipboard-list fa-fw"></span> Pesanan</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <table class="table">
                    <tbody>
                        <thead>
                            <tr>
                                <th width=2>No</th>
                                <th>Tggl Penjualan</th>
                                <th>Alamat Kirim</th>
                                <th>No Resi</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pesanans as $key => $pesanan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pesanan->tgl_penjualan }}</td>
                                <td>{{ $pesanan->alamat_kirim }}</td>
                                <td>{{ $pesanan->no_resi }}</td>
                                @if($pesanan->status == "Selesai")
                                <td>
                                    <span class='badge badge-success'>{{ $pesanan->status }}</span>
                                </td>
                                @else
                                <td>{{ $pesanan->status }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>
@endsection