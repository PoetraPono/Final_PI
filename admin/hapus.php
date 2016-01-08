<?php 
include "../inc/koneksi.php";
 $id_wartawan=$_GET['kd'];

$query=mysql_query("delete from wartawan where id_wartawan='$id_wartawan'");

if($query){

?><script language="javascript">document.location.href="data_karyawan.php";</script><?php

}else{

echo "gagal hapus data";

}
?>
