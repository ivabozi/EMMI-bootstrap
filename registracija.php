<?php include('server.php') ?> <!-- uzima sav kod koji se nalazi u php datoteci i koristi je kao dio koda datoteke
											u koju je "pozvana"; server.php u sebi sadrži kod za spajanje sa serverom i bazom 
											podataka u kojoj se nalaze korisnici web aplikacije -->
											
<!DOCTYPE html>
<html>
<head>
<title>EMMI</title>
<meta name="viewport" content="width=device-width", initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="forme_style.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<!-- NAVIGACIJA  -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">EMMI</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.html">Home</a></li>
      <li><a href="apartmani.html">Apartmani</a></li>
      <li><a href="lifestyle.html">Lifestyle</a></li>
	  <li><a href="rezervacija.php">Rezervacija</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="registracija.php"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
      <li><a href="prijava.php"><span class="glyphicon glyphicon-log-in"></span> Prijava</a></li>
	  <li><a href="prijava.php"><span class="glyphicon glyphicon-log-out"></span> Odjava</a></li>
    </ul>
  </div>
</nav>

<!-- FORMA ZA REGISTRACIJU  -->

<div class="col-md-5">

				<form method="post" action="registracija.php">
				
				<?php include('errors.php'); ?>
			
				<div class="row">
						<h3 class="text-center">REGISTRIRAJ SE</h3>
				</div>
				
			<hr>
				

				
				
				<div class="row">
					<label class="label col-md-4 control-label">Ime</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="Ime_user">
					</div>
				</div>
				
					<div class="row">
					 <label class="label col-md-4 control-label">Prezime</label>
					 <div class="col-md-8">
						<input type="text" class="form-control" name="Prezime_user">
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">E-mail</label>
					<div class="col-md-8">
						<input type="e-mail" class="form-control" name="Mail_user">
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Lozinka</label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="Lozinka_user1">
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Potvrda</label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="Lozinka_user2">
					</div>
				</div>
				

				
				<input type="submit" name="registracija" value="Registracija" class="btn btn-info">
				<a href="#"><div class="btn btn-warning">Odustani</div></a>
				
			
				
				<br/>
				<div class="text-center"> <a href="prijava.html">Registriran si? Prijavi se!</a>
			</div>
				</form>
		</div>
</body>
</html>