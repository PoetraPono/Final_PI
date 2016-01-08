<?php 
session_start();
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../index.html'</script>";	
} else {
	include "../inc/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Manajemen Berita">
    <meta name="author" content="Mohammad Yasin S">

    <title>Welcome to Wawasan ( Sistem Manajemen Berita )</title>
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    
    <script type="text/javascript">
	// 1 detik = 1000
	window.setTimeout("waktu()",1000);  
	function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
	}
	</script>
	
	<script language="JavaScript">
	var tanggallengkap = new String();
	var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
	namahari = namahari.split(" ");
	var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
	namabulan = namabulan.split(" ");
	var tgl = new Date();
	var hari = tgl.getDay();
	var tanggal = tgl.getDate();
	var bulan = tgl.getMonth();
	var tahun = tgl.getFullYear();
	tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;
	
	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
	}
	</script>
	
</head>
<body>
	<div id="wrapper">
	
		<!-- Sidebar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Sistem Manajemen Berita</a>
				</div>
				
			<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav side-nav">
						<li ><a href="index.php"><i class="fa fa-dashboard"></i> Home </a></li>
						<!--<li class="active"><a href="data_karyawan.php"><i class="fa fa-user"></i> Data karyawan</a></li>-->
						<li class="dropdown">
							<a href="data_karyawan.php"  class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Data Karyawan <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="data_karyawan.php"><i class="fa fa-user"></i>Data Karyawan</a></li>
							</ul>
						</li>
						<li><a href="point.php"><i class="fa fa-edit"></i> Point </a></li>
						<li><a href="berita.php"><i class="fa fa-laptop"></i> Berita </a></li>
					<!--	<li><a href="tampilgajiaja.php"><i class="fa fa-bar-chart-o"></i> Data Gaji karyawan</a></li>
						<li><a href="#"><i class="fa fa-table"></i> Data Lembur karyawan</a></li>
						<li><a href="#"><i class="fa fa-edit"></i> Data Presensi karyawan</a></li>
						<li><a href="tampilgaji.php"><i class="fa fa-desktop"></i> Cetak Slip Gaji karyawan</a></li>-->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart-o"></i> Report <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="ranking.php">Ranking</a></li>
								<li><a href="#">Honor</a></li>
							</ul>
					</li>
					</ul>
				
					<ul class="nav navbar-nav navbar-right navbar-user">
						
						<li class="dropdown user-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hallo,
						<?php
						echo $_SESSION['username'];
						?>
						<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> Pesan Masuk <span class="badge">7</span></a></li>
								<li><a href="../admin/setting_user.php"><i class="fa fa-gear"></i> Pengaturan </a></li>
								<li class="divider"></li>
								<li><a href="../logout.php" onclick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Keluar </a></li>
							</ul>
						</li>
					</ul>
				 </div><!-- /.navbar-collapse -->
		 </nav>
		 
		 <?php
		$timeout = 10; // Set timeout minutes
		$logout_redirect_url = "../index.html"; // Set logout URL

		$timeout = $timeout * 60; // Converts minutes to seconds
		if (isset($_SESSION['start_time'])) {
		$elapsed_time = time() - $_SESSION['start_time'];
		if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
		}
		}
		$_SESSION['start_time'] = time();
		?>
		<?php } ?>
		
		<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1> Data <small>Karyawan </small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-user"></i> Halaman Data Karyawan </li>
            </ol>
            <table width="900">
            <tr>
            <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
            </tr>
            </table>
            <br />
			</div>
			</div>
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Data karyawan</h3> 
              </div>
              <div class="panel-body">
			  <div class="table-responsive">
				<?php
                    $query=mysql_query("select * from wartawan WHERE id_wartawan='$_GET[kd]'");
					$data  = mysql_fetch_array($query);
				?>
			   <form action="update.php" method="post">
               <table class="table table-condensed">
			   <tr>
					<td><label for="id_wartawan">Kode Karyawan</label></td>
					<td><input name="id_wartawan" type="text" class="form-control" id="id_wartawan" value="<?php echo $data['id_wartawan'];?>" readonly="readonly"/></td>
				</tr>
				<tr>
					<td><label for="nama_wartawan">Nama karyawan </label></td>
					<td><input name="nama_wartawan" type="text" class="form-control" id="nama_wartawan" value="<?php echo $data['nama_wartawan'];?>" ></td>
				</tr>
				 <tr>
					<td><label for="status_kar">Status Karyawan </label></td>
					<td><select name="status_kar" type="text" class="form-control" id="status_kar" placeholder="Status Karyawan" required/>
						<option> ==== Status Karyawan====</option>
						<option value="Tetap"> Tetap</option>
						<option value="Tidak_tetap"> Tidak Tetap</option>		
						</select>
					</td>
					</tr>
				<tr>
					<td><label for="status">Status</label></td>
					<td><select name="status" type="text" class="form-control" id="status" value="<?php echo $data['status'];?>">
						<option > ==== Status ====</option>
						<option value="Menikah">Menikah</option>
						<option value="Belum Menikah">Belum Menikah</option>		
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="kota">Kota </label></td>
					<td><input name="kota" type="text" class="form-control" id="kota" value="<?php echo $data['kota'];?>"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="data_karyawan.php" class="btn btn-sm btn-primary">Kembali</a></td>
					<td></td>
				</tr>
				</table>
				</form>
				</div>
				</div>
				</div>
				</div>
				<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

</body>
</html>

















 

