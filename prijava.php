<?php include('server.php') ?>
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
      <li><a href="registracija.php"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
	  <li class="active"><a href="prijava.php"><span class="glyphicon glyphicon-log-in"></span> Prijava</a></li>
	  <li><a href="prijava.php"><span class="glyphicon glyphicon-log-out"></span> Odjava</a></li>
    </ul>
  </div>
</nav>

<!-- FORMA ZA PRIJAVU  -->

<div class="col-md-5">
			<form method="post" action="prijava.php">
				<?php include('errors.php'); ?>
			
				<div class="row">
						<h3 class="text-center">PRIJAVA SE</h3>
				</div>
				
			<hr>
				
				<div class="row">
					<label class="label col-md-4 control-label">E-mail</label>
					<div class="col-md-8">
						<input type="e-mail" class="form-control" name="Mail_user">
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Lozinka</label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="Lozinka_user">
					</div>
				</div>
								

				
				<input type="submit" name="prijava" value="Prijava" class="btn btn-info">
				<a href="#"><div class="btn btn-warning">Odustani</div></a>
				
				<br/>
			</form>
		</div>
</body>
</html>
