<?php

include "../inc/koneksi.php";

$id_point=$_POST['id_point'];
$score=$_POST['score'];
$ket=$_POST['ket'];


$query = mysql_query("UPDATE tb_point SET score='$score', ket='$ket' WHERE id_point='$id_point'");
if ($query){
	echo '<script language="javascript">alert("Data berhasil di update!"); document.location="point.php";</script>';
} else {
	
	echo '<script language="javascript">alert("Data gagal di update"); document.location="point.php";</script>';
}

?> 
