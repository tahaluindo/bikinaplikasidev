@extends('layouts.app')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header" style="margin-bottom: 0px;">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('tagihan.index') }}">Tagihan</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h5>Tambah Tagihan Untuk: <strong>{{ $pembeli->nama }}</strong>
                                            </h5>
                                        </div>
                                        <div class="card-body px-3 py-3">
                                            @if(session()->has("error"))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session()->get("error") }}
                                                </div>
                                            @elseif(session()->has("success"))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session()->get("success") }}
                                                </div>
                                            @elseif(session()->has("warning"))
                                                <div class="alert alert-warning" role="alert">
                                                    {{ session()->get("warning") }}
                                                </div>
                                            @endif

                                            <style>
                                                table {
                                                    border-spacing: 20px;
                                                }
                                            </style>


                                            <form id="form" class="form-horizontal form-material"
                                                  action="{{ url("/tagihan/$pembeli->id/tambah/store") }}"
                                                  method="post" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="pembeli_id" value="{{ $pembeli->id }}">

                                                <table>

                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="col-form-label">Tanggal</label>
                                                        </td>
                                                        <td colspan="2">
                                                            <input type="date" class="form-control" name="tanggal"
                                                                   value="{{ now()->toDateString() }}"
                                                                   style="margin-bottom: 32px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Produk</th>
                                                        <th> Berat (Kg)</th>
                                                        <th> Harga per Kg</th>
                                                    </tr>

                                                    @foreach($produk->sortBy('nama') as $key => $item)
                                                        <tr>
                                                            <input type="hidden" name="produk[{{ $key }}][id]"
                                                                   value="{{ $item->id }}">

                                                            <td>
                                                                <label class="col-form-label">{{ $item->nama }} (Stok:
                                                                    {{ $item->stok }}Kg)</label>
                                                            </td>

                                                            <td>
                                                                <input class="form-control hitung" type="number"
                                                                       autofocus=""
                                                                       name="produk[{{ $key }}][berat]"
                                                                       style="margin-bottom: 16px;"
                                                                       max="{{ $item->stok }}">
                                                            </td>

                                                            <td>
                                                                <input class="form-control hitung"
                                                                       type="number"
                                                                       name="produk[{{ $key }}][harga]"
                                                                       style="margin-bottom: 16px; margin-right: 12px;" value="{{ $item->produk_details->first() ? $item->produk_details->first()->harga_jual : ""}}">
                                                            </td>

                                                            <td>
                                                                <span id="produk[{{ $key }}][total]"
                                                                      class="total-{{ $item->id }}">Rp0</span>
                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td>
                                                            <label class="col-form-label">Diskon (<b>Rp</b>)</label>
                                                        </td>
                                                        <td colspan="2">
                                                            <input class="form-control hitung" type="number" id="diskon"
                                                                   name="diskon" value="0"
                                                                   style="margin-bottom: 20px;">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label class="form-label">Metode</label>
                                                        </td>
                                                        <td colspan="2">
                                                            <div class="selectgroup w-100">
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="metode" value="Kredit"
                                                                           class="selectgroup-input metode" checked="">
                                                                    <span
                                                                        class="selectgroup-button">Kredit/Hutang</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="metode" value="Kas"
                                                                           class="selectgroup-input metode">
                                                                    <span class="selectgroup-button">Tunai/Lunas</span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr style="margin-top: 20px;">
                                                        <td>
                                                            <label class="col-form-label">Hutang</label>

                                                        </td>
                                                        <td>

                                                            <h5 id="hutang">Rp0</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td>
                                                            <label class="col-form-label">Total</label>

                                                        </td>
                                                        <td>

                                                            <h5 id="total" style="">Rp0</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary">Tambah</button>

                                                            <a onclick="window.history.back();"
                                                               class="btn btn-secondary float-right text-white">Batal</a>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>


                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h5>List Tagihan</h5>
                                        </div>
                                        <div class="card-body px-3 py-3">
                                            @foreach($pembeli->tagihans->sortBy('status') as $item)
                                                <ul>
                                                    <li>
                                                        Tagihan: #{{ $item->id }}
                                                        (Total: {{ toIdr($item->total) }},
                                                        Diskon: {{ toIdr($item->diskon) }}, Metode:
                                                        <strong>{{ $item->metode }}, Status: <b>{{ $item->status }}</b>
                                                            )
                                                            <br>
                                                            @if($item->status != "Lunas")
                                                                <a href="{{ url('/tagihan' . '/' . $item->id . '/lunaskan') }}"
                                                                   class="btn btn-outline-success btn-sm"
                                                                   onclick="return confirm('Yakin akan melunaskan tagihan ini?')">Lunaskan</a>
                                                            @endif
                                                            
                                                            <button
                                                                class="btn btn-outline-secondary btn-sm md-trigger"
                                                                data-modal="modal-{{ $item->id }}">Cicilan
                                                                ({{ toIdr($item->cicilans->sum('jumlah')) }})
                                                            </button>

                                                            <form action="{{ url('/tagihan' . '/' . $item->id) }}"
                                                                  method='post' style='display: inline;'
                                                                  onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                                @method('DELETE')
                                                                @csrf

                                                                <input type="hidden" name="from_tagihan_tambah"
                                                                       value="ya">

                                                                <button type="submit"
                                                                        class="btn btn-outline-danger btn-sm" href=""
                                                                        for='btnSubmit-{{ $item->id }}'
                                                                        style='cursor: pointer;'>Hapus
                                                                </button>
                                                            </form>

                                                            <ul>
                                                                @foreach($item->details as $itemDetail)
                                                                    <li>{{ $itemDetail->produk->nama }} {{ $itemDetail->berat }}
                                                                        Kg
                                                                        {{"@"}}{{ toIdr($itemDetail->harga) }}
                                                                        : {{ toIdr($itemDetail->total) }}</li>
                                                                @endforeach
                                                            </ul>
                                                    </li>
                                                </ul>

                                                <div class="md-modal md-effect-16" id="modal-{{ $item->id }}">
                                                    <div class="md-content">
                                                        <h3 class="bg-primary">Cicilan</h3>
                                                        <div>
                                                            <form action="{{ route('cicilan.store') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="tagihan_id"
                                                                       value="{{ $item->id }}">
                                                                <input type="hidden" name="from_tagihan_tambah"
                                                                       value="ya">

                                                                <div class="form-group">
                                                                    <input type="number" name="jumlah"
                                                                           class="form-control"
                                                                           placeholder="Input jumlah cicilan" value="0"
                                                                           @if($item->total === 0) readonly @endif>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button @if($item->total === 0) disabled @endif class="btn btn-primary" type="submit"
                                                                            style="display: inline-block;">Tambah
                                                                    </button>
                                                                    <button class="btn btn-outline-secondary md-close"
                                                                            style="display: inline-block;"
                                                                            type="button">Batalkan
                                                                    </button>
                                                                </div>
                                                            </form>

                                                            <table class="table">
                                                                <thead>
                                                                <th>Ke</th>
                                                                <th>Jumlah</th>
                                                                </thead>

                                                                <tbody>
                                                                @foreach($item->cicilans as $itemTagihan)
                                                                    <tr>
                                                                        <td>{{ $itemTagihan->cicilan_ke }}</td>
                                                                        <td>{{ toIdr($itemTagihan->jumlah) }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="md-overlay"></div>

    <script>
        $(document).ready(function () {
            let ajaxHitung = function () {
                $.ajax({
                    url: "{{ url('tagihan/hitung') }}",
                    data: $('#form').serialize(),
                    async: true,
                    success: (response) => {

                        for (let i = 0; i < response.length; i++) {
                            $(`.total-${response.produk[i].id}`).text(response.produk[i].total)
                        }

                        $('#hutang').text(response.hutang)
                        $('#total').text(response.total)
                    }
                });

            };

            ajaxHitung();

            $('.hitung').keyup(() => {
                ajaxHitung();
            })

            $('.hitung').blur(() => {
                ajaxHitung();
            })

            $('.metode').change(() => {
                ajaxHitung();
            });
        });
    </script>

@endsection