@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Nilai Detail</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Nilai Detail</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ url(route('nilai_detail.update', $nilai_detail->id)) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <input type="hidden" name="nilai_id" value='{{ request()->nilai_id }}'>
                        <div class="form-group">
                            <label class="col-md-12">Siswa</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='user_id'>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if(old('user_id')==$user->id || $nilai_detail->user_id == $user->id) selected
                                        @endif>{{ $user->nama }}</option>
                                    @endforeach
                                </select>

                                @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Angka Kl 3 (1-4)</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="1" class="form-control form-control-line"
                                    name='angka_kl_3' value='{{ old('angka_kl_3') == "" ? $nilai_detail->angka_kl_3 : old('angka_kl_3') }}' min=1 max=4 step="any">

                                @error('angka_kl_3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Angka Kl 4 (1-4)</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="1" class="form-control form-control-line"
                                    name='angka_kl_4' value='{{ old('angka_kl_4') == "" ? $nilai_detail->angka_kl_4 : old('angka_kl_4') }}' min=1 max=4 step="any">

                                @error('angka_kl_4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Dalam Mapel Kl 1 Kl 2</label>
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name='dalam_mapel_kl_1_kl_2'>
                                    @foreach($dalam_mapel_kl_1_kl_2s as $dalam_mapel_kl_1_kl_2)
                                    <option value="{{ $dalam_mapel_kl_1_kl_2 }}" @if(old('dalam_mapel_kl_1_kl_2')==$dalam_mapel_kl_1_kl_2 || $nilai_detail->dalam_mapel_kl_1_kl_2 == $dalam_mapel_kl_1_kl_2) selected
                                        @endif>{{ $dalam_mapel_kl_1_kl_2 }}</option>
                                    @endforeach
                                </select>

                                @error('dalam_mapel_kl_1_kl_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection