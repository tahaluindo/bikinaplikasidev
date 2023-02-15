@extends('layouts.app3')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pb_30 pt_30 body_white_bg">
            <div class="row">

                <div class="col-lg-6">
                    <h3 class="mb-0">
                        Edit {{ ucwords(preg_replace('/[^a-zA-Z]/', ' ', \Illuminate\Support\Facades\Request::segment(1))) }}</h3>
                    <div class="mb-3"></div>

                    <form class="form-horizontal form-material" action="{{ url('/pemesanan/' . $pemesanan->id) }}"
                          method="post" enctype="multipart/form-data" id="form-submit">
                        @method('put')
                        @csrf

                        @include ('pemesanan.form', ['formMode' => 'edit'])

                        <div class="form-group">
                            <div class="col-sm-12" style="margin-top: 15px;">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
