<!DOCTYPE html>

<html>

<head>
    <title>{{ $test->nama }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/flatly/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ url('exam-wizard/css/style.css')}}" />
</head>

<body>
    <div class="container" style="margin:0px auto">
        <h1 class='text-center'>{{ $test->nama }}</h1>
        <div class="col-sm-12 col-md-9">
            <form id="examwizard-question" action="{{ url(route('test_detail.store')) }}" method="post">
                @csrf

                <input type="hidden" name='test_id' value="{{ $test->id }}">
                <input type="hidden" name='user_id' value="{{ auth()->user()->id }}">
                <input type="hidden" name='test_detail_id' value="{{ $test_detail->id }}">

                @foreach($soals as $index => $soal)
                    @php
                        $terjawab = false;
                        $jawaban = null;

                        foreach($test_detail->list_tests as $list_test) {
                            // khusus soal essay
                            if($list_test['soal_id'] == $soal->id && isset($list_test['jawaban']) && in_array($test->mode, ['Essay Normal', 'Essay Acak'])) {
                                $jawaban = $list_test['jawaban'];

                                continue;
                            }

                            // khusus soal pilgan
                            if($list_test['soal_id'] == $soal->id && isset($list_test['jawaban'])) {
                                $terjawab = true;
                                $jawaban = $list_test['jawaban'];
                            }
                        }
                    @endphp

                {{-- {{ $soal->id }} {{ json_encode($test_detail->id) }}
                {{ dump(array_search($soal->id, $test_detail->list_tests[$index] ?? [])) }} --}}
                <div class="question @if($index != 0) hidden @endif" data-question="{{ $index + 1 }}">
                    <div class="row">
                        <div class="col-xs-12">
                            <pre>
                                <h3 class="question-title color-green d-inline-block">{{ $index + 1 }}. {!! $soal->soal !!}</h3>
                            </pre>
                            <input type="hidden" name='list_tests[{{ $index }}][soal_id]' value="{{ $soal->id }}">
                        </div>
                    </div>
                    <div class="row mt-50">
                        <div class="col-xs-12">
                            <div class="alert alert-danger hidden"></div>
                            <div class="green-radio color-green">
                                @if(in_array($test->mode, ['Pilgan Acak', 'Pilgan Normal']))
                                <ol type="A">
                                    <li class="font-size-30 answer-number">
                                        <input type="radio" data-alternatetype="radio"
                                            name='list_tests[{{ $index }}][jawaban]'
                                            data-alternateName="answer[{{ $index }}]" data-alternateValue="A" value="A"
                                            id="answer-{{ $index }}-1" @if($terjawab && $jawaban=="A" ) checked
                                            @endif /><label for="answer-{{ $index }}-1"
                                            class="answer-text"><span></span> 
                                             {!! $soal->opsi_a !!}
                                        </label>
                                    </li>
                                    <li class="font-size-30 answer-number">
                                        <input type="radio" data-alternatetype="radio"
                                            name='list_tests[{{ $index }}][jawaban]'
                                            data-alternateName="answer[{{ $index }}]" data-alternateValue="B" value="B"
                                            id="answer-{{ $index }}-2" @if($terjawab && $jawaban=="B" ) checked
                                            @endif/><label for="answer-{{ $index }}-2"
                                            class="answer-text" ><span></span>
                                            {!! $soal->opsi_b !!}
                                        </label>
                                    </li>
                                    <li class="font-size-30 answer-number">
                                        <input type="radio" data-alternatetype="radio"
                                            name='list_tests[{{ $index }}][jawaban]'
                                            data-alternateName="answer[{{ $index }}]" data-alternateValue="C" value="C"
                                            id="answer-{{ $index }}-3"  @if($terjawab && $jawaban=="C" ) checked
                                            @endif/><label for="answer-{{ $index }}-3"
                                            class="answer-text"><span></span>
                                            {!! $soal->opsi_c !!}
                                        </label>
                                    </li>
                                    <li class="font-size-30 answer-number">
                                        <input type="radio" data-alternatetype="radio"
                                            name='list_tests[{{ $index }}][jawaban]'
                                            data-alternateName="answer[{{ $index }}]" data-alternateValue="D" value="D"
                                            id="answer-{{ $index }}-4"  @if($terjawab && $jawaban=="D" ) checked
                                            @endif/><label for="answer-{{ $index }}-4"
                                            class="answer-text"><span></span>
                                            {!! $soal->opsi_d !!}
                                        </label>
                                    </li>
                                </ol>
                                @else
                                <textarea name='list_tests[{{ $index }}][jawaban]'
                                    data-alternateName="answer[{{ $index }}]" data-alternateValue="Text" id="answer-{{ $index + 1 }}-1"
                                    class="form-control" placeholder="Jawab Disini..." rows='10'>{{ $jawaban }}</textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <input type="hidden" value="1" id="currentQuestionNumber" name="currentQuestionNumber" />
                <input type="hidden" value="{{ $soals->count() }}" id="totalOfQuestion" name="totalOfQuestion" />
                <input type="hidden" value="[]" id="markedQuestion" name="markedQuestions" />
            </form>
        </div>

        <div class="col-sm-12 col-md-3" id="quick-access-section">
            <table class="table table-responsive table-borderd table-hover table-striped text-center">
                <thead class="question-response-header">
                    <tr>
                        <th class="text-center">Question</th>
                        <th class="text-center">Response</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($soals as $index => $soal)
                    @php
                        $soal_id = isset($test_detail->list_tests[$index]) ? $test_detail->list_tests[$index]['soal_id'] :
                        null;
                        $jawaban = isset($test_detail->list_tests[$index]) ? $test_detail->list_tests[$index]['jawaban'] :
                        null;
                    @endphp
                    <tr class="question-response-rows" data-question="{{ $index + 1 }}">
                        <td>{{ $index + 1 }}</td>
                        <td class="question-response-rows-value">
                            {{-- kalo soalnya essay gak perlu tampilin jawaban, soal pilgan normal, atau acak tampilin jawaban (a,b,c,d) --}}
                            @if(in_array($test->mode, ['Essay Normal', 'Essay Acak']))
                            {{ $jawaban ? "Text" : "-" }}
                            @elseif(in_array($test->mode, ['Pilgan Normal', 'Pilgan Acak']))
                            {{ $jawaban ? $jawaban : "-" }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-xs-12 text-danger">
                @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
            </div>
            <div class="col-xs-12 text-center">
                <a href="javascript:void(0)" class="btn btn-success" id="quick-access-prev">< Back</a>
                <span class="alert alert-info" id="quick-access-info"></span>
                <a href="javascript:void(0)" class="btn btn-success" id="quick-access-next">Next ></a>
            </div>
            <div class="col-xs-12 text-secondary">
                <h1 class='text-center' id='timer'>{{ $test_detail->sisa_waktu }} Menit</h1>
            </div>
        </div>

        <!-- Exmas Footer - Multi Step Pages Footer -->
        <div class="row">
            <div class="col-sm-12 exams-footer text-align-center">
                <div class="col-xs-4 col-sm-1 back-to-prev-question-wrapper text-center">
                    <a href="javascript:void(0);" id="back-to-prev-question" class="btn btn-success disabled">
                        Back
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2 footer-question-number-wrapper text-center">
                    <div class="mt-4">
                        <span id="current-question-number-label">1</span>
                        <span>Of <b>{{ count($test->soal_ids) }}</b></span>
                    </div>
                    <div class="mt-4">
                        Question Number
                    </div>
                </div>
                <div class="col-xs-4 col-sm-1 go-to-next-question-wrapper text-center">
                    <a href="javascript:void(0);" id="go-to-next-question" class="btn btn-success">
                        Next
                    </a>
                </div>
                <div class="visible-xs">
                    <div class="clearfix"></div>
                    <div class="mt-50"></div>
                </div>
                <div class="col-sm-6 text-center">
                    @foreach($soals as $index => $soal)
                    <div class="mark-unmark-wrapper @if($index != 0) hidden @endif" data-question="{{ $index + 1 }}">
                        <a href="javascript:void(0);" class="mark-question btn btn-success"
                            data-question="{{ $index + 1 }}"  style='margin-top: 10px;'>
                            <b>MARK</b>
                        </a>
                        <a href="javascript:void(0);" class="hidden unmark-question btn btn-success"
                            data-question="{{ $index + 1 }}"  style='margin-top: 10px;'>
                            <b>UNMARK</b>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="col-sm-6 col-md-2 footer-finish-question-wrapper text-center" style='margin-top: 10px;'>
                    <a href="javascript:void(0);" id="finishExams"
                        class="btn btn-success {{ $soals->count() == 1 ? "" : "disabled" }}">
                        <b>Finish</b>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Finsih Modal -->
    <div class="modal fade" id="finishExamsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detail {{ $test->jenis_soal }}</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <span>Total Of Answerd Quastion</span>
                        <span class="finishExams-total-answerd"></span>
                    </div>
                    <div>
                        <span>Total Of Marked Quastion</span>
                        <span class="finishExams-total-marked"></span>
                    </div>
                    <div>
                        <span>Total Of Remaining Quastion</span>
                        <span class="finishExams-total-remaining"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="examwizard-question"
                        onclick="return confirm('Yakin akan menyimpan jawaban?')">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ url('exam-wizard/js/examwizard.min.js') }}"></script>
    <script>
        var examWizard = $.fn.examWizard({
            finishOption: {
                enableModal: true,
            },
            quickAccessOption: {
                quickAccessPagerItem: 10,
            },
        });

        const timer = $('#timer');

        setInterval(() => {
            $.ajax({
                url: '{{  url(route("test_detail.timer", ["test_detail" => $test_detail->id])) }}',
                success: function(response) {
                    var response = parseInt(response);

                    if(response) {
                        timer.text(response + " Menit");
                    } else {
                        timer.html(`<span class=text-danger>Waktu Habis!!!</span>`);
                        
                        $("#examwizard-question").submit();
                        // location.href = "{{ url(route('test.index')) }}";
                    }
                }
            });
        }, 60000);
        // }, {{ $test->jumlah_menit * 60000 }});
    </script>
</body>

</html>