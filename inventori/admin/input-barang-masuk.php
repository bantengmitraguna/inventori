<?php session_start();
include_once("../koneksi.php");
$result = mysqli_query($koneksi, "SELECT * FROM barang_masuk ORDER BY kode DESC");

if( !isset($_SESSION['admin']) )
{
  header('location:./../'.$_SESSION['akses']);
  exit();
}

$nama = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Barang</title>
	<link rel="shortcut icon" href="../images/icon.ico">
		<!--Import Google Icon Font-->
		<link rel="stylesheet" type="text/css" href="../css/material-icon"/>
		<!--Import materialize.css-->
		<link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen,projection"/>
		<!--custom css-->
		<link rel="stylesheet" type="text/css" href="../css/custom.css">

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style type="text/css">
			header, main, footer {
				padding-left: 300px;
			}

			@media only screen and (max-width : 992px) {
				header, main, footer {
				padding-left: 0;
				}
			}
		</style>

</head>
<body>
	<header>
		<!--TopNav-->
	    <nav class="row top-nav red darken-2">
			<div class="col offset-l1 nav-wrapper">
				<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<a>Input Barang</a>
			</div>
		</nav>

		<!--SIDENAV-->
		<ul id="slide-out" class="sidenav sidenav-fixed">
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
	                <li>
	                	<div class="user-view">
	                    	<div class="background" style="margin-bottom:-15%;">
	                    		<img src="../images/bg.jpg">
	                    	</div>
	                		<span class="white-text name"> <?php echo $nama; ?><i class="material-icons left">account_circle</i></span>
	                	</div>
	                </li>
	                
	                <li><div class="divider" style="margin-top:15%;"></div></li>

	                <li><a class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

	                <li>
	                	<a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
	                	<div class="collapsible-body">
	                		<ul>
	                			<li><a href="user.php">User</a></li>
								<li class="active red darken-4"><a href="inputbarang.php">Input Barang</a></li>
								<li><a href="gudang.php">Gudang</a></li>
								<li><a href="barangkeluar.php">Barang Keluar</a></li>
							</ul>
						</div>
	                </li>
	                <li><a href="../logout.php" class="collapsible-header">Keluar<i class="material-icons">exit_to_app</i></a></li>

	            </ul>
			</li>
		</ul>
	</header>
	<!--end of header-->

	<!--content-->
		<main>
			<div class="row">
				<div class="col s10 offset-s1"> <br>
					<!--table-->
					<form action="" method="post" name="form1">
						<div class="col s12 card-panel z-depth e-input-field"> <br>
							<table class="highlight">
								<!--kolom isian table-->
								<tr>
					              <th>Jenis Barang</th>
					              <th>
				              		<select name="kode_barang">
										<option value="" disabled selected>Pilih Jenis Barang</option>
										<option value="Laptop">Laptop</option> //laptop
										<option value="Keyboard">Keyboard</option> //keyboard
										<option value="Mouse">Mouse</option> //mouse
										<option value="Adaptor">Adaptor</option> //adaptor
										<option value="Infocus">Infocus</option> //infocus
										<option value="Printer">Printer</option> //printer
									</select>
					              </th>
					            </tr>
				              	<tr>
				                	<th>Nama Barang</th>
				                	<th><input type="text" name="nama_barang" required></th>
				              	</tr>
				              	<tr>
				                	<th>Serial Number</th>
				                	<th><input type="text" name="serial" required></th>
				              	</tr>
				              	<tr>
				              		<th>Kondisi</th>
				              		<td>
				              			<select name="kondisi">
											<option value="" disabled selected>Pilih Kondisi Barang</option>
											<option value="bagus">Bagus</option>
											<option value="rusak">Rusak</option>
										</select>
				              		</td>
				              	</tr>
				              	<tr>
				                	<th>Pengirim</th>
				                	<th><input type="text" name="pengirim" required></th>
				             	</tr>
				             	<tr>
				                	<th>Tanggal</th>
				                	<th><input type="date" name="tanggal" required></th>
				              	</tr>
				              	<tr>
				                	<th>Penerima</th>
				                	<th><input type="text" name="penerima" required></th>
				              	</tr>
							</table>
							<table>
					            <tr>
					            	<th>
					            		<button class="right waves-effect waves-light btn green darken-2" type="submit" name="tambah">Input Barang</button>
					            	</th>
					            	<th style="width: 1%;">
					            		<a href="inputbarang.php" class="right waves-effect waves-light btn red darken-2">Kembali</a> 
					            	</th>
					            </tr>
					        </table>
						</div>
					</form>
				</div>
			</div>
		</main>
        <!--end of content-->

        <!-- Proses Penambahan Data User -->

        <?php
 
          // Check If form submitted, insert form data into users table.
          if(isset($_POST['tambah'])) {
            $kode_barang = $_POST['kode_barang'];
            $name = $_POST['nama_barang'];
            $serial = $_POST['serial'];
            $kondisi = $_POST['kondisi'];
            $pengirim = $_POST['pengirim'];
            $tanggal = $_POST['tanggal'];
            $penerima = $_POST['penerima'];
            
            // include database connection file
            include_once("../koneksi.php");
            
			$ada=mysqli_query($koneksi, "SELECT serial FROM barang_masuk WHERE serial='$serial'") or die(mysql_error());
				
				if(mysqli_num_rows($ada)>0){ 
					echo "<script>alert('Serial Sudah Terdaftar!.')</script>"; 
				}else{
					  // Insert user data into table
		            $result = mysqli_query($koneksi, "INSERT INTO barang_masuk(kode_barang,nama_barang,serial,kondisi,pengirim,tanggal,penerima) VALUES('$kode_barang','$name','$serial','$kondisi','$pengirim','$tanggal','$penerima')"); 
		            $result2 = mysqli_query($koneksi, "INSERT INTO gudang(kode_barang,nama_barang,serial,kondisi,pengirim,tanggal,penerima) VALUES('$kode_barang','$name','$serial','$kondisi','$pengirim','$tanggal','$penerima')"); 
		            
		            echo "<script>alert('Tambah Barang Berhasil ! Jenis Barang : $kode_barang')</script>";
				}
          }
        ?>

        <!-- End -->

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.sidenav').sidenav();
			$('.collapsible').collapsible();
			$('select').formSelect();
			$('.modal').modal();
		});
	</script>
</body>
</html>