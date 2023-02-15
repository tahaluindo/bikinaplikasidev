<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ url('monster-admin-lite/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url("css/style.css") }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row page-titles mb-2">
            <div class="col-md-12 align-self-center">
                <h3 class="text-left" style='display: inline; position: absolute; top: 10px; border: dotted #333; padding: 5px; border-radius: 5px;'>{{ $mapel->nama }}</h3>
                <h3 class="text-center">Nilai Kuis</h3>
                <h3 class="text-center">{{ date('Y-m-d') }}</h3>
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

    <script>
    window.print();
    </script>
</body>