@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Misi (Pisahkan dengan tanda -)</h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <form class="form-horizontal form-material"
                                      action="{{ url('/pengaturan/misi') }}"
                                      method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="form-group {{ $errors->has('misi') ? 'has-error' : ''}}">

                                        <div class="col-md-12">

                                            <textarea class="form-control" rows="5" name="misi" type="textarea"
                                                      id="misi" placeholder="misi"
                                                      required>{{ isset($misi) ? $misi : old('misi')}}</textarea>

                                            @error('misi')
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