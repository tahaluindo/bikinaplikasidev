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
                    <form class="form-horizontal form-material" action="{{ url('/anggota') }}"
                          method="post" enctype="multipart/form-data">
                        @csrf

                        @include ('anggota.form', ['formMode' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

