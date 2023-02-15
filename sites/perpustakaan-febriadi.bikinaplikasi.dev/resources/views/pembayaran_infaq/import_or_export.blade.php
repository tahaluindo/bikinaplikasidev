@extends("layouts.matrix-admin.app")

@section("content")
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active" aria-current="page">Import / Export</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {{-- khusus import / export --}}
            <div class="col-6">
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{ route('user.import_excel') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">File Excel</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control form-control-line" name='file_excel'
                                        value="{{ old('file_excel') }}">

                                    @if($errors->any())
                                    <span class="invalid-feedback" role="alert">
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Import</button>
                                    <a href='{{ route('user.download_format_import_excel') }}'
                                        class="text-white btn bg-info" type="submit">Download Format</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- khusus import / export --}}
            <div class="col-6">
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{ route('user.export_excel') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Kelas</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='kelas_id'>
                                        <option value="">Semua</option>
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}" @if(old('kelas_id') == $kelas->id) selected @endif>{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Level</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='level'>
                                        <option value="">Semua</option>
                                        <option value="admin" @if(old('level') == "admin") selected @endif>Admin</option>
                                        <option value="siswa" @if(old('level') == "siswa") selected @endif>Siswa</option>
                                    </select>

                                    @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Limit</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="0"
                                        class="form-control form-control-line @error('limit') is-invalid @enderror"
                                        value='{{ old('limit') == "" ? 100 : old('limit')  }}'
                                        name='limit'>

                                    @error('limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Export</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
