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
                    Tagihan
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
                <h2 class="card-inside-title">Edit Tagihan</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form id="form_validation" method="POST" action='{{ url("tagihan/$data->id") }}'>
                            {{ csrf_field() }}
                            @method('put')

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('penyewa_id') ? "focused error" : "" }}">
                                    <label>Pilih Penyewa *</label>
                                    <select name="penyewa_id" id='penyewa_id' class="form-control" required>
                                        <option value="">--Pilih Penyewa--</option>
                                        @foreach($penyewas as $penyewa)
                                            <option value="{{ $penyewa->id }}" @if($penyewa->id === $data->penyewa_id) selected @endif)>
                                                {{ $penyewa->nama }} | Kamar: {{ $penyewa->kamar->nomor }} | Type: {{ $penyewa->type_sewa }} | {{ $penyewa->no_hp }}
                                            </option>
                                        @endforeach
                                    </div>
                                    </select>
                                    @if($errors->has('penyewa_id'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('penyewa_id') }}</label>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('invoice_id') ? "focused error" : "" }}">
                                    <label>No Invoice * (Otomatis)</label>
                                    <input name='invoice_id' id='invoice_id' type="text" class="form-control" placeholder="Invoice Id" maxlength="50" minlength="1" readonly value='{{ $data->invoice_id }}'/>
                                </div>
                                @if($errors->has('invoice_id'))
                                    <label id="name-error" class="error" for="name">{{ $errors->first('invoice_id') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('terakhir_bayar') ? "focused error" : "" }}">
                                    <label>Terakhir Bayar *</label>
                                    <input name='terakhir_bayar'  type="datetime-local" class="form-control" placeholder="Terakhir Bayar" id='terakhir_bayar' value='{{ date('Y-m-d\Th:i:s', strtotime($data->terakhir_bayar)) }}'  max="{{ date('Y-m-d\Th:i:s', strtotime($data->jatuh_tempo)) }}" />
                                    @if($errors->has('terakhir_bayar'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('terakhir_bayar') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('jatuh_tempo') ? "focused error" : "" }}">
                                    <label>Jatuh Tempo Pembayaran Selanjutnya *</label>
                                    <input name='jatuh_tempo' id="jatuh_tempo" type="datetime-local" class="form-control" placeholder="Jatuh Tempo"  value='{{ date('Y-m-d\Th:i:s', strtotime($data->jatuh_tempo)) }}' />
                                    @if($errors->has('jatuh_tempo'))
                                        <label id="name-error" class="error" for="name">{{ $errors->first('jatuh_tempo') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('status') ? "focused error" : "" }}">
                                    <label>Pilih Status Tagihan *</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">--Pilih Status--</option>
                                        <option value="Aktif"  @if($data->status === 'Aktif') selected @endif)>Aktif</option>
                                        <option value="Tidak Aktif" @if($data->status  === 'Tidak Aktif') selected @endif)>Tidak Aktif</option>
                                        <option value="Menunggak" @if($data->status  === 'Menunggak') selected @endif)>Menunggak</option>
                                        {{-- <option value="Nyicil" @if($data->status  === 'Nyicil') selected @endif)>Nyicil</option> --}}
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

    //untuk mengantisipasi terkahir bayar
    $('#jatuh_tempo').on('keyup', function(){
        $('#terakhir_bayar').attr('max', $(this).val());
    });

    function hitungTotal()
    {
        var total = parseInt($('#biaya').val()) + parseInt($('#biaya_tambahan').val());

        $('#total').val(total);
    }
    
    $('#penyewa_id').on('change', function(){

    $('#invoice_id').val('');

    if($(this).val() == "") return;

        $.ajax({
            url: '{{ route("getTagihanId") }}/' + $(this).val(),
            success: function(invoice_id) {

                // tampilkan invoice id secara random
                $('#invoice_id').val(invoice_id);
            }
        });

        $.ajax({
            url: '{{ route("getBiaya") }}/' + $(this).val(),
            success: function(biaya) {

                // tunjukkan biaya yang harus dikeluarkan
                $('#biaya').val(biaya);
                $('#biaya_tambahan').val(0);

                // hitung total biaya tagihan
                hitungTotal();
            }
        });

    });

    $('#biaya, #biaya_tambahan').on('keyup', function(){
        hitungTotal();
    });
});
</script>
@endsection