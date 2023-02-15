@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Visi </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <form class="form-horizontal form-material"
                                      action="{{ url('/pengaturan/visi') }}"
                                      method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="form-group {{ $errors->has('visi') ? 'has-error' : ''}}">

                                        <div class="col-md-12">

                                            <textarea class="form-control" rows="5" name="visi" type="textarea"
                                                      id="visi" placeholder="visi"
                                                      required>{{ isset($pengaturan->visi) ? $pengaturan->visi : old('visi')}}</textarea>

                                            @error('visi')
                                            <span class="invalid-feedback text-danger" role="alert">
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
        </div>
    </div>
@endsection