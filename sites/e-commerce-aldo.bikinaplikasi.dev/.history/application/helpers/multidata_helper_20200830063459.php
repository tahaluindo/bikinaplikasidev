<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function namaApp()
{
	return 'Toko Batik Mentari Kota Jambi';
}

function pimpinan()
{
	return 'Nurjanah';
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
	$teks = '<h3>Toko Batik Mentari Kota Jambi</h3>';
	$teks .= '<p>Jln. Prof. Dr. Soetami Brojonegoro (Depan Pasa TAC) Kota Jambi-Indonesia</p>';

	return $teks;
}

function infobutik()
{
	$teks = '<p>Jln. Prof. Dr. Soetami Brojonegoro (Depan Pasa TAC) Kota Jambi-Indonesia</p>';

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
		'Manifest Terima' => 'Manifest Terima'
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
