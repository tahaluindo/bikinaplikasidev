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
                    Perpanjangan Sewa
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
                <h2 class="card-inside-title">Update Perpanjangan Sewa</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form id="form_validation" method="POST" action='{{ url("perpanjangan_sewa/$data->id") }}'>
                            {{ csrf_field() }}
                            @method('put')

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('tagihan_id') ? "focused error" : "" }}" ng-init='a = 5'>
                                    <label>Tagihan * (Otomatis)</label>
                                    <input name='tagihan_id' id='tagihan_id' type="text" class="form-control" placeholder="Tagihan Id" maxlength="50" minlength="1" readonly value="{{ $data->tagihan_id }}" />
                                </div>
                                @if($errors->has('tagihan_id'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('tagihan_id') }}</label>
                                @endif
                            </div>
                            
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('methode') ? "focused error" : "" }}">
                                    <label>Pilih Methode Pembayaran *</label>
                                    <select name="methode" id='methode' class="form-control" required>
                                        <option value="">--Pilih Methode Pembayaran--</option>
                                            <option value="Bank"  @if($data->methode === 'Bank') selected @endif>Bank</option>
                                            <option value="Cash"  @if($data->methode === 'Cash') selected @endif>Cash</option>
                                            <option value="Bank Nyicil"  @if($data->methode === 'Bank Nyicil') selected @endif>Bank Nyicil (Mohon update tggl jatuh tempo di menu Tagihan secara manual jika sudah lunas)</option>
                                            <option value="Cash Nyicil"  @if($data->methode === 'Cash Nyicil') selected @endif>Cash Nyicil (Mohon update tggl jatuh tempo di menu Tagihan secara manual jika sudah lunas)</option>
                                    </select>
                                </div>
                                @if($errors->has('methode'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('methode') }}</label>
                                @endif
                            </div>
                            
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('jenis_perpanjangan') ? "focused error" : "" }}">
                                    <select name="jenis_perpanjangan" id='jenis_perpanjangan' class="form-control" required>
                                        <label>Pilih Jenis Perpanjangan *</label>
                                        <option value="">--Pilih Jenis Perpanjangan--</option>
                                            <option value="Harian" @if("Harian" == $data->jenis_perpanjangan) selected @endif>
                                                Harian
                                            </option>
                                            <option value="Mingguan" @if("Mingguan" == $data->jenis_perpanjangan) selected @endif>
                                                Mingguan
                                            </option>
                                            <option value="Bulanan" @if("Bulanan" == $data->jenis_perpanjangan) selected @endif>
                                                Bulanan
                                            </option>
                                            <option value="Tahunan" @if("Tahunan" == $data->jenis_perpanjangan) selected @endif>
                                                Tahunan
                                            </option>
                                    </select>
                                </div>
                                @if($errors->has('jenis_perpanjangan'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('jenis_perpanjangan') }}</label>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('lama_perpanjangan') ? "focused error" : "" }}">
                                    <label>Inputkan Seberapa Lama Perpanjangannya *</label>
                                    <input name='lama_perpanjangan' id='lama_perpanjangan' type="number" min='1' max='3' class="form-control" placeholder="Lama Perpanjangan" value="{{ $data->lama_perpanjangan }}"/>
                                </div>
                                @if($errors->has('lama_perpanjangan'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('lama_perpanjangan') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('untuk_tempo') ? "focused error" : "" }}">
                                    <label>Untuk Tempo *</label>
                                    <input name='untuk_tempo' id='untuk_tempo' type="datetime-local" class="form-control" placeholder="Untuk Tempo"  value='{{ date("Y-m-d\Th:i:s", strtotime($data->untuk_tempo)) }}' readonly/>
                                    @if($errors->has('untuk_tempo'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('untuk_tempo') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('biaya') ? "focused error" : "" }}">
                                    <label>Biaya Perpanjangan *</label>
                                    <input name='biaya' id='biaya' type="text" class="form-control cleave1" placeholder="Biaya"  value='{{ $data->biaya }}' min='0' max='999999999' readonly/>
                                    @if($errors->has('biaya'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('biaya') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('biaya_tambahan') ? "focused error" : "" }}">
                                    <label>Biaya Tambahan </label>
                                    <input name='biaya_tambahan' id='biaya_tambahan' type="text" class="form-control cleave2" placeholder="Biaya Tambahan"  value='{{ $data->biaya_tambahan }}' min='0' max='999999999' />
                                    @if($errors->has('biaya_tambahan'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('biaya_tambahan') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('total') ? "focused error" : "" }}">
                                    <label>Total Yang Harus Dibayar (Otomatis) *</label>
                                    <input name='total' id='total' type="text" class="form-control cleave3" placeholder="Total" value='{{ $data->total }}' min='0' max='999999999' readonly/>
                                    @if($errors->has('total'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('total') }}</label>
                                    @endif
                                </div>
                            </div>
                                                                                    
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('status') ? "focused error" : "" }}">
                                    <label>Status Pembayarannya * </label>
                                    <select name="status"  id='status'  class="form-control" required>
                                        <option value="">--Pilih Status--</option>
                                            <option value="Lunas"  @if($data->status === 'Lunas') selected @endif>Lunas</option>
                                            <option value="Belum Lunas"  @if($data->status === 'Belum Lunas') selected @endif>Belum Lunas</option>
                                    </select>
                                </div>
                                @if($errors->has('status'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('status') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <button type="submit" class="btn bg-blue waves-effect">
                                        <i class="material-icons">save</i>
                                        <span class="icon-name">Save</span>
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
    // untuk mengantisipasi jika user memilih methode nyicil
    var untuk_tempo = $('#untuk_tempo').val();
    if($('#methode').val() == "Cash" || $('#methode').val() == "Bank")
    {
        $('#status').val('Lunas').css('pointer-events','none');
    }

    $('#methode').change(function(){
        if ( $(this).val() == 'Bank Nyicil' || $(this).val() == 'Cash Nyicil')
        {
            $('#biaya').removeAttr('readonly');
            $('#untuk_tempo').removeAttr('readonly');
            $('#status').val('Belum Lunas').css('pointer-events','auto');

        }else
        {
            $('#biaya').attr('readonly', 'readonly');
            $('#untuk_tempo').attr('readonly', 'readonly').val(untuk_tempo);
            $('#status').val('Lunas').css('pointer-events','none');
        }
    });

    // hitung total
    function hitungTotal()
    {
        var biaya_tambahan = $('#biaya_tambahan');

        if (biaya_tambahan.val() == '')
        {
            biaya_tambahan.val(0);
        }

        var total = parseInt($('#biaya').val().replace(/[.]/g, '').replace('Rp', '')) + parseInt(biaya_tambahan.val().replace(/[.]/g, '').replace('Rp', ''));

        $('#total').val().replace(/[.]/g, '').replace('Rp', '');
        $('#total').val(total);

        new Cleave('.cleave1', settings);
        new Cleave('.cleave2', settings);
        new Cleave('.cleave3', settings);
    }

    // untuk memilih paket renew
    $('#jenis_perpanjangan').on('change', function(){
        if ( $(this).val() === 'Harian' || $(this).val() === 'Mingguan'  || $(this).val() === 'Tahunan' )
        {
            $('#lama_perpanjangan').attr('max', 3);
        }
        else if ( $(this).val() === 'Bulanan')
        {
            $('#lama_perpanjangan').attr('max', 11);
        }
    });

    $('#lama_perpanjangan, #jenis_perpanjangan').on('keyup, change', function(){
        var tagihan_id = $('#tagihan_id');
        var lama_perpanjangan = $('#lama_perpanjangan');
        var jenis_perpanjangan = $('#jenis_perpanjangan');

        $.ajax({
            url: '{{ route("getBiaya") }}/' + tagihan_id.val() + '/' + jenis_perpanjangan.val(),
            success: function(resp)
            {

                $('#biaya').val(parseInt(resp) * parseInt(lama_perpanjangan.val().replace(/[.]/g, '').replace('Rp', '')));
                hitungTotal();
            }
        })
    });

    $('#biaya').keyup(function(){
        hitungTotal();
    });

    $('#biaya_tambahan').keyup(function(){
        hitungTotal();
    });


});
</script>
@endsection