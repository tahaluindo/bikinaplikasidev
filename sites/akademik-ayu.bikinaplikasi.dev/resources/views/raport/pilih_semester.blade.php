@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Pilih Semester</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Pilih Semester</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ url(route('raport.index')) }}"
                        method="get" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Tahun</label>
                            <div class="col-md-12">
                                <select class="form-control w-100" name='tahun' required>
                                    <option value="">--Pilih Tahun--</option>
                                    @foreach($tahuns as $tahun)
                                    <option @if(old('tahun') == $tahun) selected @endif
                                        value='{{ $tahun }}'>{{ $tahun }}</option>
                                    @endforeach
                                </select>

                                @error('tahun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Semester</label>
                            <div class="col-md-12">
                                <select class="form-control w-100" name='semester' required>
                                    <option value="">--Pilih Semester--</option>
                                    @foreach($semesters as $semester)
                                    <option @if(old('semester') == $semester) selected @endif
                                        value='{{ $semester }}'>{{ $semester }}</option>
                                    @endforeach
                                </select>

                                @error('semester')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            {{--  <div class="col-sm-12 btn-group">
                                <button class="btn btn-primary mr-2" type="submit">Print HTML</button>

                                <button class="btn btn-success" type="submit">Print Excel</button>
                            </div>  --}}
                            <div class="col-sm-12 btn-group">
                                <button class="btn btn-primary mr-2" type="submit">Lihat Raport</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
