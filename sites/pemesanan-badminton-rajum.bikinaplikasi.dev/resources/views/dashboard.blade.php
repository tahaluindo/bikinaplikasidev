@extends('layouts.app3')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity">
                                            <h4>Pemesanan</h4>
                                            <h3>{{ $pemesanan->count() }}
                                            </h3>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12 col-xl-6">
                    <div class="white_box mb_30 min_430">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Rekapan Per Quartal</h3>
                            </div>
                        </div>

                        <div id="stackbar_active"></div>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>

    
@endsection

