@extends('layouts.app3')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-4">
                <div class="media">
                    <div class="media-body">
                        <h4 class="page-header-title">Penyusutan</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row panel-wrapper js-grid-wrapper">

            <div class="col-xs-6 col-md-6 js-grid">
                <div class="panel px-1">
                    <div class="panel-body " style="display: inline-block; width: 100%;">

                        @if(session()->has("error"))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get("error") }}
                            </div>
                        @elseif(session()->has("success"))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get("success") }}
                            </div>
                        @elseif(session()->has("warning"))
                            <div class="alert alert-warning" role="alert">
                                {{ session()->get("warning") }}
                            </div>
                        @endif

                        <form class="form-horizontal form-material"
                              action="{{ url('/penyusutan/' . $penyusutan->id) }}"
                              method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            @include ('penyusutan.form', ['formMode' => 'edit'])
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection