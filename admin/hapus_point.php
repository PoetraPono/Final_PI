<?php 
include "../inc/koneksi.php";
 $id_point=$_GET['kd'];

$query=mysql_query("delete from tb_point where id_point='$id_point'");

if($query){

?><script language="javascript">document.location.href="point.php";</script><?php

}else{

echo "gagal hapus data";

}
?>
