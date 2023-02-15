@extends('layouts.app')

@section('content')
    <div id="content" class="app-content">
        <h1 class="page-header mb-3">
            User
        </h1>

        <div class="row">
            <div class="col-xl-6">
                <div class="card text-white-transparent-7 mb-3 overflow-hidden">
                    <div class="card-img-overlay d-block d-lg-none bg-blue rounded"></div>
                    <div class="card-img-overlay d-none d-md-block bottom-0 top-auto">
                        <div class="row">
                            <div class="col-md-8 col-xl-6"></div>
                            <div class="col-md-4 col-xl-6 mb-n2">

                            </div>
                        </div>
                    </div>

                    <div class="card-body position-relative">
                        @include('layouts.user.laporan.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
