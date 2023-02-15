@extends("layouts/app2")

@section("content")
    <div class="content pb-0">

        <div class="orders">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card px-2">
                        <div class="card-body">
                            <h4 class="box-title">Buku Tamu </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <form class="form-horizontal form-material"
                                      action="{{ url('/buku-tamu/' . $buku_tamu->id) }}"
                                      method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    @include ('buku-tamu.form', ['formMode' => 'edit'])
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection