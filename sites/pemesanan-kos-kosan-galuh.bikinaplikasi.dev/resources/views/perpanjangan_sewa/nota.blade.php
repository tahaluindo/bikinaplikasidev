<!DOCTYPE html>
<html>
<head>
	<title>Nota</title>

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" media="all">
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}">

    </script>
</head>
<body>
	<div class="container">
		<div class="row" style="padding-bottom: 20px; display: block;">
			<div class="col-xs-12" style="border: 2px black dotted; padding-bottom: 15px;">
				<div class="row">
					<div class="col-xs-4">
						<h4>Kos Kosan</h4>
					</div>
					<div class="col-xs-8">
						<span style="float: right;">
							<strong>Invoice</strong> : <span>{{ $perpanjanganSewa->tagihan_id }}</span> <br>
							<strong>Tanggal</strong> : <span><?php echo date("Y-m-d h:i:s"); ?></span>
						</span>
					</div>
				</div>

				<div class="row" style="padding-bottom: 10px; padding-top: 10px; display: block;">
					<div class="col-xs-6">
						<div style="padding: 5px; text-align: center;  margin-bottom: 5px; border-bottom: 2px black solid; background-color: #337AB7; color: white;">
							<strong>Info Kos Kosan</strong>
						</div>
						<div>
							<ul  style="list-style-type: none; margin-left: 0; padding-left: 0; ">
								<li>{{ $kos->alamat }}</li>
								<li>{{ $kos->no_hp }}</li>
							</ul>
						</div>
					</div>
					<div class="col-xs-6">
						<div style="padding: 5px; text-align: center; margin-bottom: 5px; border-bottom: 2px black solid; background-color: #DFF0D8; color: grey;">
							<strong>Info Penyewa</strong>
						</div>
						<ul style="list-style-type: none; margin-left: 0; padding-left: 0; ">
							<li>{{ $perpanjanganSewa->tagihan->penyewa->nama }}</li>
							<li>{{ $perpanjanganSewa->tagihan->penyewa->no_hp }}</li>
						</ul>
					</div>
				</div>

				<div class="row" style="padding-bottom: 10px;">
					<div class="col-xs-12">
						<table class="table table-bordered table-condensed table-stripped">
							<tr>
								<th>Kamar</th>
								<td>{{ $perpanjanganSewa->tagihan->penyewa->kamar->nomor }}</td>
							</tr>
							<tr>
								<th>Lama Sewa</th>
								<td>{{ $perpanjanganSewa->lama_perpanjangan . " " . $perpanjanganSewa->jenis_perpanjangan}}</td>
							</tr>
							<tr>
								<th>Jatuh Tempo</th>
								<td>{{ $perpanjanganSewa->untuk_tempo }}</td>
							</tr>
							<tr>
								<th>Dibayar Pada</th>
								<td>{{ date("Y-m-d h:i:s") }}</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<span style="float: left;">
							<span>Jambi, @php echo date('d M Y') @endphp</span>
							<p>
							<img src="{{ url('img/tanda_tangan/tanda_tangan.png') }}" style="width: 120px; height: 120px;  margin-top: -30px; margin-bottom: -40px;"><p>
								<span style="display: inline-block;">Ramdan Riawan</span>

						</span>
					</div>
					<div class="col-xs-6">
						<span style="float: right;">
							<strong>Total Biaya</strong> : <strong style="color: #31708F">{{ $format_idr($perpanjanganSewa->total) }}</strong>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			window.print();
			window.close();

		});
	</script>
</body>
</html>
