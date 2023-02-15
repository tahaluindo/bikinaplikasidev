@extends("layouts.admin-lte.app")

@section('page') Tambah Nilai Detail @endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form class="form-horizontal form-material" action="{{ url(route('nilai_detail.store')) }}"
                method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="nilai_id" value="{{ request()->nilai_id }}">

                <div class="form-group">
                    <label class="col-md-12">Siswa</label>
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name='user_id'>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" @if(old('user_id')==$user->id) selected
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
                    <label class="col-md-12">Tugas (1-100)</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="1" class="form-control form-control-line"
                            name='tugas' value='{{ old('tugas') }}' min=1 max=100 step="1">

                        @error('tugas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Ulangan Harian (1-100)</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="1" class="form-control form-control-line"
                            name='ulangan_harian' value='{{ old('ulangan_harian') }}' min=1 max=100 step="1">

                        @error('ulangan_harian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Mid Semester (1-100)</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="1" class="form-control form-control-line"
                            name='mid_semester' value='{{ old('mid_semester') }}' min=1 max=100 step="1">

                        @error('mid_semester')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Uas (1-100)</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="1" class="form-control form-control-line"
                            name='uas' value='{{ old('uas') }}' min=1 max=100 step="1">

                        @error('uas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12">Deskripsi Pengetahuan</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="xxx" class="form-control form-control-line"
                            name='deskripsi_pengetahuan' value='{{ old('deskripsi_pengetahuan') }}' min=1 max=100 step="1">

                        @error('deskripsi_pengetahuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Keterampilan (1-100)</label>
                    <div class="col-md-12">
                        <input type="number" placeholder="1" class="form-control form-control-line"
                            name='keterampilan' value='{{ old('keterampilan') }}' min=1 max=100 step="any">

                        @error('keterampilan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Deskripsi Keterampilan</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="xxxx" class="form-control form-control-line"
                            name='deskripsi_keterampilan' value='{{ old('deskripsi_keterampilan') }}' min=1 max=100 step="1">

                        @error('deskripsi_keterampilan')
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
@endsection
