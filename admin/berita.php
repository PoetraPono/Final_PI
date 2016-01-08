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
						<li class="active"><a href="berita.php"><i class="fa fa-laptop"></i> Berita </a></li>
					<!--	<li><a href="tampilgajiaja.php"><i class="fa fa-bar-chart-o"></i> Data Gaji karyawan</a></li>
						<li><a href="#"><i class="fa fa-table"></i> Data Lembur karyawan</a></li>
						<li><a href="#"><i class="fa fa-edit"></i> Data Presensi karyawan</a></li>
						<li><a href="tampilgaji.php"><i class="fa fa-desktop"></i> Cetak Slip Gaji karyawan</a></li>-->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart-o"></i> Report <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="ranking.php">Ranking</a></li>
								<li><a href="honor.php">Honor</a></li>
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
								<li><a href="../logout.php" onClick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Keluar </a></li>
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
            <h1> Data <small>Berita </small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-laptop"></i> Halaman Data Berita </li>
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
                <h3 class="panel-title"><i class="fa fa-laptop"></i> Data Berita</h3> 
              </div>
              <div class="panel-body">
			    <?php
					$query = mysql_query("SELECT id_wartawan FROM wartawan");
					$query2 = mysql_query("SELECT id_point FROM tb_point");
				?>
				
				<form action="insert_berita.php" method="post" enctype="multipart/form-data">
				<table class="table table-condensed">
				<tr>
					<td><label for="id_wartawan">Kode Karyawan</label>
					<select name="id_wartawan" type="text" class="form-control" id="id_wartawan" />
						<option > ==== 	Kode Karyawan ====</option>
						<?php
						while($data=mysql_fetch_array($query))
						{
						?>					
						<option> <?php echo $data['id_wartawan'];?> </option>
						<?php
						}
						?>
						<select>
					</td>
					<td><label for="tgl">Tanggal </label>
					<input name="tgl" type="text" class="form-control" id="tgl" value="<?php echo "".date("Y/m/d").""; ?>"/></td>
					
						
				</tr>
				<tr>
					<td><label for="judul">Judul :</label>
					<input name="judul" type="text"  class="form-control" id="judul" placeholder="Judul" /></td>
					<td><label for="point">Add_Point </label>
					<input name="point" type="text" class="form-control" id="point" placeholder="Point" required/></td>	
				</tr>
				<tr>
					<td><label for="id_point">Kd_Point </label>
						<select name="id_point" type="text" class="form-control" id="id_point" />
							<option> ==== 	Point ====</option>
								<?php
								while($data=mysql_fetch_array($query2))
								{
								?>					
							<option> <?php echo $data['id_point'];?> </option>
								<?php
								}
								?>
						</select>
					</td>
					<td><label for="hal">Keterangan</label>
					<select name="hal" type="text" class="form-control" id="hal" placeholder="Halaman" required/>
							<option align="center"> ==== Halaman ====</option>
							<option value="hal1">Hal 1</option>
							<option value="hal2">Hal 2</option>		
							<option value="hal3">Hal 3</option>	
							</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit"  value="Simpan Data"  class="btn btn-sm btn-primary"/></td>
					<td></td>
				</tr>
				</table>
				</form>
				<HR >
                 <div class="table-responsive">
					<?php
                    $tampil=mysql_query("SELECT * FROM tb_berita");
                    //$total=mysql_num_rows($tampil); 
					?>
					<table class="table table-bordered table-hover table-striped tablesorter">
                  
                      <tr>
						<th>No <i class="fa fa-sort"></i></th>
                        <th>Kode <i class="fa fa-sort"></i></th>
                        <th>Tanggal <i class="fa fa-sort"></i></th>
						<th>Judul <i class="fa fa-sort"></i></th>
                        <th>Kd_point <i class="fa fa-sort"></i></th>
                        <th>Add_Point<i class="fa fa-sort"></i></th>
						<th>Keterangan<i class="fa fa-sort"></i></th>
						<th>Aksi <i class="fa fa-sort"></i></th>
                      </tr>
					  <?php 
					  $batas = 10;
					$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
					if ( empty( $pg ) ) {
						$posisi = 0;
						$pg = 1;
					} else {
						$posisi = ( $pg - 1 ) * $batas;
					}
					$tampil=mysql_query("select * from tb_berita order by id_wartawan desc limit $posisi, $batas");
					$no = 1+$posisi;
					$NO=1;
						while($data=mysql_fetch_array($tampil))
						{	
                     ?>
					 <tr align="center">
					 <td><?php echo $NO++; ?></td>
                    <td><?php echo $data['id_wartawan'];?></td>
                    <td><?php echo $data['tgl']; ?></a></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo $data['id_point']; ?></td>
					<td><?php echo $data['point']; ?></td>
					<td><?php echo $data['hal']; ?></td>
                    <td>
						<a class="btn btn-sm btn-primary" href="edit_berita.php?hal=edit&kd=<?php echo $data['id_wartawan'];?>" onClick="return confirm('Apakah anda akan edit data berita?');"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-sm btn-danger" href="hapus_berita.php?hal=hapus&kd=<?php echo $data['id_wartawan'];?>" onClick="return confirm('Apakah anda akan menghapus data berita?');"><i class="fa fa-wrench"></i> Hapus</a>
					</td>
                    
                    </tr>
				    <?php 
                     $no++;
					}
					?>
					<tr>
					<td colspan="8">
				<?php
				$jml_data = mysql_num_rows(mysql_query("SELECT * FROM tb_berita"));
				$JmlHalaman = ceil($jml_data/$batas); 
				if ( $pg > 1 ) {
				$link = $pg-1;
				$prev = "<a href='?pg=$link'>Sebelumnya </a>";
				} else {
				$prev = "Sebelumnya ";
				}
				//Navigasi nomor
				$nmr = '';
				for ( $i = 1; $i<= $JmlHalaman; $i++ ){
					if ( $i == $pg ) {
					$nmr .= $i . " ";
					} else {
					$nmr .= "<a href='?pg=$i'>$i</a> ";
					}
				}
				//Navigasi ke selanjutnya
				if ( $pg < $JmlHalaman ) {
				$link = $pg + 1;
				$next = " <a href='?pg=$link'>Selanjutnya</a>";
				} else {
				$next = " Selanjutnya";
				}		
				//Tampilkan navigasi
				echo $prev . $nmr . $next;
				
				?>
				<br>
				
				</td>
				</tr>
				
					</table>
					</div>
                
				
			 </div><!-- /#page-wrapper -->
			</div>
		</div><!-- /#wrapper -->

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