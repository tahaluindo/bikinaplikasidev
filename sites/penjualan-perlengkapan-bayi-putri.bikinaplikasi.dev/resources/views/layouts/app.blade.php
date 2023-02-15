<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Aplikasi Penjualan Perlengkapan Bayi</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('dist/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('dist/vendor/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <!-- Data Tables -->
    <link href="{{ asset('dist/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Datepicker -->
    <link href="{{ asset('dist/vendor/bootstrap-datepicker/css/datepicker.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('dist/css/custom/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-info flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('home')}}" style="font-family: 'Chewy', cursive;">{{ Auth::user()->role == "SU" ? "A D M I N": "O W N E R" }}</a>
        {{--  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('home')}}" style="font-family:'Tokoku'">{{ Auth::user()->role == "SU" ? "A D M I N": "O W N E R" }}</a>  --}}
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ url('/logout') }}" onclick='return confirm("Keluar?");'>
                Keluar</a>
            </li>
            {{-- <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                Keluar</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li> --}}
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(1) == 'home' ? 'active':''}}" href="{{route('home')}}"><span class="fa fa-home fa-fw"></span> Dasbor</a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                    <span>Supplier</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('supplier/create')  ? 'active':''}}" href="{{route('whCreate')}}"><span class="fa fa-plus-square fa-fw"></span> Supplier Baru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('supplier') ? 'active':''}}" href="{{route('whIndex')}}"><span class="fa fa-map-marker-alt fa-fw"></span> List Supplier</a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                    <span>Barang</span>
                </h6>
                <ul class="nav flex-column">
                    @if(auth()->user()->role != 'U')
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('product/create') ? 'active':''}}" href="{{route('pdCreate')}}"><span class="fa fa-plus-square fa-fw"></span> Barang Baru</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('product') ? 'active':''}}" href="{{route('pdIndex')}}"><span class="fa fa-clipboard-list fa-fw"></span> List Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(1) == 'stockreport' ? 'active':''}}" href="{{route('wsIndex')}}"><span class="fa fa-exclamation fa-fw"></span> Laporan Stok</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link {{Request::segment(1) == 'stockopname' ? 'active':''}}" href="{{route('soIndex')}}"><span class="fa fa-list-ol fa-fw"></span> Perhitungan Fisik</a>
                    </li> 
                </ul>

                {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                    <span>Supplier</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('supplier/create')  ? 'active':''}}" href="{{route('whCreate')}}"><span class="fa fa-plus-square fa-fw"></span> Supplier Baru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('supplier') ? 'active':''}}" href="{{route('whIndex')}}"><span class="fa fa-map-marker-alt fa-fw"></span> List Supplier</a>
                    </li>
                </ul> --}}


                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                    <span>Transaksi</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(1) == 'transaction' ? 'active':''}}" href="{{route('trIndex')}}"><span class="fa fa-cash-register fa-fw"></span> Jual / Beli / Retur Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(1) == 'penjualan' ? 'active':''}}" href="{{route('penjualan.admin.index')}}"><span class="fa fa-cash-register fa-fw"></span> Data Penjualan</a>
                    </li>
                </ul>

                @if(auth()->user()->role != 'U')
                {{--  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                    <span>Periode</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(1) == 'periode' ? 'active':''}}" href="{{ route('periodeIndex') }}"><span class="fa fa-calendar-alt fa-fw"></span>List Periode</a>
                    </li>
                </ul>  --}}
                @endif

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                    <span>Laporan</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{\Request::path() == 'laporan/penjualan/create' ? 'active':''}}" href="{{ route('laporanPenjualanCreate') }}"><span class="fa fa-calendar-alt fa-fw"></span> Penjualan</a>
                        <a class="nav-link {{\Request::path() == 'laporan/penjualan_online/create' ? 'active':''}}" href="{{ route('laporanPenjualanOnlineCreate') }}"><span class="fa fa-calendar-alt fa-fw"></span> Penjualan Online</a>
                        {{--  <a class="nav-link {{\Request::path() == 'laporan/penjualan_return/create' ? 'active':''}}" href="{{ route('laporanPenjualanReturnCreate') }}"><span class="fa fa-calendar-alt fa-fw"></span> Return Penjualan</a>  --}}
                        <a class="nav-link {{\Request::path() == 'laporan/pembelian/create' ? 'active':''}}" href="{{ route('laporanPembelianCreate') }}"><span class="fa fa-calendar-alt fa-fw"></span> Pembelian</a>
                        <a class="nav-link {{\Request::path() == 'laporan/pembelian_retur/create' ? 'active':''}}" href="{{ route('laporanPembelianReturnCreate') }}"><span class="fa fa-calendar-alt fa-fw"></span> Retur Barang</a>
                        <a class="nav-link {{\Request::path() == 'laporan/barang/create' ? 'active':''}}" href="{{ route('laporanBarangCreate') }}"><span class="fa fa-calendar-alt fa-fw"></span> Barang</a>
                    </li>
                </ul>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(1) == 'password' ? 'active':''}}" href="{{ route('passwordChange') }}"><span class="fa fa-key fa-fw"></span> Ubah Sandi</a>
                    </li>
                </ul>
            </div>
            </nav>
            @yield('content')
        </div>
    </div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Jquery -->
<script src="{{ asset('dist/vendor/jquery/jquery.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('dist/vendor/popper/popper.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
<!-- Data Tables -->
<script src="{{ asset('dist/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Datepicker -->
<script src="{{ asset('dist/vendor/bootstrap-datepicker/js/datepicker.min.js') }}"></script>

<script type="text/javascript">
@if(session()->has('error'))
    alert("{{ session()->get('error') }}")
@elseif(session()->has('success'))
    alert("{{ session()->get('success') }}")
@endif


$(document).ready(function() {
    var t = $('#dataTables').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": [0,5]
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script type="text/javascript">
$(document).on("click", ".delete", function (e) {
    e.preventDefault();
    var _self = $(this);

    var textData    = _self.data('text');
    var valueData   = _self.data('value');
    $(".modalDataText").text(textData);
    $(".modalDataValue").val(valueData);

    $(_self.attr('href')).modal('show');
});
$("#alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert").slideUp(3000);
});
</script>

<script type="text/javascript">
$(document).on("click", ".import", function (e) {
    e.preventDefault();
    var _self = $(this);

    $(_self.attr('href')).modal('show');
});
$(document).on("click", ".deleteAll", function (e) {
    e.preventDefault();
    var _self = $(this);

    $(_self.attr('href')).modal('show');
});
</script>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
    
    $('#datepicker2').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
</script>

<script type="text/javascript">
$(document).ready(function() {
	var max_fields      = 20; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
            //$(wrapper).clone().prependTo('.clone')
			//$(wrapper).clone().appendTo('.clone').append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            $(wrapper).clone().appendTo('.clone'); //add input box
		}
	});
	
	// $('.clone').on("click",".remove_field", function(e){ //user click on remove text
	// 	e.preventDefault(); $(this).parent('div.input_fields_wrap').remove(); x--;
	// });
    $('.wrap').on("click",".remove_field", function(){
        //alert('ok');
        $('.wrap').find('.input_fields_wrap').not(':first').last().remove();
	});
});
</script>
</body>
</html>
