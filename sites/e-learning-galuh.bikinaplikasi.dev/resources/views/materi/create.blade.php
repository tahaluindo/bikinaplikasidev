@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Materi</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Materi</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ url(route('materi.store')) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Kelas & Mapel</label>
                            <div class="col-md-12">
                                @foreach($mapel_details as $index => $mapel_detail)
                                <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox-{{ $mapel_detail->id }}" value="{{ $mapel_detail->id }}"
                                    @if($mapel_detail->id == old("mapel_detail_id.$index")) checked @endif name="mapel_detail_ids[]">
                                    {{ $mapel_detail->kelas->nama }} - {{ $mapel_detail->mapel->nama }}
                                  </label>
                                </div>
                                @endforeach

                                @error('mapel_detail_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Judul</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Judul Materi"
                                    class="form-control form-control-line @error('judul') is-invalid @enderror"
                                    value='{{ old('judul') }}' name='judul' required>

                                @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Link (Google Drive, Dropbox, Mediafire, dll)</label>
                            <div class="col-md-12">
                                <input type="url" placeholder="Link Materi"
                                    class="form-control form-control-line @error('link') is-invalid @enderror"
                                    value='{{ old('link') }}' name='link'>

                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">File Materi (Bisa Upload Banyak, max 100MB)</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control form-control-line @error('files.*') is-invalid @enderror" name='files[]' multiple>

                                @error('files[]')
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
