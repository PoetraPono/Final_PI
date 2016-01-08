<?php
include "../inc/koneksi.php"
?>
<?php
$id_wartawan        = $_POST['id_wartawan'];
$tgl                = $_POST['tgl'];
$judul              = $_POST['judul'];
$id_point 		    = $_POST['id_point'];
$point 	            = $_POST['point'];
$hal                = $_POST['hal'];


$query = mysql_query("INSERT INTO tb_berita (id_wartawan, tgl, judul, id_point, point, hal) VALUES ('$id_wartawan', '$tgl', '$judul', '$id_point', '$point', '$hal')");
if ($query){
	echo "<script>alert('Data Karyawan Berhasil dimasukan!'); window.location = 'berita.php'</script>";	
} else {
	echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'berita.php'</script>";	
}
?>