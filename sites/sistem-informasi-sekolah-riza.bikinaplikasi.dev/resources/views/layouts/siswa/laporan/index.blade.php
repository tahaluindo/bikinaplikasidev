<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 main-header">
                    <h2>siswa</h2>
                </div>
                <div class="col-lg-6 breadcrumb-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </a></li>
                        <li class="breadcrumb-item">siswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-6 xl-100 box-col-12">
                <div class="card">
                    <div class="card-header no-border">
                        <ul class="creative-dots">
                            <li class="bg-primary big-dot"></li>
                            <li class="bg-secondary semi-big-dot"></li>
                            <li class="bg-warning medium-dot"></li>
                            <li class="bg-info semi-medium-dot"></li>
                            <li class="bg-secondary semi-small-dot"></li>
                            <li class="bg-primary small-dot"></li>
                        </ul>

                    </div>
                    <div class="card-body pt-0">

                        @if(session()->has("error"))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get("error") }}
                            </div>
                        @elseif(session()->has("success"))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get("success") }}
                            </div>
                        @elseif(session()->has("warning"))
                            <div class="alert alert-warning" role="alert">
                                {{ session()->get("warning") }}
                            </div>
                        @endif

                        <form class="form-horizontal form-material" action="{{ url(route('siswa.print')) }}"
                              method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Tanggal Awal Pendaftaran</label>
                                <div class="col-md-12">
                                    <input type="date" name="tanggal_awal_pendaftaran"
                                           class="form-control form-control-line"
                                           value='{{ old('tanggal_awal_pendaftaran') == "" ? date('Y-m-d') : old('tanggal_awal_pendaftaran') }}'
                                           name='tanggal_awal_pendaftaran'
                                           min=1 required>
                                    @error('tanggal_awal_pendaftaran')
                                    <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Tanggal Akhir Pendaftaran</label>
                                <div class="col-md-12">
                                    <input type="date" name="tanggal_akhir_pendaftaran"
                                           class="form-control form-control-line"
                                           value='{{ old('tanggal_akhir_pendaftaran') == "" ? date('Y-m-d') : old('tanggal_akhir_pendaftaran') }}'
                                           name='tanggal_akhir_pendaftaran'
                                           min=1 required>
                                    @error('tanggal_akhir_pendaftaran')
                                    <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Status</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='status' required>
                                        @foreach(["Baru Mendaftar", 'Pendaftaran Diterima','Ditolak'] as $status)
                                            <option value="{{ $status }}" @if(old('status')==$status)
                                            selected @endif>{{ ucwords(preg_replace("/_/", " ", $status)) }}</option>
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
                                        @foreach(['id','nip','nama','jenis_kelamin','alamat','created_at','updated_at'] as $field)
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
                                <label class="col-md-12">Order</label>
                                <div class="col-md-12">
                                    <select class="form-control form-control-line" name='order' required>
                                        @foreach(['ASC', 'DESC'] as $order)
                                            <option value="{{ $order }}" @if(old('order')==$order)
                                            selected @endif>{{ $order }}</option>
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
                                <label class="col-md-12">Limit</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="{{ $limit }}"
                                           class="form-control form-control-line" id="example-limit"
                                           value='{{ old('limit') == "" ? $limit : old('limit') }}' name='limit'
                                           max='{{ $limit }}' min=1 required>
                                    @error('limit')
                                    <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button name='preview' value='true' class="btn btn-info" type="submit">Preview
                                    </button>
                                    <button class="btn btn-primary" type="submit">Print Html</button>
                                    <button class="btn btn-secondary" type="submit" name="print_grafik" value="-">Print Grafik</button>
                                </div>
                            </div>
                        </form>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard"
                                    data-clipboard-target="#example-head21" title="Copy"><i
                                    class="icofont icofont-copy-alt"></i></button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>