@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Perekapan Kuis</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Perekapan</li>
                <li class="breadcrumb-item active">Perekapan Kuis</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{ url(route('perekapan.print')) }}"
                        method="get" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="mapel_id" value='{{ $mapel_id }}'>
                        {{-- <input type="hidden" name="kelas_id" value='{{ $kelas_id }}'> --}}

                        {{-- <div class="form-group">
                            <label class="col-md-12">Kuis</label>
                            <div class="col-md-12">
                                @foreach($tests as $index => $test)
                                    <div class="pretty p-switch p-fill">
                                        <input class="test_ids form-check-input" type="checkbox" id="inlineCheckbox-{{ $test->id }}" value="{{ $test->id }}"
                                        @if($test->id == old("test_ids.$index")) checked @endif name="test_ids[]">
                                        <div class="state p-success">
                                            <label>{{ $test->nama }}</label>
                                        </div>
                                    </div>
                                @endforeach

                                @error('test_ids')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-sm-12 btn-group">
                                <button class="btn btn-primary mr-2" type="submit" name='printHtml' value='printHtml'>Print HTML</button>
                                <button class="btn btn-success" type="submit" name='printExcel' value='printExcel'>Print Excel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr style='background: linear-gradient(to right, #0178bc 0%, #ffc13b 100%); color: white;'>
                            <th width=3>No.</th>
                            <th>Nama Siswa</th>
                            <th>Nama Guru</th>
                            <th>Kelas</th>

                            @forelse ($tests as $test)
                            <th>{{ $test->nama }}</th>
                            @empty
                            <th>Tidak Ada Kuis</th>
                            @endforelse
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ auth()->user()->nama }}</td>
                                <td>{{ $user->kelas->nama }}</td>

                                @foreach($tests as $test)
                                <td>{{ $test->test_details->where('user_id', $user->id)->first()->nilai ?? 0 }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection
