<?php 


include '../../../include/koneksi/koneksi.php';

//KODE OTOMATIS	 	
function id_otomatis($nama_tabel,$id_nama_tabel,$panjang_id)
{
	$cek = mysql_query("SELECT * FROM $nama_tabel");
	$rowcek = mysql_num_rows($cek);
	
	
		$kodedepan = strtoupper($nama_tabel);
		$kodedepan = str_replace("DATA_","",$kodedepan);
		$kodedepan = str_replace("DATA","",$kodedepan);
		$kodedepan = str_replace("TABEL_","",$kodedepan);
		$kodedepan = str_replace("TABEL","",$kodedepan);
		$kodedepan = str_replace("TABLE_","",$kodedepan);
		$kodedepan = strtoupper(substr($kodedepan,0,3));
		$id_tabel_otomatis = $kodedepan.date('YmdHis');
		$min = pow($panjang_id, 3 - 1);
		$max = pow($panjang_id, 3) - 1;
		
		$kodeakhir = mt_rand($min, $max);
	    return $id_tabel_otomatis.$kodeakhir;
}


//CEK DATABASE
function cek_database($tabel,$field,$value,$query)
{
	if ($query=="")
	{
		$sql = "SELECT * FROM ".$tabel." WHERE ".$field." ='".$value."'";
	}
	else
	{
		$sql = $query;
	}
	
	$cek_user=mysql_num_rows(mysql_query($sql));
	if ($cek_user > 0) 
	{   
		$hasiltermantab = "ada";
	}
	else
	{
		$hasiltermantab = "nggak";
	}
	return $hasiltermantab;
}

$tanggal=date('Y-m-d');
$jam=date('h:i:');
$cek_database = cek_database("","","","select * from data_riwayat where tanggal='$tanggal' and jam like '%$jam%'");
if ($cek_database == "nggak")
{
$id_riwayat=id_otomatis("data_riwayat","id_riwayat","10");
$foto= ($_POST['foto']);
$f= $id_riwayat.'.png';
$id_kategori_barang=($_POST['id_kategori_barang']);
$jam=date('h:i:s');
$query=mysql_query("insert into data_riwayat values (
'$id_riwayat'
 ,'$tanggal'
 ,'$jam'
 ,'$f'
 ,'$id_kategori_barang'
)");
}

$data = $foto;

list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);

file_put_contents('../../../upload/'.$id_riwayat.'.png', $data);

$cek_database = cek_database("","","","select * from data_kategori_barang where id_kategori_barang='$id_kategori_barang'");
if ($cek_database=="ada")
{
	echo ("sukses");
}
else
{
	echo ("gagal");
}
?>