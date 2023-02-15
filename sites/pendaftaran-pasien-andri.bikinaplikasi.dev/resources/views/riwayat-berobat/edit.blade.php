@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Riwayat Berobat</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Riwayat Berobat</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal form-material" action="{{ url('/riwayat-berobat/' . $riwayat_berobat->id) }}"
            method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            @include ('riwayat-berobat.form', ['formMode' => 'edit'])
        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
