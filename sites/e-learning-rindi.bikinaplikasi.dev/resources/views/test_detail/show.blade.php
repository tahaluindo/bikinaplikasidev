@extends("layouts.monster-admin-lite.app")

@section("content")
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Soal & Jawaban</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        @if(in_array($test_detail->test->mode, ['Pilgan Normal', 'Pilgan Acak']))
                        <table class="table" id='dataTable'>
                            <thead>
                                <tr>
                                    <th>Soal</th>
                                    <th>Jawaban A</th>
                                    <th>Jawaban B</th>
                                    <th>Jawaban C</th>
                                    <th>Jawaban D</th>
                                    <th>Jawaban <br> Dipilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($test_detail->list_tests as $list_test)
                                @php 
                                    $soal = \App\SoalPilgan::findOrFail($list_test['soal_id']);
                                @endphp
                                <tr>
                                    <td clas='replace'>{!! $soal->soal !!}</td>
                                    <td clas='replace'>{!! $soal->opsi_a !!}</td>
                                    <td clas='replace'>{!! $soal->opsi_b !!}</td>
                                    <td clas='replace'>{!! $soal->opsi_c !!}</td>
                                    <td clas='replace'>{!! $soal->opsi_d !!}</td>
                                    <td clas='replace'>{!! $list_test['jawaban'] !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <form action="{{ route('soal_essay.koreksi') }}" method="post">
                            <input type="hidden" name='test_detail_id' value="{{ $test_detail->id }}">
                            <input type="hidden" name='test_id' value="{{ request()->test_id }}">
                            <table class="table" id='dataTable'>
                                <thead>
                                    <tr>
                                        <th>Soal</th>
                                        <th>Jawaban</th>
                                        @if(auth()->user()->level == "guru")
                                        <th>Koreksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($test_detail->list_tests as $list_test)
                                    @php 
                                        $soal = \App\SoalEssay::findOrFail($list_test['soal_id']);
                                    @endphp
                                    <tr>
                                        <td class='replace'>
                                            {{ Str::limit(preg_replace('/&nbsp;|<\/p>|<p>|<div>|<\/div>/', '', $soal->soal), 50) }}
                                        </td>
                                        <td>{{ preg_replace('/&nbsp;|<\/p>|<p>|<div>|<\/div>/', '', $list_test['jawaban']) }}</td>
                                        @if(auth()->user()->level == "guru")
                                        <td>
                                            
                                                @csrf
                                                <input type="checkbox" value="{{ $soal->id }}" name="koreksi[]" @if($list_test['koreksi'] ?? "" == "Benar") checked @endif>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="col-sm-12">
                                @if(auth()->user()->level == "guru")
                                <button class="btn btn-success float-right" type="submit">Simpan</button>
                                @endif
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
