@extends('pegawai.layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Periksa
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Periksa</a></li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default" style="padding:25px;">
                        {{ Form::model($obj, ['action' => $action, 'method' => $method]) }}
                        <div class="card-body">
                            <p>Data Periksa</p>

                            <div class="form-group">
                                <label for="bidan_id" class="font-weight-normal">Bidan</label>
                                <select class="form-control" name="bidan_id">
                                    <option>-- Pilih Bidan --</option>
                                    @foreach (\App\Bidan::all() as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == $obj['bidan_id']) selected @endif>{{ $item->nama }}

                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('bidan_id') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="gejala" class="font-weight-normal">Gejala <span class="text-sm text-muted">(
                                        gunakan
                                        tanda koma
                                        untuk memisahkan
                                        )</span></label>
                                <input type="text" class="form-control" name="gejala" id="gejala"
                                       aria-describedby="helpId" placeholder="" value="{{ $obj['gejala'] }}"
                                       data-role="tagsinput">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer btn-info text-right">
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <footer><p>Copyright © 2021 {{ env('APP_NAME') }}. All right reserved.

            </footer>
        </div>
    </div>
@endsection

