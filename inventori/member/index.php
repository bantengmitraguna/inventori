<?php
session_start();
  
  $user = "localhost";
  $name = "root";
  $pass = "";
  $dbname = "inventori";
 
  $con = mysqli_connect($user,$name,$pass,$dbname);
 
  if (!$con){
    die ("Database Tidak Ada : " . mysqli_connect_error());
  }
$kueri = mysqli_query($con, "SELECT * FROM users");
 
  $data = array ();
  while (($row = mysqli_fetch_array($kueri)) != null){
    $data[] = $row;
  }
    $cont = count ($data);
    $jml = "".$cont;

    $kueri2 = mysqli_query($con, "SELECT * FROM barang_masuk");
 
  $data2 = array ();
  while (($row = mysqli_fetch_array($kueri2)) != null){
    $data2[] = $row;
  }
    $cont2 = count ($data2);
    $jml2 = "".$cont2;


  $kueri3 = mysqli_query($con, "SELECT * FROM barang_keluar");
 
  $data3 = array ();
  while (($row = mysqli_fetch_array($kueri3)) != null){
    $data3[] = $row;
  }
    $cont3 = count ($data3);
    $jml3 = "".$cont3; 


  $kueri4 = mysqli_query($con, "SELECT * FROM gudang");
 
  $data4 = array ();
  while (($row = mysqli_fetch_array($kueri4)) != null){
    $data4[] = $row;
  }
    $cont4 = count ($data4);
    $jml4 = "".$cont4;

if( !isset($_SESSION['user']) )
{
	header('location:./../'.$_SESSION['akses']);
	exit();
}else{
	$nama = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
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
				<a>Beranda</a>
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
	                		<span class="white-text name"><?php echo $nama; ?><i class="material-icons left">account_circle</i></span>
	                	</div>
	                </li>
	                
	                <li><div class="divider" style="margin-top:15%;"></div></li>

	                <li><a href="index.php" class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

	                <li>
	                	<a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
	                	<div class="collapsible-body">
	                		<ul>
	                			<li><a href="user.php">User</a></li>
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
			<div class="row container">
				<div class="col s12">
					<!--content user-->
					<div class="col s12 l6">
		                <div class="card blue-grey lighten-5">
		                    <div class="card-content red-text text-darken-2">
			                    <span class="card-title">User
			                        <i class="medium material-icons left">supervisor_account</i>
			                        <p class="right"><?php echo $jml; ?></p>
			                    </span>
		                    </div>
		                    
		                    <div class="card-action">
		                    	<i class="material-icons left red-text text-darken-2">visibility</i>
		                    	<a href="user.php" class="red-text text-darken-2">Lihat</a>
		                    </div>
		                </div>
	                </div>

	                <!--content barang masuk-->
					<div class="col s12 l6">
		                <div class="card blue-grey lighten-5">
		                    <div class="card-content red-text text-darken-2">
			                    <span class="card-title">Input Barang
			                        <i class="medium material-icons left">archive</i>
			                        <p class="right"><?php echo $jml2; ?></p>
			                    </span>
		                    </div>
		                    
		                    <div class="card-action">
		                    	<i class="material-icons left red-text text-darken-2">visibility</i>
		                    	<a href="inputbarang.php" class="red-text text-darken-2">Lihat</a>
		                    </div>
		                </div>
	                </div>

	                <!--content Gudang-->
					<div class="col s12 l6">
		                <div class="card blue-grey lighten-5">
		                    <div class="card-content red-text text-darken-2">
			                    <span class="card-title">Gudang
			                        <i class="medium material-icons left">inbox</i>
			                        <p class="right"><?php echo $jml4; ?></p>
			                    </span>
		                    </div>
		                    
		                    <div class="card-action">
		                    	<i class="material-icons left red-text text-darken-2">visibility</i>
		                    	<a href="gudang.php" class="red-text text-darken-2">Lihat</a>
		                    </div>
		                </div>
	                </div>

	                <!--content barang Keluar-->
					<div class="col s12 l6">
		                <div class="card blue-grey lighten-5">
		                    <div class="card-content red-text text-darken-2">
			                    <span class="card-title">Barang Keluar
			                        <i class="medium material-icons left">unarchive</i>
			                        <p class="right"><?php echo $jml3; ?></p>
			                    </span>
		                    </div>
		                    
		                    <div class="card-action">
		                    	<i class="material-icons left red-text text-darken-2">visibility</i>
		                    	<a href="barangkeluar.php" class="red-text text-darken-2">Lihat</a>
		                    </div>
		                </div>
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
		});
	</script>
</body>
</html>