<div class='row'>
    <div class='col-md-12'>
        <form class="form-horizontal form-material" action="{{ url(route('anggota.print')) }}" method="post"
              enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('tanggal_awal') ? 'has-error' : ''}}">
                <label class="col-md-12">{{ 'Tanggal Awal' }}</label>

                <div class="col-md-12">
                    <input placeholder="tanggal_awal"
                           class="flatpickr form-control form-control-line @error('tanggal_awal') is-invalid @enderror"
                           name="tanggal_awal" type="text" id="tanggal_awal"
                           value="{{ old('tanggal_awal') == "" ? now()->format('d-M-Y') : old('tanggal_awal')}}"
                           required>

                    @error('tanggal_awal')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group {{ $errors->has('tanggal_akhir') ? 'has-error' : ''}}">
                <label class="col-md-12">{{ 'Tanggal Akhir' }}</label>

                <div class="col-md-12">
                    <input placeholder="tanggal_akhir"
                           class="flatpickr form-control form-control-line @error('tanggal_akhir') is-invalid @enderror"
                           name="tanggal_akhir" type="text" id="tanggal_akhir" value="{{ old('tanggal_akhir') }}"
                           required>

                    @error('tanggal_akhir')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-12">Jenis Kelamin</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='jenis_kelamin'>
                        @foreach(['', 'Laki - Laki', 'Perempuan'] as $jenis_kelamin)
                            <option value="{{ $jenis_kelamin }}"
                                    @if(old('jenis_kelamin')==$jenis_kelamin) selected @endif>
                                {{ ucwords($jenis_kelamin) }}</option>
                        @endforeach
                    </select>

                    @error('jenis_kelamin')
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
                        @foreach(['', 'Aktif', 'Tidak Aktif'] as $status)
                            <option value="{{ $status }}"
                                    @if(old('status')==$status) selected @endif>{{ ucwords($status) }}
                            </option>
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
                <label class="col-md-12">Field</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='field' required>
                        @foreach(['id','no_identitas','nama','jenis_kelamin','alamat','no_telepon','status','dibuat'] as $field)
                            <option value="{{ $field }}" @if(old('field')==$field)
                            selected @endif>{{ ucwords(preg_replace("/_/", " ", $field)) }}</option>
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
                <div class="col-sm-12">
                    <button name='preview' value='true' class="btn btn-info" type="submit">Preview</button>
                    <button class="btn btn-success" type="submit">Print</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{--
<h3 align="center">LAPORAN ANGGOTA</h3>

<div class="row">
    <div class="col-md-12 ">
        <table width="100%" border="1" style='margin-bottom: 250px;'>
            <thead>
                <tr>
                    <th width=3>No.</th>
                    <th>No identitas</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                </tr>
            </thead>

            <tbody>
                @foreach($anggotas as $anggota)
                <tr>
                    <th>{{ $loop->iteration }}.</th>
                    <td>{{ $anggota->no_identitas }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->jenis_kelamin }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>{{ $anggota->no_telepon }}</td>
                    <td>{{ $anggota->status }}</td>
                    <td>{{ $anggota->dibuat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}
