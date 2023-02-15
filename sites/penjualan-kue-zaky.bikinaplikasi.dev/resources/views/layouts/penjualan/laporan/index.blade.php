@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Penjualan</a>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-6 xxl:col-span-6 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Penjualan
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <form class="form-horizontal form-material" action="{{ url(route('penjualan.print')) }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Tanggal Awal</label>
                            <div class="col-md-12">
                                <input type="date"
                                       class="form-control form-control-line" id="example-limit"
                                       value='{{ old('tanggal_awal') == "" ? date("Y-m-d") : old('tanggal_awal') }}'
                                       name='tanggal_awal'
                                       min=1 required>
                                @error('tanggal_awal')
                                <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tanggal Akhir</label>
                            <div class="col-md-12">
                                <input type="date"
                                       class="form-control form-control-line" id="example-limit"
                                       value='{{ old('tanggal_akhir') == "" ? date("Y-m-d") : old('tanggal_akhir') }}'
                                       name='tanggal_akhir'
                                       min=1 required>
                                @error('tanggal_akhir')
                                <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Field</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='field' required>
                                    @foreach(['id','status','catatan','no_hp','alamat_pengiriman','bukti_transfer','created_at','updated_at'] as $field)
                                        <option value="{{ $field }}" @if(old('field')==$field)
                                        selected @endif>{{ ucwords(preg_replace("/_/", " ", $field)) }}</option>
                                    @endforeach
                                </select>
                                @error('field')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Order</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='order' required>
                                    @foreach(['ASC', 'DESC'] as $order)
                                        <option value="{{ $order }}" @if(old('order')==$order)
                                        selected @endif>{{ $order }}</option>
                                    @endforeach
                                </select>
                                @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Limit</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="{{ $limit }}"
                                       class="form-control form-control-line" id="example-limit"
                                       value='{{ old('limit') == "" ? $limit : old('limit') }}' name='limit'
                                       max='{{ $limit }}'
                                       min=1 required>
                                @error('limit')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name='preview' value='true' class="btn btn-info" type="submit">Preview</button>
                                <button class="btn btn-primary" type="submit">Print Html</button>
                                {{--                    <button name='print_excel' value='true' class="btn btn-success" type="submit">Print Excel</button>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
