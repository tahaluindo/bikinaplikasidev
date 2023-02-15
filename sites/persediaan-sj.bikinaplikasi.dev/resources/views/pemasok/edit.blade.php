@extends('layouts.app')

@section('content')
    <div class="page">

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xxl-12 col-xl-12">
                    <!-- Panel Web Designer -->
                    <div class="card card-shadow">
                        <div class="card-block bg-white p-40">
                            <div class="col-md-6">
                                <form class="form-horizontal form-material"
                                      action="{{ url('/pemasok/' . $pemasok->id) }}"
                                      method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    @include ('pemasok.form', ['formMode' => 'edit'])
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Panel Web Designer -->
                </div>
            </div>
        </div>
    </div>
@endsection