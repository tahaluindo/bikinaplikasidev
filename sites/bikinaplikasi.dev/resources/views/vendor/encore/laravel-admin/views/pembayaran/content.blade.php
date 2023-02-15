@section('content')
    <section class="content-header">
        <h1>
            {!! $header ?: trans('admin.title') !!}
            <small>{!! $description ?: trans('admin.description') !!}</small>
        </h1>

        <!-- breadcrumb start -->
        @if ($breadcrumb)
        <ol class="breadcrumb" style="margin-right: 30px;">
            <li><a href="{{ admin_url('/') }}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
            @foreach($breadcrumb as $item)
                @if($loop->last)
                    <li class="active">
                        @if (\Illuminate\Support\Arr::has($item, 'icon'))
                            <i class="fa fa-{{ $item['icon'] }}"></i>
                        @endif
                        {{ $item['text'] }}
                    </li>
                @else
                <li>
                    @if (\Illuminate\Support\Arr::has($item, 'url'))
                        <a href="{{ admin_url(\Illuminate\Support\Arr::get($item, 'url')) }}">
                            @if (\Illuminate\Support\Arr::has($item, 'icon'))
                                <i class="fa fa-{{ $item['icon'] }}"></i>
                            @endif
                            {{ $item['text'] }}
                        </a>
                    @else
                        @if (\Illuminate\Support\Arr::has($item, 'icon'))
                            <i class="fa fa-{{ $item['icon'] }}"></i>
                        @endif
                        {{ $item['text'] }}
                    @endif
                </li>
                @endif
            @endforeach
        </ol>
        @elseif(config('admin.enable_default_breadcrumb'))
        <ol class="breadcrumb" style="margin-right: 30px;">
            <li><a href="{{ admin_url('/') }}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
            @for($i = 2; $i <= count(Request::segments()); $i++)
                <li>
                {{ucfirst(Request::segment($i))}}
                </li>
            @endfor
        </ol>
        @endif

        <!-- breadcrumb end -->

    </section>

    <section class="content">

        @include('admin::partials.alerts')
        @include('admin::partials.exception')
        @include('admin::partials.toastr')
        
        <div class="row" style="">
            <div class="col-xs-12">
                Saldo: <h3 class="text-success" style="display: inline-block; margin-bottom: 0px">{{ toIdr(\Admin::user()->saldo) }}</h3>
                
                @if(\Admin::user()->saldo)
                <a class="btn-success btn btn-sm" style="border-radius: 25px" href="{{ route('admin.pembayaran.create') }}">
                    <i class="fa fa-arrow-circle-down"></i>
                    Tarik
                </a>
                @endif
                
                <br>
                Total Penarikan: <h3 style="display: inline-block; margin-top: 5px" class="text-info">{{ toIdr($total_penarikan) }}</h3>
            </div>
        </div>

        @if($_view_)
            @include($_view_['view'], $_view_['data'])
        @else
            {!! $_content_ !!}
        @endif

    </section>
@endsection
