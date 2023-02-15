@extends('layouts.app2')

@section('content')
    <div class="page">

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xxl-12 col-xl-12">
                    <div class="card card-shadow">
                        <div class="card-block bg-white p-40">
                            <div class="col-md-6">
                                <form class="form-horizontal form-material" action="{{ url('/buku') }}"
                                      method="post" enctype="multipart/form-data">
                                    @csrf

                                    @include ('buku.form', ['formMode' => 'create'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

