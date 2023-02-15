<div class='row'>
    <div class='col-md-12'>
        <form class="form-horizontal form-material" action="{{ url(route('buku.print')) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                <label for="judul" class="control-label">{{ 'Judul Buku' }}</label>

                <div class="col-md-12">
                    <input placeholder="judul"
                        class="form-control form-control-line @error('judul') is-invalid @enderror" name="judul"
                        type="text" id="judul" value="{{ isset($anggotum->judul) ? $anggotum->judul : old('judul')}}"
                        required>

                    @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Kode_buku</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='kode_buku'>
                        <option value=""></option>
                        @foreach($kode_bukus as $kode_buku)
                        <option value="{{ $kode_buku }}" @if(old('kode_buku')==$kode_buku) selected @endif>
                            {{ ucwords($kode_buku) }}</option>
                        @endforeach
                    </select>

                    @error('kode_buku')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Penulis</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='penulis'>
                        <option value=""></option>
                        @foreach($penuliss as $penulis)
                        <option value="{{ $penulis }}" @if(old('penulis')==$penulis) selected @endif>
                            {{ ucwords($penulis) }}</option>
                        @endforeach
                    </select>

                    @error('penulis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Penerbit</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='penerbit'>
                        <option value=""></option>
                        @foreach($penerbits as $penerbit)
                        <option value="{{ $penerbit }}" @if(old('penerbit')==$penerbit) selected @endif>
                            {{ ucwords($penerbit) }}</option>
                        @endforeach
                    </select>

                    @error('penerbit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Tahun</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='tahun'>
                        <option value=""></option>
                        @foreach($tahuns as $tahun)
                        <option value="{{ $tahun }}" @if(old('tahun')==$tahun) selected @endif>{{ ucwords($tahun) }}
                        </option>
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
                <label class="col-md-12">Kota</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='kota'>
                        <option value=""></option>
                        @foreach($kotas as $kota)
                        <option value="{{ $kota }}" @if(old('kota')==$kota) selected @endif>{{ ucwords($kota) }}
                        </option>
                        @endforeach
                    </select>

                    @error('kota')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-12">Status</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='status'>
                        @foreach(['', 'Belum Dikembalikan', 'Dikembalikan'] as $status)
                        <option value="{{ $status }}" @if(old('status')==$status) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>

                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Field</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='field' required>
                        @foreach(['id','judul','penulis','penerbit','tahun','kota','exemplar','ditambahkan'] as $field)
                        <option value="{{ $field }}" @if(old('field')==$field) selected @endif>
                            {{ ucwords(preg_replace("/_/", " ", $field)) }}</option>
                        @endforeach
                    </select>

                    @error('field')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Order</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='order' required>
                        @foreach(['ASC', 'DESC'] as $order)
                        <option value="{{ $order }}" @if(old('order')==$order) selected @endif>{{ $order }}</option>
                        @endforeach
                    </select>

                    @error('order')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button name='preview' value='true' class="btn btn-info" type="submit">Preview</button>
                    <button class="btn btn-success" type="submit">Print</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--
<div class="row">
    <div class="col-md-12 ">
        <h3 align="center">LAPORAN BUKU</h3>

        <table width="100%" border="1" style='margin-bottom: 250px;'>
            <thead>
                <tr>
                    <th width=3>No.</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Kota</th>
                    <th>Exemplar</th>
                    <th>Ditambahkan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($bukus as $buku)
                <tr>
                    <th>{{ $loop->iteration }}.</th>

                    <td>{{ $buku->judul }}</td>

                    <td>{{ $buku->penulis }}</td>

                    <td>{{ $buku->penerbit }}</td>

                    <td>{{ $buku->tahun }}</td>

                    <td>{{ $buku->kota }}</td>

                    <td>{{ $buku->exemplar }}</td>

                    <td>{{ $buku->ditambahkan }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> -->
