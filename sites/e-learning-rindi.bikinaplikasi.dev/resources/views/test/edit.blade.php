@extends("layouts.monster-admin-lite.app")

@section("content")
@php
    $soal_ids = old('soal_ids') == "" ? [] : old('soal_ids');
    //dd($soal_ids);
@endphp
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Kuis</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Kuis</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    @error('soal_ids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <form class="form-horizontal form-material" action="{{ url(route('test.update', ['test' => $test->id])) }}"
                        method="post" enctype="multipart/form-data" id="form-test">
                        @csrf
                        @method('put')
                        @error('soal_ids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group">
                            <label class="col-md-12">Kelas & Mapel</label>
                            <div class="col-md-12">
                                @foreach($mapel_details as $index => $mapel_detail)
                                    <div class="pretty p-switch p-fill">
                                        <input class="mapel_detail_ids form-check-input" type="checkbox" id="inlineCheckbox-{{ $mapel_detail->id }}" value="{{ $mapel_detail->id }}"
                                        @if($mapel_detail->id == old("mapel_detail_ids.$index") || in_array($mapel_detail->id, $test->mapel_detail_ids)) checked @endif name="mapel_detail_ids[]">
                                        <div class="state p-success">
                                            <label>{{ $mapel_detail->kelas->nama }} - {{ $mapel_detail->mapel->nama }}</label>
                                        </div>
                                    </div>
                                @endforeach

                                @error('mapel_detail_ids')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Nama Test</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Nama Test"
                                    class="form-control form-control-line @error('nama') is-invalid @enderror"
                                    value='{{ old('nama') == "" ? $test->nama : old('nama')}}' name='nama' required>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Jumlah Soal</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="Jumlah Soal"
                                    class="form-control form-control-line @error('jumlah_soal') is-invalid @enderror"
                                    value='{{ old('jumlah_soal') == "" ? $test->jumlah_soal : old('jumlah_soal') }}' name='jumlah_soal' required min="1">

                                @error('jumlah_soal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Jumlah Menit</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="Jumlah Menit"
                                    class="form-control form-control-line @error('jumlah_menit') is-invalid @enderror"
                                    value='{{ old('jumlah_menit') == "" ? $test->jumlah_menit : old('jumlah_menit') }}' name='jumlah_menit' required min="1">

                                @error('jumlah_menit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">
                                Jenis Soal
                            </label>
                            <div class="col-md-12">
                                <select class="jenis_soal form-control w-100" name='jenis_soal'>
                                    <option @if(old('jenis_soal')=='Latihan' || $test->jenis_soal == "Latihan") selected @endif value='Latihan'>
                                        Latihan</option>
                                    <option @if(old('jenis_soal')=='Ujian' || $test->jenis_soal == "Ujian") selected @endif value='Ujian'>
                                        Ujian</option>
                                </select>

                                @error('jenis_soal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">
                                Mode (Wajib pilih soal jika mode == normal)
                            </label>
                            <div class="col-md-12">
                                <select class="mode form-control w-100" name='mode' id="mode" required>
                                    <option value="">--Pilih Mode--</option>
                                    <option @if(old('mode')=='Essay Acak' || $test->mode == "Esssay Acak") selected @endif value='Essay Acak'>
                                        Essay Acak</option>
                                    <option @if(old('mode')=='Essay Normal' || $test->mode == "Essay Normal") selected @endif value='Essay Normal'>
                                        Essay Normal</option>
                                    <option @if(old('mode')=='Pilgan Acak' || $test->mode == "Pilgan Acak") selected @endif value='Pilgan Acak'>
                                        Pilgan Acak</option>
                                    <option @if(old('mode')=='Pilgan Normal' || $test->mode == "Pilgan Normal") selected @endif value='Pilgan Normal'>
                                        Pilgan Normal</option>
                                </select>

                                @error('mode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tanggal Mulai</label>
                            <div class="col-md-12">
                                <input type="text" class="flatpickr form-control form-control-line @error('tanggal_mulai') is-invalid @enderror"
                                name='tanggal_mulai' value="{{ old('tanggal_mulai') == "" ? $test->tanggal_mulai : old('tanggal_mulai') }}">

                                @error('tanggal_mulai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tanggal Selesai</label>
                            <div class="col-md-12">
                                <input type="text" class="flatpickr form-control form-control-line @error('files') is-invalid @enderror" name='tanggal_selesai'
                                 value="{{ old('tanggal_selesai')  == "" ? $test->tanggal_selesai : old('tanggal_selesai') }}">

                                @error('files')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="soal_ids" id="soal_ids" value="{{ old('soal_ids') == "" || old('soal_ids') == "[]" ? json_encode($test->soal_ids) : json_encode(old('soal_ids')) }}">

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

<div class="modal fade" id="modal-test-mode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Soal </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($mapel_details as $mapel_detail) @php if(!$mapel_detail->mapel->soal_pilgans) continue; @endphp
                <ul class="p-0" data-mapel-detail-id="{{ $mapel_detail->id }}" data-mode="Pilgan Normal" data-jenis="Latihan">
                    <li class="d-block text-monospace">
                        <h3>
                            {{ $mapel_detail->mapel->nama }}
                        </h3>
                    </li>

                    <li class="d-block">
                        <table class="table table-responsive table-striped w-100 table-sm">
                            <thead>
                                <tr>
                                    <th width="3">No</th>
                                    <th>Soal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($mapel_detail->mapel->soal_pilgans->where('jenis', "Latihan") as $index => $soal_pilgan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! substr($soal_pilgan->soal, 0, 75) !!}...</td>
                                    <td class="text-right">
                                        <div class="pretty p-switch p-fill">
                                                <input class="form-check-input" type="checkbox" value="{{ $soal_pilgan->id }}"
                                                @if($soal_pilgan->id == old("soal_pilgan.$index") || in_array($soal_pilgan->id, $soal_ids) || in_array($soal_pilgan->id, $test->soal_ids)) checked @endif name="soal_pilgan[]">
                                                <div class="state p-success">
                                                    <label></label>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </li>
                </ul>
                @endforeach

                @foreach($mapel_details as $mapel_detail) @php if(!$mapel_detail->mapel->soal_pilgans) continue; @endphp
                <ul class="p-0" data-mapel-detail-id="{{ $mapel_detail->id }}" data-mode="Pilgan Normal" data-jenis="Ujian">
                    <li class="d-block text-monospace">
                        <h3>
                            {{ $mapel_detail->mapel->nama }}
                        </h3>
                    </li>

                    <li class="d-block">
                        <table class="table table-responsive table-striped w-100 table-sm">
                            <thead>
                                <tr>
                                    <th width="3">No</th>
                                    <th>Soal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($mapel_detail->mapel->soal_pilgans->where('jenis', "Ujian") as  $index => $soal_pilgan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! substr($soal_pilgan->soal, 0, 75) !!}...</td>
                                    <td class="text-right">
                                        <div class="pretty p-switch p-fill">
                                            <input class="form-check-input" type="checkbox" value="{{ $soal_pilgan->id }}"
                                            @if($soal_pilgan->id == old("soal_pilgan.$index") || in_array($soal_pilgan->id, $soal_ids) || in_array($soal_pilgan->id, $test->soal_ids)) checked @endif name="soal_pilgan[]">
                                            <div class="state p-success">
                                                <label></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </li>
                </ul>
                @endforeach

                @foreach($mapel_details as $mapel_detail) @php if(!$mapel_detail->mapel->soal_pilgans) continue; @endphp
                <ul class="p-0" data-mapel-detail-id="{{ $mapel_detail->id }}" data-mode="Essay Normal" data-jenis="Latihan">
                    <li class="d-block text-monospace">
                        <h3>
                            {{ $mapel_detail->mapel->nama }}
                        </h3>
                    </li>

                    <li class="d-block">
                        <table class="table table-responsive table-striped w-100 table-sm">
                            <thead>
                                <tr>
                                    <th width="3">No</th>
                                    <th>Soal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($mapel_detail->mapel->soal_essays->where('jenis', "Latihan") as $index => $soal_essay)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! substr($soal_essay->soal, 0, 75) !!}...</td>
                                    <td class="text-right">
                                        <div class="pretty p-switch p-fill">
                                            <input class="form-check-input" type="checkbox" value="{{ $soal_essay->id }}"
                                            @if($soal_essay->id == old("soal_essay.$index") || in_array($soal_essay->id, $soal_ids) || in_array($soal_essay->id, $test->soal_ids)) checked @endif name="soal_essay[]">
                                            <div class="state p-success">
                                                <label></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </li>
                </ul>
                @endforeach

                @foreach($mapel_details as $mapel_detail) @php if(!$mapel_detail->mapel->soal_pilgans) continue; @endphp
                <ul class="p-0" data-mapel-detail-id="{{ $mapel_detail->id }}" data-mode="Essay Normal" data-jenis="Ujian">
                    <li class="d-block text-monospace">
                        <h3>
                            {{ $mapel_detail->mapel->nama }}
                        </h3>
                    </li>

                    <li class="d-block">
                        <table class="table table-responsive table-striped w-100 table-sm">
                            <thead>
                                <tr>
                                    <th width="3">No</th>
                                    <th>Soal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($mapel_detail->mapel->soal_essays->where('jenis', "Ujian") as  $index => $soal_essay)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! substr($soal_essay->soal, 0, 75) !!}...</td>
                                    <td class="text-right">
                                        <div class="pretty p-switch p-fill">
                                            <input class="form-check-input" type="checkbox" value="{{ $soal_essay->id }}"
                                            @if($soal_essay->id == old("soal_essay.$index") || in_array($soal_essay->id, $soal_ids) || in_array($soal_essay->id, $test->soal_ids)) checked @endif name="soal_essay[]">
                                            <div class="state p-success">
                                                <label></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
