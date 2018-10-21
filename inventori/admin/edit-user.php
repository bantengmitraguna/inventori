<?php session_start();
include_once("../koneksi.php");
$result = mysqli_query($koneksi, "SELECT * FROM users ORDER BY nik DESC");

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
  $nik = $_POST['nik'];
  $name=$_POST['nama'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $mobile=$_POST['telepon'];
  $alamat=$_POST['alamat'];
  $divisi=$_POST['divisi'];
  $loker=$_POST['loker'];
  $level=$_POST['level'];

  	// update user data
  $result = mysqli_query($koneksi, "UPDATE users SET nik='$nik',nama='$name',tgl_lahir='$tgl_lahir',alamat='$alamat',telepon='$mobile',divisi='$divisi',loker='$loker',level='$level' WHERE id=$id");
  
  // Redirect to homepage to display updated user in list
  header("Location: user.php");
  
}
?>
<?php
// Mengambil ID User
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($result);

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
						              <th>NIK</th>
						              <th><input type="text" id="input_text" name="nik" data-length="6" maxlength="6" required value="<?php echo $user['nik']; ?>"></th>
						            </tr>
						            <tr>
						              <th>Nama</th>
						              <th><input type="text" id="input_text" name="nama" data-length="60" maxlength="60" required value="<?php echo $user['nama']; ?>"></th>
						            </tr>
						            <tr>
						              <th>Tanggal Lahir</th>
						              <th><input type="date" name="tgl_lahir" required value="<?php echo $user['tgl_lahir']; ?>"></th>
						            </tr>
						            <tr>
						              <th>Alamat</th>
						              <th><input type="text" id="input_text" data-length="200" name="alamat" required minlength="15" maxlength="200" value="<?php echo $user['alamat']; ?>"></th>
						            </tr>
						            <tr>
						              <th>Telepon</th>
						              <th><input type="text" id="input_text" data-length="15" name="telepon" minlength="10" maxlength="15" required value="<?php echo $user['telepon']; ?>"></th>
						            </tr>
						            <tr>
						              <th>Divisi</th>
						              <th><input type="text" id="input_text" data-length="30" maxlength="30" name="divisi" required value="<?php echo $user['divisi']; ?>"></th>
						            </tr>
						            <tr>
						              <th>LOKER</th>
						              <th><input type="text" id="input_text" data-length="30" maxlength="30" name="loker" required value="<?php echo $user['loker']; ?>"></th>
						            </tr>
						            <tr>
						              <th>Level</th>
						              <th>
										<select name="level" required >
											<option value="" disabled selected>Pilih Level</option>
											<option value="1">Admin</option>
											<option value="2">Member</option>
										</select>
						              </th>
						            </tr>
						            <tr>
						            	<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
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