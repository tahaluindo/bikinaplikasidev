@extends('layouts.app')

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="#" class="">Application</a> <i
            data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#"
                                                                          class="breadcrumb--active">Dashboard</a>
    </div>
@endsection


@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Dashboard
                    </h2>
                    <a href="" onclick="window.location.href = ''"
                       class="ml-auto flex text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw"
                                                                                class="w-4 h-4 mr-3"></i> Reload
                        Data </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                             title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                                                                        class="w-4 h-4"></i></div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $penjualan->count() }}</div>
                                <div class="text-base text-gray-600 mt-1">Total Produk Terjual</div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">--}}
{{--                        <div class="report-box zoom-in">--}}
{{--                            <div class="box p-5">--}}
{{--                                <div class="flex">--}}
{{--                                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>--}}
{{--                                    <div class="ml-auto">--}}
{{--                                        <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer"--}}
{{--                                             title="2% Lower than last month"> 2% <i data-feather="chevron-down"--}}
{{--                                                                                     class="w-4 h-4"></i></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="text-3xl font-bold leading-8 mt-6">{{ $pembelian->count() }}</div>--}}
{{--                                <div class="text-base text-gray-600 mt-1">Total Pembelian</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                             title="12% Higher than last month"> 12% <i data-feather="chevron-up"
                                                                                        class="w-4 h-4"></i></div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $produk->count() }}</div>
                                <div class="text-base text-gray-600 mt-1">Total Produk</div>
                            </div>
                        </div>
                    </div>
{{--                    --}}
{{--                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">--}}
{{--                        <div class="report-box zoom-in">--}}
{{--                            <div class="box p-5">--}}
{{--                                <div class="flex">--}}
{{--                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>--}}
{{--                                    <div class="ml-auto">--}}
{{--                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"--}}
{{--                                             title="22% Higher than last month"> 22% <i data-feather="chevron-up"--}}
{{--                                                                                        class="w-4 h-4"></i></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="text-3xl font-bold leading-8 mt-6">{{ $pemasok->count() }}</div>--}}
{{--                                <div class="text-base text-gray-600 mt-1">Pemasok</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-6 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Grafik Penjualan
                    </h2>
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                        <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input type="text" class="datepicker input w-full sm:w-56 box pl-10">
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="flex flex-col xl:flex-row xl:items-center">
                        <div class="flex">
                            <div>
                                <div class="text-theme-20 dark:text-gray-300 text-lg xl:text-xl font-bold">Rp5.000.000
                                </div>
                                <div class="mt-0.5 text-gray-600 dark:text-gray-600">Bulan Ini</div>
                            </div>
                            <div
                                class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-6"></div>
                            <div>
                                <div class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium">
                                    Rp10.000.000
                                </div>
                                <div class="mt-0.5 text-gray-600 dark:text-gray-600">Bulan Lalu</div>
                            </div>
                        </div>
                        <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                            <button
                                class="dropdown-toggle button font-normal border dark:border-dark-5 text-white dark:text-gray-300 relative flex items-center text-gray-700">
                                Filter Kategori <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i></button>
                            <div class="dropdown-box w-40">
                                <div class="dropdown-box__content box dark:bg-dark-1 p-2 overflow-y-auto h-32">
                                    @foreach($produk as $item)
                                        <a href="#"
                                           class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">{{ $item->nama }}</a>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="report-chart">
                        <canvas id="report-line-chart" height="169" class="mt-6"></canvas>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            <!-- BEGIN: Weekly Top Seller -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Top Produk Minggu Ini
                    </h2>
                    <a href="#" class="ml-auto text-theme-1 dark:text-theme-10 truncate">See all</a>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <canvas class="mt-3" id="report-pie-chart" height="300"></canvas>
                    <div class="mt-8">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                            <span class="truncate">17 - 30 Years old</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">62%</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                            <span class="truncate">31 - 50 Years old</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">33%</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                            <span class="truncate">>= 50 Years old</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">10%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Weekly Top Seller -->
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Grafik Pembelian
                    </h2>
                    <a href="#" class="ml-auto text-theme-1 dark:text-theme-10 truncate">See all</a>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <canvas class="mt-3" id="report-donut-chart" height="300"></canvas>
                    <div class="mt-8">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                            <span class="truncate">17 - 30 Years old</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">62%</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                            <span class="truncate">31 - 50 Years old</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">33%</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                            <span class="truncate">>= 50 Years old</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">10%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->

        </div>
        <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
            <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                <!-- BEGIN: Transactions -->
                <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3 xxl:mt-8">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Transaksi
                        </h2>
                    </div>
                    <div class="mt-5">
                        @forelse($penjualan as $item)
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">

                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">{{ $item->pending }}</div>
                                        <div
                                            class="text-gray-600 text-xs mt-0.5">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                                    </div>
                                    <div
                                        class="text-theme-6" style="color: green;">{{ toIdr($item->penjualan_details()->sum('total')) }}</div>
                                </div>
                            </div>
                        @empty
                            <strong>Belum ada transaksi</strong>
                        @endforelse

                        <a href="{{ url('penjualan') }}"
                           class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">Lihat
                            Lainnya</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection