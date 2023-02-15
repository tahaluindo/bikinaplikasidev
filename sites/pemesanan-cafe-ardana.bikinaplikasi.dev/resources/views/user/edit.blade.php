@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#" class="breadcrumb--active">User</a>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-6 xxl:col-span-6 grid grid-cols-12 gap-6">
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-12 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        User
                    </h2>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
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

                    <form class="form-horizontal form-material" action="{{ url('/user/' . $user->id) }}"
                          method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        @include ('user.form', ['formMode' => 'edit'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

