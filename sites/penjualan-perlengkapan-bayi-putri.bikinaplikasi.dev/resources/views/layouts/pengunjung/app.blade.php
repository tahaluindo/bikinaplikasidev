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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('home')}}" style="font-family: 'Chewy', cursive;">3R BBYSHOP KOTA JAMBI</a>
        {{--  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('home')}}" style="font-family:'Tokoku'">{{ Auth::user()->role == "SU" ? "A D M I N": "O W N E R" }}</a>  --}}
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                @if(auth()->check())
                <a class="nav-link" href="{{ url('/logout') }}" onclick='return confirm("Keluar?");'>
                Keluar</a>
                @else
                <div>

                    <a class="text-white" href="{{ url('/daftar') }}">
                        Registrasi</a>
                    <a class="text-white" href="{{ url('/login') }}">
                        Login</a>
                </div>
                @endif
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
                            <a class="nav-link {{Request::segment(1) == 'home' ? 'active':''}}" href="{{route('pengunjung')}}"><span class="fa fa-home fa-fw"></span> Dasbor</a>
                        </li>
                    </ul>

                    @if(auth()->check())
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-5 mb-1 text-muted">
                        <span>Barang</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('product/create') ? 'active':''}}" href="{{route('keranjang.index')}}"><span class="fa fa-plus-square fa-fw"></span> Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Request::is('product') ? 'active':''}}" href="{{route('keranjang.index')}}?checkout=1"><span class="fa fa-clipboard-list fa-fw"></span> Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Request::segment(1) == 'stockreport' ? 'active':''}}" href="{{route('pesanan.index')}}"><span class="fa fa-exclamation fa-fw"></span> Pesanan</a>
                        </li>
                    </ul>
                    @endif
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
    
    $.ajax({
        url: "{{ url('ongkir.json') }}",
        success: function(response){
            response.forEach((city, index, array) => {
                
                $("#ongkir").append(`<option value="${city.city_name}">${city.city_name}</option>`);
            }) 
        }
    })

    $("#ongkir-btn").click(function(e){
        if($('#ongkir-berat').val() == 0) {
            alert('Barang tidak memiliki berat!');
            
            return;
        }
        
        $.ajax({
            url: "{{ url('ongkir.json') }}",
            success: function(response){
                response.forEach((city, index, array) => {

                    
                    
                    if($('#ongkir-input').val() == city.city_name) {
                        $.ajax({
                            url: "{{ url('ongkir_cek') }}",
                            data: {
                                key: 'ae09f87038312e197b1f1516f279a956',
                                origin: 156,
                                destination: city.city_id,
                                weight: $('#ongkir-berat').val(),
                                courier: 'jne',
                                _token: "{{ csrf_token() }}"
                            },
                            type: "POST",
                            success: function(response){
                                var response = JSON.parse(response);
                                
                                response.rajaongkir.results.forEach((courier, index, array) => {
                                    var cost = (courier.costs[1].cost[0].value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.');  // 12,345.67
                                    cost_show = (cost + "ss").replace(".00ss", "");
                                    cost_price = (cost + "ss").replace(".00ss", "").replace(".", "");

                                    $("#ongkir-cost").text("Rp" + cost_show)
                                    $('#ongkir-value').val(cost_price)
                                    
                                }) 
                            }
                        })
                    }
                }) 
            }
        })
    });
});
</script>
</body>
</html>
