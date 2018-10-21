<?php session_start();
include_once("../koneksi.php");
$result = mysqli_query($koneksi, "SELECT * FROM barang_keluar ORDER BY kode_barang DESC");
$result2 = mysqli_query($koneksi, "SELECT * FROM gudang ORDER BY kode_barang DESC");

if( !isset($_SESSION['admin']) )
{
  header('location:./../'.$_SESSION['akses']);
  exit();
}

$nama = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';

?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
$result = mysqli_query($koneksi, "SELECT * FROM gudang WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
  $kode = $user_data['kode_barang'];
  $name = $user_data['nama_barang'];
  $serial = $user_data['serial'];
  $kondisi = $user_data['kondisi'];
  $tanggal = $user_data['tanggal'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Barang Keluar</title>
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
				<a>Input Barang Keluar</a>
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
								<li><a href="inputbarang.php">Input Barang</a></li>
								<li class="active red darken-4"><a href="gudang.php">Gudang</a></li>
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
					            	<th>Kode Barang</th>
					        		<th><input type="text" name="kode_barang" value="<?php echo $kode; ?>" readonly></th>
					            </tr>
				              	<tr>
				                	<th>Nama Barang</th>
				                	<th><input type="text" name="nama_barang" value="<?php echo $name;?>" readonly></th>
				              	</tr>
				              	<tr>
				                	<th>Serial Number</th>
				                	<th><input type="text" name="serial" value="<?php echo $serial;?>" readonly></th>
				              	</tr>
				              	<tr>
				              		<th>Kondisi</th>
				              		<th>
				              			<select name="kondisi">
											<option value="" disabled selected>Pilih Kondisi Barang</option>
											<option value="bagus">Bagus</option>
											<option value="rusak">Rusak</option>
										</select>
				              		</th>
				              	</tr>
				              	<tr>
				                	<th>Tujuan Barang</th>
				                	<th><input type="text" name="tujuan"></th>
				             	</tr>
				             	<tr>
				                	<th>Tanggal</th>
				                	<th><input type="date" name="tanggal" value="<?php echo $tanggal;?>"></th>
				              	</tr>
				              	<tr>
				                	<th>Operator</th>
				                	<th><input type="text" name="operator" value="<?php echo $nama;?>" readonly></th>
				              	</tr>
				              	<tr>
				            		<th><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></th>
				            	</tr>
							</table>
							<table>
					            <tr>
					            	<th>
					            		<button class="right waves-effect waves-light btn green darken-2" type="submit" name="tambah">Submit</button>
					            	</th>
					            	<th style="width: 1%;">
					            		<a href="gudang.php" class="right waves-effect waves-light btn red darken-2">Kembali</a> 
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
            $tujuan = $_POST['tujuan'];
            $tanggal = $_POST['tanggal'];
            $operator = $_POST['operator'];

            
            // include database connection file
            include_once("../koneksi.php");
                
            // Insert user data into table
            $result = mysqli_query($koneksi, "INSERT INTO barang_keluar(kode_barang,nama_barang,serial,kondisi,tujuan,tanggal,operator) VALUES('$kode_barang','$name','$serial','$kondisi','$tujuan','$tanggal','$operator')");
            $result2 = mysqli_query($koneksi, "DELETE FROM gudang WHERE id=$id"); 
            
            echo "<script>alert('Penambahan Barang Keluar Sukses !') </script>";

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
		});
	</script>
</body>
</html>