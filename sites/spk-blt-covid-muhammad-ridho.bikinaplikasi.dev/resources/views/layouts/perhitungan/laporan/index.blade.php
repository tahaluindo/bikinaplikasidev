<div class='row'>
    <div class='col-md-12'>
        <form class="form-horizontal form-material" action="{{ url(route('kriteria.print')) }}" method="post"
            enctype="multipart/form-data">
            @csrf


            <div class="form-group">
                <label class="col-md-12">Jenis Kelamin</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='jenis_kelamin'>
                        @foreach(['', 'Laki - Laki', 'Perempuan'] as $jenis_kelamin)
                        <option value="{{ $jenis_kelamin }}" @if(old('jenis_kelamin')==$jenis_kelamin) selected @endif>
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
                        <option value="{{ $status }}" @if(old('status')==$status) selected @endif>{{ ucwords($status) }}
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
                    <select class="form-control form-control-line" name='field'  required>
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
<h3 align="center">LAPORAN kriteria</h3>

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
                @foreach($kriterias as $kriteria)
                <tr>
                    <th>{{ $loop->iteration }}.</th>
                    <td>{{ $kriteria->no_identitas }}</td>
                    <td>{{ $kriteria->nama }}</td>
                    <td>{{ $kriteria->jenis_kelamin }}</td>
                    <td>{{ $kriteria->alamat }}</td>
                    <td>{{ $kriteria->no_telepon }}</td>
                    <td>{{ $kriteria->status }}</td>
                    <td>{{ $kriteria->dibuat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}
