<?php

include "../inc/koneksi.php";

$id_wartawan=$_POST['id_wartawan'];
$nama_wartawan=$_POST['nama_wartawan'];
$status=$_POST['status'];
$kota=$_POST['kota'];

$query = mysql_query("UPDATE wartawan SET nama_wartawan='$nama_wartawan', status='$status', kota='$kota'
 WHERE id_wartawan='$id_wartawan'");
if ($query){

    echo '<script language="javascript">alert("Data berhasil di update!"); document.location="data_karyawan.php";</script>';
} else {
	
	echo '<script language="javascript">alert("Data gagal di update"); document.location="data_karyawan.php";</script>';
}
	

?>