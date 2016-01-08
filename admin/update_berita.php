<?php

include "../inc/koneksi.php";

$id_wartawan=$_POST['id_wartawan'];
$tgl=$_POST['tgl'];
$judul=$_POST['judul'];
$id_point=$_POST['id_point'];
$point=$_POST['point'];
$hal=$_POST['hal'];

$query = mysql_query("UPDATE tb_berita SET tgl='$tgl', judul='$judul', id_point='$id_point', point='$point', hal='$hal'
 WHERE id_wartawan='$id_wartawan'");
if ($query){
echo '<script language="javascript">alert("Data berhasil di update!"); document.location="berita.php";</script>';
} else {
	
	echo '<script language="javascript">alert("Data gagal di update"); document.location="berita.php";</script>';
}

?> 
