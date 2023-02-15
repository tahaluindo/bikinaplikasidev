@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Materi</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        <h3>Soal</h3> <p>

                        <a href='{{ route('soal_essay.index') }}' class='btn btn-primary mr-3'>Soal Essay</a>
                        <a href='{{ route('soal_pilgan.index') }}' class='btn btn-primary'>Soal Pilihan Ganda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection