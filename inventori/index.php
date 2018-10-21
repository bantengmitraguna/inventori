<!DOCTYPE html>
<html>
<head>
	<title>MASUK</title>
	<link rel="shortcut icon" href="images/icon.ico">
		<!--Import Google Icon Font-->
		<link rel="stylesheet" type="text/css" href="css/material-icon"/>
		<!--Import materialize.css-->
		<link rel="stylesheet" type="text/css" href="css/materialize.min.css" media="screen,projection"/>
		<!--custom css-->
		<link rel="stylesheet" type="text/css" href="css/custom.css">

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style type="text/css">
			body {
			background: url(images/bg.jpg) no-repeat fixed;
			-webkit-background-size: 100% 100%;
			-moz-background-size: 100% 100%;
			-o-background-size: 100% 100%;
			background-size: 100% 100%;
			}
	    </style>
</head>
<body>
	<div class="row" style="margin-top:10%;">
		<div class="container">
			<!--Form Login-->
			<form method="POST" action="check-login.php">
				<div class="col s12 m12 l6 offset-l3 card-panel z-depth white">
					<div class="card-title center">
						<h4>Masuk</h4>
					</div>

					<!--input text nama pengguna-->
					<div class="col s12 m12 l12 input-field e-input-field">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="username" id="icon_nama" class="validate">
						<label for="icon_nama">Username</label>
					</div>

					<!--input text password-->
					<div class="col s12 m12 l12 input-field e-input-field">
						<i class="material-icons prefix">lock</i>
						<input type="password" name="password" id="icon_sandi" class="validate">
						<label for="icon_sandi">Password</label>
					</div>

					<!--Button-->
					<div class="row">
						<div class="col s12 m12 l12 center">
							<button class="btn red darken-2 waves-effect waves-light" type="submit" name="action">Submit</button>
						</div>
                  	</div>

				</div>
			</form>
		</div>		
	</div>


	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>
		var elem = document.querySelector('.sidenav');
	</script>
</body>
</html>