<?php session_start();
include_once("../koneksi.php");
$result = mysqli_query($koneksi, "SELECT * FROM barang_masuk ORDER BY kode_barang DESC");

if( !isset($_SESSION['admin']) )
{
  header('location:./../'.$_SESSION['akses']);
  exit();
}

$nama = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';

?>
<?php
// include database connection file
include_once("../koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{ 
  $id = $_POST['id'];
  $kode=$_POST['kode_barang'];
  $name=$_POST['nama_barang'];
  $pengirim=$_POST['pengirim'];
  $tanggal=$_POST['tanggal'];
  $penerima=$_POST['penerima'];
    
  // update user data
  $result = mysqli_query($koneksi, "UPDATE barang_masuk SET kode_barang='$kode',nama_barang='$name',tanggal='$tanggal',pengirim='$pengirim',penerima='$penerima' WHERE id=$id");
  $result2 = mysqli_query($koneksi, "UPDATE gudang SET kode_barang='$kode',nama_barang='$name',tanggal='$tanggal',pengirim='$pengirim',penerima='$penerima' WHERE id=$id");
  
  // Redirect to homepage to display updated user in list
  header("Location: barangmasuk.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
$result = mysqli_query($koneksi, "SELECT * FROM barang_masuk WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
  $kode = $user_data['kode_barang'];
  $name = $user_data['nama_barang'];
  $tanggal = $user_data['tanggal'];
  $pengirim = $user_data['pengirim'];
  $penerima = $user_data['penerima'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
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
				<a>Edit User</a>
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

	                <li><a href="index.php" class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

	                <li>
	                	<a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
	                	<div class="collapsible-body">
	                		<ul>
	                			<li class="active red darken-4"><a href="user.php">User</a></li>
								<li><a href="inputbarang.php">Input Barang</a></li>
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
					<div class="col s12 card-panel z-depth e-input-field"> <br>
						<form action="" method="post" name="form1">
							<div class="col s12 m12 l12"> <br>
								<table class="highlight">
									<!--kolom isian table-->
									<tr>
					        	<td>Kode Barang</td>
					        	<td><input type="text" name="kode_barang" value="<?php echo $kode; ?>"></td>
					      	</tr>
					      	<tr> 
					        	<td>Nama Barang</td>
					        	<td><input type="text" name="nama_barang" value="<?php echo $name;?>"></td>
					      	</tr>
					      	<tr> 
					        	<td>Tanggal</td>
					        	<td><input type="date" name="tanggal" value="<?php echo $tanggal;?>"></td>
					      	</tr>
					      	<tr> 
					        	<td>Pengirim</td>
					        	<td><input type="text" name="pengirim" value="<?php echo $pengirim;?>"></td>
					      	</tr>
					      	<tr> 
					        	<td>Penerima</td>
					        	<td><input type="text" name="penerima" value="<?php echo $penerima;?>"></td>
					      	</tr>
					      	<tr>
				            	<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				            </tr>
								</table>
								<table>
						            <tr>
						            	<th>
						            		<button class="right waves-effect waves-light btn green darken-2" type="submit" name="update">Edit User</button>
						            	</th>
						            	<th style="width: 1%;">
						            		<a href="user.php" class="right waves-effect waves-light btn red darken-2">Kembali</a> 
						            	</th>
						            </tr>
						        </table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
        <!--end of content-->

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.sidenav').sidenav();
			$('.collapsible').collapsible();
			$('select').formSelect();
			$('input#input_text, textarea#textarea2').characterCounter();
		});
	</script>
</body>
</html>