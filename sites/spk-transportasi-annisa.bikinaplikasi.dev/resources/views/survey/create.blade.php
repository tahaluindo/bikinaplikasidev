@extends('layouts.app2')

@section('page-info')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ url('') }}/#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">survey</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="product-sales-area">
        <div class="container-fluid">
            <form class="form-horizontal form-material" action="{{ url('/survey') }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="product-sales-chart">
                            <div style="padding: 20px !important;">

                                <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                    <strong>Dalam pemilihan kriteria mana yang lebih penting bagi responden dari
                                        perbandingan
                                        kriteria-kriteria dibawah dalam
                                        penggunaan Aplikasi Transportasi Roda Dua berbasis Online ?</strong>
                                </div>

                                @foreach($kriteria->sortBy('urutan_prioritas')->values() as $key => $kriteriaItem)
                                    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">

                                        <div class="col-md-12">
                                            <select name="kriteria_id[{{ $kriteriaItem->id }}]"
                                                    class="form-control form-control-line"
                                                    id="kriteria_id[{{ $kriteriaItem->id }}]" required>
                                                <option
                                                    value="">-- PILIH RANKING {{ $key + 1 }} --
                                                </option>

                                                @foreach ($kriteria->sortBy('urutan_prioritas')->values() as $key2 => $kriteriaItem2)
                                                    <option
                                                        value="{{ $key2 + 1 }}" {{ old("kriteria_id.$kriteriaItem->id") == $key2 + 1 ? 'selected' : ''}}>{{ $kriteriaItem2->nama }}</option>
                                                @endforeach
                                            </select>

                                            @error("kriteria_id." . ($kriteriaItem->id))
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="product-sales-chart">
                            <div style="padding: 20px !important;">


                                @foreach ($kriteria->sortBy('urutan_prioritas')->values() as $keyKriteria => $itemKriteria)
                                    <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                        <strong>{{ $itemKriteria->nama }} Siapa yang terbaik?</strong>
                                    </div>
                                    @foreach($alternatif->sortBy('urutan_prioritas')->values() as $keyAlternatif => $itemAlternatif)
                                        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">

                                            <div class="col-md-12">
                                                <select
                                                    name="alternatif_id[{{ $itemKriteria->id }}][{{ $itemAlternatif->id }}]"
                                                    class="form-control form-control-line"
                                                    id="alternatif_id[{{ $itemKriteria->id }}][{{ $itemAlternatif->id }}]"
                                                    required>
                                                    <option
                                                        value="">-- PILIH RANKING {{ $keyAlternatif + 1 }} --
                                                    </option>

                                                    @foreach ($alternatif->sortBy('urutan_prioritas')->values() as $keyAlternatif2 => $itemAlternatif2)
                                                        <option
                                                            value="{{  $keyAlternatif2 + 1 }}" {{ old("alternatif_id.$itemKriteria->id." . ($itemAlternatif->id)) ==  $keyAlternatif2 + 1 ? 'selected' : ''}}>{{ $itemAlternatif2->nama }}</option>
                                                    @endforeach
                                                </select>

                                                @error("alternatif_id.$itemKriteria->id."  . ($itemAlternatif->id))
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Dapatkan Rekomendasi >>></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
