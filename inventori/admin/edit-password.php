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
  $pass2 = $_POST['pass'];
    
  // update user data
  $result = mysqli_query($koneksi, "UPDATE users SET password='$pass2' WHERE id=$id");

  echo "<script>alert('Ganti Password Berhasil !')</script>";
  
  // Redirect to homepage to display updated user in list
  header("Location: user.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
  $nik = $user_data['nik'];
  $name = $user_data['nama']; 
  $str = $user_data['password'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User</title>
  <link rel="shortcut icon" href="../images/icon.ico">
    <!--Import Google Icon Font-->
    <link rel="stylesheet" type="text/css" href="../css/material-icon"/>
    <!--Import materialize.css-->
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen,projection"/>
    <!--custom css-->
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
    <link rel="stylesheet" href="../css/style.css">

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
      <nav>
        <div class="row top-nav red darken-2 nav-wrapper">
        <div class="col s6 offset-s1">
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <a>User</a>
        </div>
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
        <form action="" method="post" name="form1">
          <div class="col s12 m12 l12 card-panel z-depth"> <br>
            <table class="highlight">
              <tr>
                <th>NIK</th>
                <th><input type="text" name="nik" value=<?php echo $nik; ?> disabled></th>
              </tr>
              <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $name;?> disabled></td>
              </tr>
              <tr> 
                <td>Password Lama</td>
                <td><input type="password" value=<?php echo $str; ?> id="pass" disabled></td>
                <td> <i class="material-icons" id="show" title="Lihat Password" onclick="ShowPassword()">visibility</i> <i class="material-icons"  style="display:none" id="hide" title="Sembunyikan Password" onclick="HidePassword()">visibility_off</i></td>
              </tr>
              <tr>
                <td>Password Baru</td>
                <td><input type="password" name="pass"></td>
              </tr>
              <tr>
                  <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
              </tr>
              </table>
              <table>
                <tr>
                  <th>
                    <input type="submit" name="update" value="Edit Password" class="right waves-effect waves-light btn green darken-2" style="float: left;">
                  </th>
                  <th style="width: 1%;">
                    <a href="user.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a> 
                  </th>
                </tr>
              </table>
          </div>
        </form>
        </div>
      </div>
    </main>
        <!--end of content-->

  </div>

  <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <!-- Show Hide Password -->
  <script>
    function ShowPassword()
    {
      if(document.getElementById("pass").value!="")
      {
        document.getElementById("pass").type="text";
        document.getElementById("show").style.display="none";
        document.getElementById("hide").style.display="block";
      }
    }

    function HidePassword()
    {
      if(document.getElementById("pass").type == "text")
      {
        document.getElementById("pass").type="password"
        document.getElementById("show").style.display="block";
        document.getElementById("hide").style.display="none";
      }
    }
  </script>
  <!-- End -->
  <script type="text/javascript">
      $(document).ready(function(){
        $('.collapsible').collapsible();
        $(".button-collapse").sideNav();
    });
  </script>
</body>
</html>