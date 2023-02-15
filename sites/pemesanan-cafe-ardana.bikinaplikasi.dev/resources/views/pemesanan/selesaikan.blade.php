@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Pemesanan</a></div>
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-6 xxl:col-span-6 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Pemesanan
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <form class="form-horizontal form-material" action="{{ url('/pemesanan/' . $pemesanan->id . '/selesaikan-update') }}"
                          method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        

                        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                            <label for="status" class="control-label">{{ 'Status' }}</label>

                            <div class="col-md-12">

                                <select name="status" class="form-control form-control-line" id="status" required>
                                    @foreach (json_decode('{"selesai":"selesai"}', true) as $optionKey => $optionValue)
                                        <option
                                            value="{{ $optionKey }}" {{ (isset($pemesanan->status) && $pemesanan->status == $optionKey) || old('status') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>
                                    @endforeach
                                </select>

                                @error('status')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="total" class="control-label">{{ 'Total' }}</label>

                            <div class="col-md-12">
                                <input placeholder="total"
                                       class="form-control form-control-line @error('total') is-invalid @enderror"
                                        type="number" id="total"
                                       value="{{ $pemesanan->pemesanan_details->sum('total') }}" disabled>

                                @error('total')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        
                        
                        <div class="form-group">
                            <label for="total" class="control-label">{{ 'Uang Pelanggan' }}</label>

                            <div class="col-md-12">
                                <input placeholder="total"
                                       class="form-control form-control-line @error('uang_pelanggan') is-invalid @enderror"
                                       name="uang_pelanggan" type="number" id="uang_pelanggan"
                                       value="{{ isset($pemesanan->uang_pelanggan) ? $pemesanan->uang_pelanggan : old('uang_pelanggan') }}">

                                @error('uang_pelanggan')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>                        
                        
                        <div class="form-group">
                            <label for="total" class="control-label">{{ 'Kembalian' }}</label>

                            <div class="col-md-12">
                                <input placeholder="total"
                                       class="form-control form-control-line @error('kembalian') is-invalid @enderror"
                                       name="kembalian" type="number" id="kembalian"
                                       value="{{ isset($pemesanan->kembalian) ? $pemesanan->kembalian : old('kembalian') }}" disabled>

                                @error('kembalian')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Selesaikan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
