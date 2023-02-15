<div class='row'>
    <div class='col-md-6'>
        <form class="form-horizontal form-material" action="{{ url(route('peminjaman.print')) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('tanggal_awal') ? 'has-error' : ''}}">
                <label class="col-md-12">{{ 'Tanggal Awal' }}</label>

                <div class="col-md-12">
                    <input placeholder="tanggal_awal"
                        class="flatpickr form-control form-control-line @error('tanggal_awal') is-invalid @enderror"
                        name="tanggal_awal" type="text" id="tanggal_awal" value="{{ old('tanggal_awal') == "" ? now()->format('d-M-Y') : old('tanggal_awal')}}" required>

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
                        name="tanggal_akhir" type="text" id="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required>

                    @error('tanggal_akhir')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">Petugas</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name='user_petugas_id'>
                        <option value=""></option>
                        @foreach($petugass as $petugas)
                        <option value="{{ $petugas->id }}" @if(old('user_petugas_id')==$petugas->id)
                            selected @endif>{{ ucwords($petugas->name) }}</option>
                        @endforeach
                    </select>

                    @error('user_petugas_id')
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
                        @foreach(['id','anggota_id','user_petugas_id','tanggal','tanggal_pengembalian','status']
                        as $field)
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
                        <option value="{{ $order }}" @if(old('order')==$order) selected @endif>{{ $order }}
                        </option>
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
{{-- 
<div class="row">
    <div class="col-md-12">
        <h3 align="center">LAPORAN PEMINJAMAN</h3>

        <table width="100%" border="1" style='margin-bottom: 250px;'>
            <thead>
                <tr>
                    <th width=3>No.</th>
                    <th>Anggota Id</th>
                    <th>User Petugas Id</th>
                    <th>Tanggal</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($peminjamans as $peminjaman)
                <tr>
                    <th>{{ $loop->iteration }}.</th>
                    <td>{{ $peminjaman->anggota->nama }}</td>

                    <td>{{ $peminjaman->user_petugas->name }}</td>

                    <td>{{ $peminjaman->tanggal }}</td>

                    <td>{{ $peminjaman->tanggal_pengembalian }}</td>

                    <td>{{ $peminjaman->status }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}