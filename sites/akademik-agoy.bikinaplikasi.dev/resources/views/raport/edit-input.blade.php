@extends("layouts.admin-lte.app")

@section('page') Edit Inputan Raport @endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form class="form-horizontal form-material" action="{{ url(route('raport.inputStore', $raport->id)) }}"
                      method="post" enctype="multipart/form-data">
                    @csrf

                    <h3>Sikap Spiritual</h3>
                    <div class="form-group">
                        <label class="col-md-12">Predikat Sikap Spiritual</label>
                        <div class="col-md-12">
                            <select class="form-control form-control-line" name='predikat_sikap_spiritual'>
                                @foreach(["A", "B", 'C', 'D'] as $predikat_sikap_spiritual)
                                    <option value="{{ $predikat_sikap_spiritual }}"
                                            @if(old('predikat_sikap_spiritual')==$predikat_sikap_spiritual) selected
                                        @endif>{{ $predikat_sikap_spiritual }}</option>
                                @endforeach
                            </select>

                            @error('predikat_sikap_spiritual')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Deskripsi Sikap Spiritual</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Deskripsi sikap spiritual"
                                   class="form-control form-control-line @error('deskripsi_sikap_spritual') is-invalid @enderror"
                                   value='{{ old('deskripsi_sikap_spritual') }}' name='deskripsi_sikap_spritual' min=1
                                   max=100>

                            @error('deskripsi_sikap_spritual')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>



                    <h3>Sikap Sosial</h3>
                    <div class="form-group">
                        <label class="col-md-12">Predikat Sikap Sosial</label>
                        <div class="col-md-12">
                            <select class="form-control form-control-line" name='predikat_sikap_sosial'>
                                @foreach(["A", "B", 'C', 'D'] as $predikat_sikap_sosial)
                                    <option value="{{ $predikat_sikap_sosial }}"
                                            @if(old('predikat_sikap_sosial')==$predikat_sikap_sosial) selected
                                        @endif>{{ $predikat_sikap_sosial }}</option>
                                @endforeach
                            </select>

                            @error('predikat_sikap_sosial')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Deskripsi Sikap Sosial</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Deskripsi sikap sosial"
                                   class="form-control form-control-line @error('deskripsi_sikap_spritual') is-invalid @enderror"
                                   value='{{ old('deskripsi_sikap_spritual') }}' name='deskripsi_sikap_spritual' min=1
                                   max=100>

                            @error('deskripsi_sikap_spritual')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>




                    <h3>Ekstrakurikuler (Isi Secukupnya)</h3>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nama</label>
                            <input type="text" placeholder="Nama Ekstrakurikuler"
                                   class="form-control form-control-line @error('nama_ekstrakurikuler.0') is-invalid @enderror"
                                   value='{{ old('nama_ekstrakurikuler.0') }}' name='nama_ekstrakurikuler[0]' min=1
                                   max=100>

                            @error('nama_ekstrakurikuler.0')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Predikat</label>
                            <select class="form-control form-control-line" name='predikat_ekstrakurikuler[0]'>
                                @foreach(["A", "B", 'C', 'D'] as $predikat_ekstrakurikuler)
                                    <option value="{{ $predikat_ekstrakurikuler }}"
                                            @if(old('predikat_ekstrakurikuler.0')==$predikat_ekstrakurikuler) selected
                                        @endif>{{ $predikat_ekstrakurikuler }}</option>
                                @endforeach
                            </select>

                            @error('predikat_ekstrakurikuler.0')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan"
                                   class="form-control form-control-line @error('keterangan_ekstrakurikuler.0') is-invalid @enderror"
                                   value='{{ old('keterangan_ekstrakurikuler.0') }}' name='keterangan_ekstrakurikuler[0]' min=1
                                   max=100>

                            @error('keterangan_ekstrakurikuler.0')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nama</label>
                            <input type="text" placeholder="Nama Ekstrakurikuler"
                                   class="form-control form-control-line @error('nama_ekstrakurikuler.1') is-invalid @enderror"
                                   value='{{ old('nama_ekstrakurikuler.1') }}' name='nama_ekstrakurikuler[1]' min=1
                                   max=100>

                            @error('nama_ekstrakurikuler.1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Predikat</label>
                            <select class="form-control form-control-line" name='predikat_ekstrakurikuler[1]'>
                                @foreach(["A", "B", 'C', 'D'] as $predikat_ekstrakurikuler)
                                    <option value="{{ $predikat_ekstrakurikuler }}"
                                            @if(old('predikat_ekstrakurikuler.1')==$predikat_ekstrakurikuler) selected
                                        @endif>{{ $predikat_ekstrakurikuler }}</option>
                                @endforeach
                            </select>

                            @error('predikat_ekstrakurikuler.1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan"
                                   class="form-control form-control-line @error('keterangan_ekstrakurikuler.1') is-invalid @enderror"
                                   value='{{ old('keterangan_ekstrakurikuler.1') }}' name='keterangan_ekstrakurikuler[1]' min=1
                                   max=100>

                            @error('keterangan_ekstrakurikuler.1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nama</label>
                            <input type="text" placeholder="Nama Ekstrakurikuler"
                                   class="form-control form-control-line @error('nama_ekstrakurikuler.2') is-invalid @enderror"
                                   value='{{ old('nama_ekstrakurikuler.2') }}' name='nama_ekstrakurikuler[2]' min=1
                                   max=100>

                            @error('nama_ekstrakurikuler.2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Predikat</label>
                            <select class="form-control form-control-line" name='predikat_ekstrakurikuler[2]'>
                                @foreach(["A", "B", 'C', 'D'] as $predikat_ekstrakurikuler)
                                    <option value="{{ $predikat_ekstrakurikuler }}"
                                            @if(old('predikat_ekstrakurikuler.2')==$predikat_ekstrakurikuler) selected
                                        @endif>{{ $predikat_ekstrakurikuler }}</option>
                                @endforeach
                            </select>

                            @error('predikat_ekstrakurikuler.2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan"
                                   class="form-control form-control-line @error('keterangan_ekstrakurikuler.2') is-invalid @enderror"
                                   value='{{ old('keterangan_ekstrakurikuler.2') }}' name='keterangan_ekstrakurikuler[2]' min=1
                                   max=100>

                            @error('keterangan_ekstrakurikuler.2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>







                    <h3>Prestasi (Isi Secukupnya)</h3>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Jenis Prestasi</label>
                            <input type="text" placeholder="Jenis Prestasi"
                                   class="form-control form-control-line @error('jenis_prestasi.0') is-invalid @enderror"
                                   value='{{ old('jenis_prestasi.0') }}' name='jenis_prestasi[0]' min=1
                                   max=100>

                            @error('jenis_prestasi.0')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan.0"
                                   class="form-control form-control-line @error('keterangan_jenis_prestasi.0') is-invalid @enderror"
                                   value='{{ old('keterangan_jenis_prestasi.0') }}' name='keterangan_jenis_prestasi[]' min=1
                                   max=100>

                            @error('keterangan_jenis_prestasi.0')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>





                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Jenis Prestasi</label>
                            <input type="text" placeholder="Jenis Prestasi"
                                   class="form-control form-control-line @error('jenis_prestasi.1') is-invalid @enderror"
                                   value='{{ old('jenis_prestasi.1') }}' name='jenis_prestasi[1]' min=1
                                   max=100>

                            @error('jenis_prestasi.1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan.1"
                                   class="form-control form-control-line @error('keterangan_jenis_prestasi.1') is-invalid @enderror"
                                   value='{{ old('keterangan_jenis_prestasi.1') }}' name='keterangan_jenis_prestasi[]' min=1
                                   max=100>

                            @error('keterangan_jenis_prestasi.1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Jenis Prestasi</label>
                            <input type="text" placeholder="Jenis Prestasi"
                                   class="form-control form-control-line @error('jenis_prestasi.2') is-invalid @enderror"
                                   value='{{ old('jenis_prestasi.2') }}' name='jenis_prestasi[2]' min=1
                                   max=100>

                            @error('jenis_prestasi.2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan.2"
                                   class="form-control form-control-line @error('keterangan_jenis_prestasi.2') is-invalid @enderror"
                                   value='{{ old('keterangan_jenis_prestasi.2') }}' name='keterangan_jenis_prestasi[]' min=1
                                   max=100>

                            @error('keterangan_jenis_prestasi.2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Jenis Prestasi</label>
                            <input type="text" placeholder="Jenis Prestasi"
                                   class="form-control form-control-line @error('jenis_prestasi.3') is-invalid @enderror"
                                   value='{{ old('jenis_prestasi.3') }}' name='jenis_prestasi[3]' min=1
                                   max=100>

                            @error('jenis_prestasi.3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan.3"
                                   class="form-control form-control-line @error('keterangan_jenis_prestasi.3') is-invalid @enderror"
                                   value='{{ old('keterangan_jenis_prestasi.3') }}' name='keterangan_jenis_prestasi[]' min=1
                                   max=100>

                            @error('keterangan_jenis_prestasi.3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Jenis Prestasi</label>
                            <input type="text" placeholder="Jenis Prestasi"
                                   class="form-control form-control-line @error('jenis_prestasi.4') is-invalid @enderror"
                                   value='{{ old('jenis_prestasi.4') }}' name='jenis_prestasi[4]' min=1
                                   max=100>

                            @error('jenis_prestasi.4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan.4"
                                   class="form-control form-control-line @error('keterangan_jenis_prestasi.4') is-invalid @enderror"
                                   value='{{ old('keterangan_jenis_prestasi.4') }}' name='keterangan_jenis_prestasi[]' min=1
                                   max=100>

                            @error('keterangan_jenis_prestasi.4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Jenis Prestasi</label>
                            <input type="text" placeholder="Jenis Prestasi"
                                   class="form-control form-control-line @error('jenis_prestasi.5') is-invalid @enderror"
                                   value='{{ old('jenis_prestasi.5') }}' name='jenis_prestasi[5]' min=1
                                   max=100>

                            @error('jenis_prestasi.5')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Keterangan</label>
                            <input type="text" placeholder="Keterangan.5"
                                   class="form-control form-control-line @error('keterangan_jenis_prestasi.5') is-invalid @enderror"
                                   value='{{ old('keterangan_jenis_prestasi.5') }}' name='keterangan_jenis_prestasi[]' min=1
                                   max=100>

                            @error('keterangan_jenis_prestasi.5')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>






                    <h3>Ketidak Hadiran</h3>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Hadir</label>
                            <input type="text" placeholder="Hadir"
                                   class="form-control form-control-line @error('hadir') is-invalid @enderror"
                                   value='{{ old('hadir') }}' name='hadir' min=1
                                   max=100>

                            @error('hadir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label>Sakit</label>
                            <input type="text" placeholder="Sakit"
                                   class="form-control form-control-line @error('sakit') is-invalid @enderror"
                                   value='{{ old('sakit') }}' name='sakit' min=1
                                   max=100>

                            @error('sakit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label>Izin</label>
                            <input type="text" placeholder="Izin"
                                   class="form-control form-control-line @error('izin') is-invalid @enderror"
                                   value='{{ old('izin') }}' name='izin' min=1
                                   max=100>

                            @error('izin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label>Tanpa Keterangan</label>
                            <input type="text" placeholder="Tanpa Keterangan"
                                   class="form-control form-control-line @error('tanpa_keterangan') is-invalid @enderror"
                                   value='{{ old('tanpa_keterangan') }}' name='tanpa_keterangan' min=1
                                   max=100>

                            @error('tanpa_keterangan')
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
