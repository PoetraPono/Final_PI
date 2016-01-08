<?php
include "../inc/koneksi.php"
?>
<?php
$id_point       = $_POST['id_point'];
$score   	    = $_POST['score'];
$ket     	    = $_POST['ket'];

$query = mysql_query("INSERT INTO tb_point (id_point, score, ket) VALUES ('$id_point', '$score', '$ket')");
if ($query){
	echo "<script>alert('Data Karyawan Berhasil dimasukan!'); window.location = 'point.php'</script>";	
} else {
	echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'point.php'</script>";	
}
?>