@extends("layouts.admin-lte.app")

@section('page') Tambah Absensi @endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form class="form-horizontal form-material" action="{{ url(route('absensi.update', $absensi->id)) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="col-md-12">Mapel Detail Id</label>
                        <div class="col-md-12">
                            <select class="mapel_detail_id form-control w-100" name='mapel_detail_id'>
                                @foreach($mapel_details as $mapel_detail )
                                    <option
                                        @if(old('mapel_detail_id')==$mapel_detail->mapel->id || $absensi->mapel_detail_id == $mapel_detail->id) selected
                                        @endif
                                        value={{ $mapel_detail->id }}>
                                        {{ $mapel_detail->mapel->nama }}
                                        | {{ $mapel_detail->kelas->nama }}</option>
                                @endforeach
                            </select>

                            @error('mapel_detail_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Tanggal</label>
                        <div class="col-md-12">
                            <input type="date" placeholder="Absensi 1"
                                   class="form-control form-control-line @error('tanggal') is-invalid @enderror"
                                   value='{{ old('tanggal') == "" ? $absensi->tanggal : old('tanggal') }}'
                                   name='tanggal'>

                            @error('tanggal')
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
