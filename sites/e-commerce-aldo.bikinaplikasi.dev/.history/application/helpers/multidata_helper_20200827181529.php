<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function namaApp()
{
	return 'Horizons Store Jambi';
}

function pimpinan()
{
	return 'Erwin Darmawan';
}

function hargadiskon($harga) {

	$hasil = $harga - ($harga * 0.1);
	return ribuan($hasil);
}

function ribuan($angka)
{
    return 'Rp. '.number_format($angka,'0',',','.');
}

function norekening()
{
	$teks = "<b>No. Rekening Pembayaran : <b><br> ";
	$teks .= "<b>BRI : 1234589908989</b><br>";
	$teks .= "<b>BCA : 5839788398575</b><br>";
	return $teks;
}

function notelp()
{
	$teks = "082180010027";
	$teks .= "";
	return $teks;
}

function headerLaporan()
{
	$teks = '<h3>Horizons Store Jambi</h3>';
	$teks .= '<p>Open 10Am - 10pm <br>
		Jl. Kimaja Rt03 ARIZONA, Jambi, 36125</p>';

	return $teks;
}

function infobutik()
{
	$teks = '<p>Open 10Am - 10pm <br>
		Jl. Kimaja Rt03 ARIZONA, Jambi, 36125</p>';

	return $teks;	
}

function statustrack()
{
	$data = array(
		'Posting loket' => 'Posting loket',
		'Puri Kirim' => 'Puri Kirim',
		'Puri Terima' => 'Puri Terima',
		'Proses Antar' => 'Proses Antar',
		'Selesai Antar' => 'Selesai Antar',
		'Manifest Terima' => 'Manifest Terima',
		'gagal antar' => 'gagal antar',
		'antar ulang' => 'antar ulang',
	);
	return $data;
}

function maxLengthAngka($angka)
{
	return 'oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "'.$angka.'"';
}


function hanyaHuruf()
{
	return 'onkeydown="return alphaOnly(event);"';
}

function datadb($tbl,$key,$value) {
	$CI = & get_instance();  
	$CI->db->where($key,$value);
	$result = $CI->db->get($tbl)->row();
	return $result;
}