@extends('layouts.app')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>Dashboard</h2>
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
                            <li class="breadcrumb-item">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 xl-100">
                    <div class="row">
                        <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                            <div class="card gradient-primary o-hidden">
                                <div class="card-body tag-card">
                                    <div class="default-chart">
                                        <div class="apex-widgets">
                                            <div id="area-widget-chart"></div>
                                        </div>
                                        <div class="widgets-bottom">
                                            <h5 class="f-w-700 mb-0">Total Siswa<span
                                                    class="pull-right">{{ $siswa->count() }}</span></h5>
                                        </div>
                                    </div>
                                    <span class="tag-hover-effect"><span class="dots-group"><span
                                                class="dots dots1"></span><span
                                                class="dots dots2 dot-small"></span><span
                                                class="dots dots3 dot-small"></span><span
                                                class="dots dots4 dot-medium"></span><span
                                                class="dots dots5 dot-small"></span><span
                                                class="dots dots6 dot-small"></span><span
                                                class="dots dots7 dot-small-semi"></span><span
                                                class="dots dots8 dot-small-semi"></span><span
                                                class="dots dots9 dot-small"></span></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                            <div class="card gradient-secondary o-hidden">
                                <div class="card-body tag-card">
                                    <div class="default-chart">
                                        <div class="apex-widgets">
                                            <div id="area-widget-chart-2"></div>
                                        </div>
                                        <div class="widgets-bottom">
                                            <h5 class="f-w-700 mb-0">Total Guru<span
                                                    class="pull-right">{{ $guru->count() }}   </span></h5>
                                        </div>
                                    </div>
                                    <span class="tag-hover-effect"><span class="dots-group"><span
                                                class="dots dots1"></span><span
                                                class="dots dots2 dot-small"></span><span
                                                class="dots dots3 dot-small"></span><span
                                                class="dots dots4 dot-medium"></span><span
                                                class="dots dots5 dot-small"></span><span
                                                class="dots dots6 dot-small"></span><span
                                                class="dots dots7 dot-small-semi"></span><span
                                                class="dots dots8 dot-small-semi"></span><span
                                                class="dots dots9 dot-small"></span></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                            <div class="card gradient-warning o-hidden">
                                <div class="card-body tag-card">
                                    <div class="default-chart">
                                        <div class="apex-widgets">
                                            <div id="area-widget-chart-3"></div>
                                        </div>
                                        <div class="widgets-bottom">
                                            <h5 class="f-w-700 mb-0">Total Mapel<span
                                                    class="pull-right">{{ $mapel->count() }}  </span></h5>
                                        </div>
                                    </div>
                                    <span class="tag-hover-effect"><span class="dots-group"><span
                                                class="dots dots1"></span><span
                                                class="dots dots2 dot-small"></span><span
                                                class="dots dots3 dot-small"></span><span
                                                class="dots dots4 dot-medium"></span><span
                                                class="dots dots5 dot-small"></span><span
                                                class="dots dots6 dot-small"></span><span
                                                class="dots dots7 dot-small-semi"></span><span
                                                class="dots dots8 dot-small-semi"></span><span
                                                class="dots dots9 dot-small">     </span></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                            <div class="card gradient-info o-hidden">
                                <div class="card-body tag-card">
                                    <div class="default-chart">
                                        <div class="apex-widgets">
                                            <div id="area-widget-chart-4"></div>
                                        </div>
                                        <div class="widgets-bottom">
                                            <h5 class="f-w-700 mb-0">Total Kelas<span
                                                    class="pull-right">{{ $kelas->count() }}   </span></h5>
                                        </div>
                                    </div>
                                    <span class="tag-hover-effect"><span class="dots-group"><span
                                                class="dots dots1"></span><span
                                                class="dots dots2 dot-small"></span><span
                                                class="dots dots3 dot-small"></span><span
                                                class="dots dots4 dot-medium"></span><span
                                                class="dots dots5 dot-small"></span><span
                                                class="dots dots6 dot-small"></span><span
                                                class="dots dots7 dot-small-semi"></span><span
                                                class="dots dots8 dot-small-semi"></span><span
                                                class="dots dots9 dot-small">     </span></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 xl-100 box-col-12">
                    <div class="card year-overview">
                        <div class="card-header no-border d-flex">
                            <h5>Grafik Pendaftaran</h5>
                            <ul class="creative-dots">
                                <li class="bg-primary big-dot"></li>
                                <li class="bg-secondary semi-big-dot"></li>
                                <li class="bg-warning medium-dot"></li>
                                <li class="bg-info semi-medium-dot"></li>
                                <li class="bg-secondary semi-small-dot"></li>
                                <li class="bg-primary small-dot"></li>
                            </ul>
                            <div class="header-right pull-right text-right">
                                <h5 class="mb-2">Total: {{ $siswa->count() }}</h5>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-6 p-0 ct-10 default-chartist-container"></div>
                            <div class="col-6 p-0 ct-11 default-chartist-container"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 xl-100 box-col-12">
                    <div class="card">
                        <div class="card-header no-border">
                            <h5>Berdasarkan Jurusan</h5>
                            <ul class="creative-dots">
                                <li class="bg-primary big-dot"></li>
                                <li class="bg-secondary semi-big-dot"></li>
                                <li class="bg-warning medium-dot"></li>
                                <li class="bg-info semi-medium-dot"></li>
                                <li class="bg-secondary semi-small-dot"></li>
                                <li class="bg-primary small-dot"></li>
                            </ul>
                            
                        </div>
                        <div class="card-body p-0">
                            <div class="radial-default">
                                <div id="circlechart"></div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#example-head1" title="Copy"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 xl-100 box-col-12">
                    <div class="card">
                        <div class="card-header no-border">
                            <h5>Pendaftar Terakhir</h5>
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
                            <div class="activity-table table-responsive recent-table">
                                <table class="table table-bordernone">
                                    <tbody>
                                    @forelse($siswa->sortByDesc('created_at')->where('status', 'Baru Mendaftar') as $item)
                                        <tr>
                                            <td>
                                                <h5 class="default-text mb-0 f-w-700 f-18">{{ $item->nama }}</h5>
                                            </td>
                                            <td><span class="badge badge-pill recent-badge f-12">{{ $item->jenis_kelamin }}</span></td>
                                            <td class="f-w-700">{{ $item->alamat }}</td>
                                            <td>
                                                <h5 class="default-text mb-0 f-w-700 f-18">{{ $item->no_hp }}</h5>
                                            </td>
                                            <td><a class="btn btn-sm btn-primary-outline" href="{{ url($item->berkas) }}" download>Download</a></td>
                                        </tr>
                                    @empty
                                        <strong>Pendaftaran Belum Ada</strong>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#example-head21" title="Copy"><i
                                        class="icofont icofont-copy-alt"></i></button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 xl-100 box-col-12">
                    <div class="card gradient-primary o-hidden">
                        <div class="card-body">
                            <div class="setting-dot">
                                <div class="setting-bg-primary date-picker-setting position-set pull-right"><i
                                        class="fa fa-spin fa-cog"></i></div>
                            </div>
                            <div class="default-datepicker">
                                <div class="datepicker-here" data-language="en"></div>
                            </div>
                            <span class="default-dots-stay overview-dots full-width-dots"><span
                                    class="dots-group"><span class="dots dots1"></span><span
                                        class="dots dots2 dot-small"></span><span
                                        class="dots dots3 dot-small"></span><span
                                        class="dots dots4 dot-medium"></span><span
                                        class="dots dots5 dot-small"></span><span
                                        class="dots dots6 dot-small"></span><span
                                        class="dots dots7 dot-small-semi"></span><span
                                        class="dots dots8 dot-small-semi"></span><span
                                        class="dots dots9 dot-small">   </span></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection