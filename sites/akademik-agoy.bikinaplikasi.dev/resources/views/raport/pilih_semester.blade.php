@extends("layouts.admin-lte.app")

@section('page') Raport @endsection

@section("content")
<div class="row">
    <div class="col-lg-8 col-xlg-9 col-md-7">
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
                    <button  class="btn btn-primary mr-2" type="submit">Lihat Raport</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
