@extends('layouts.index')

@section('content')

<div class="block-header">
</div>
<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Transaksi
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <h2 class="card-inside-title">Tambah Transaksi</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form id="form_validation" method="POST" action='{{ url("transaksi") }}'>
                            @csrf
                            
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('jenis') ? "focused error" : "" }}">
                                    <label>Jenis Transaksi *</label>
                                    <select name="jenis" class="form-control" id='jenis' required>
                                        <option value="">--Pilih Jenis--</option>
                                        <option value="Pengeluaran" @if(old('jenis')  === 'Pengeluaran') selected @endif)>Pengeluaran</option>
                                        <option value="Pemasukan" @if(old('jenis')  === 'Pemasukan') selected @endif)>Pemasukan</option>
                                    </select>
                                </div>
                                @if($errors->has('jenis'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('jenis') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('tggl') ? "focused error" : "" }}">
                                    <label>Tanggal Transaksi *</label>
                                    <input name='tggl'  type="date" class="form-control" placeholder="tggl"  value='{{ old("tggl") ?? date('Y-m-d') }}' />
                                    @if($errors->has('tggl'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('tggl') }}</label>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('total') ? "focused error" : "" }}">
                                    <label>Total Transaksi *</label>
                                    <input name='total' id='total' type="text" class="form-control cleave1" placeholder="Total" value='{{ old("total") }}' min='0' max='999999999' />
                                    @if($errors->has('total'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('total') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('keterangan') ? "focused error" : "" }}">
                                    <label>Keterangan </label>
                                    <textarea name='keterangan' class="form-control" placeholder="Keterangan" maxlength="500">{{ old("keterangan") }}</textarea>
                                    @if($errors->has('keterangan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('keterangan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('methode') ? "focused error" : "" }}">
                                    <label>Methode Pembayaran Transaksi *</label>
                                    <select name="methode" class="form-control" id='methode' required>
                                        <option value="">--Pilih Methode--</option>
                                            <option value="Bank"  @if(old('methode') === 'Bank') selected @endif)>Bank</option>
                                            <option value="Cash"  @if(old('methode') === 'Cash') selected @endif)>Cash</option>
                                            <option value="Nyicil"  @if(old('methode') === 'Nyicil') selected @endif)>Nyicil</option>
                                    </select>
                                </div>
                                @if($errors->has('methode'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('methode') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <button type="submit" class="btn bg-blue waves-effect">
                                        <i class="material-icons">add</i>
                                        <span class="icon-name">Tambah</span>
                                    </button>

                                    <button type="reset" class="btn btn-warning waves-effect">
                                        <i class="material-icons">refresh</i>
                                        <span class="icon-name">Reset</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Input -->

<script type="text/javascript">
$(document).ready(function(){

    // $('#jenis').change(function(){
    //     if ( $(this).val() == 'Tagihan')
    //     {
    //         $('#total').attr('readonly');
            
    //         $('#tagihan_id').removeAttr('disabled');
    //         $('#tagihan_id').attr('required', 'required');

    //         $('#methode').attr('disabled', 'disabled')
    //     }else
    //     {
    //         $('#total').removeAttr('readonly');
    //         $('#total').val('');

    //         $('#tagihan_id').attr('disabled', 'disabled');
    //         $('#tagihan_id').removeAttr('required');
    //         $('#tagihan_id').val('');
            
    //         $('#methode').removeAttr('disabled')
    //     }
    // });
    
    // // dapatkan total uang dari tagihan
    // $('#tagihan_id').change(function(){
    //     $.ajax({
    //         url: "{{ route('getTotalTagihan') }}/" + $(this).val(),
    //         success: function(total)
    //         {
    //             $('#total').val(total);
    //         }
    //     });
    // });

});
</script>
@endsection