@extends('layouts.app3')

@section('content')
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap mt-3">
                    <h2 class="title-1">Anggota</h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-6  mt-3">
                <div class="table-responsive m-b-40">
                    <form class="form-horizontal form-material" action="{{ url('/anggota/' . $anggota->id) }}"
                          method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        @include ('anggota.form', ['formMode' => 'edit'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
