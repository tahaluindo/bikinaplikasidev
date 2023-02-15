@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Kelas</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Kelas</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ url(route('kelas.store')) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Nama Kelas"
                                    class="form-control form-control-line @error('nama') is-invalid @enderror"
                                    value='{{ old('nama') }}' name='nama'>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label class="col-md-12">
                                Wali Kelas (Tidak Wajib)
                            </label>
                            <div class="col-md-12">
                                <select class="form-control  w-100" name='wali_kelas'>
                                    <option value="">Tidak Ada</option>
                                    @foreach($wali_kelass as $id => $nama)
                                    <option @if(old('wali_kelas')==$id) selected @endif
                                        value='{{ $id }}'>{{ $nama }}</option>
                                    @endforeach
                                </select>

                                @error('wali_kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">
                                Ketua Kelas (Tidak Wajib)
                            </label>
                            <div class="col-md-12">
                                <select class="form-control  w-100" name='ketua_kelas'>
                                    <option value="">Tidak Ada</option>
                                    @foreach($ketua_kelass as $id => $nama)
                                    <option @if(old('ketua_kelas')==$id) selected @endif
                                        value='{{ $id }}'>{{ $nama }}</option>
                                    @endforeach
                                </select>

                                @error('ketua_kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label class="col-md-12">Ruang</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Ruang Kelas"
                                    class="form-control form-control-line @error('ruang') is-invalid @enderror"
                                    value='{{ old('ruang') }}' name='ruang'>

                                @error('ruang')
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
