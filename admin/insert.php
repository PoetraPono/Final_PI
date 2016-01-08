<?php
include "../inc/koneksi.php"
?>
<?php
$id_wartawan        = $_POST['id_wartawan'];
$nama_wartawan      = $_POST['nama_wartawan'];
$status_kar         = $_POST['status_kar'];
$status 		    = $_POST['status'];
$kota 	            = $_POST['kota'];


$query = mysql_query("INSERT INTO wartawan (id_wartawan, nama_wartawan, status_kar, status, kota) VALUES ('$id_wartawan', '$nama_wartawan', '$status_kar', '$status', '$kota')");
if ($query){
	echo "<script>alert('Data Karyawan Berhasil dimasukan!'); window.location = 'data_karyawan.php'</script>";	
} else {
	echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'data_karyawan.php'</script>";	
}
?>