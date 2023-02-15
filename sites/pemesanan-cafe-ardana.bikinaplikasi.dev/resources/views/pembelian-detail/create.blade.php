@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#" class="breadcrumb--active">Pembelian
            Detail</a>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-6 xxl:col-span-6 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Pembelian Detail
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <form class="form-horizontal form-material" action="{{ url('/pembelian-detail') }}"
                          method="post" enctype="multipart/form-data">
                        @csrf

                        @include ('pembelian-detail.form', ['formMode' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
