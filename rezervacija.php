

<?php include('server.php') 	?>			<!-- uzima sav kod koji se nalazi u php datoteci i koristi je kao dio koda datoteke
											u koju je "pozvana"; spajanje_baza.php u sebi sadrži kod za spajanje sa serverom i bazom 
											podataka u kojoj se nalaze korisnici web aplikacije -->
																					
<? 
$db = mysqli_connect('localhost', 'root', '', 'ibozic');
$upit ="SELECT datumOD,datumDO FROM rezervacija WHERE naziv_apartmana='ENA'";

?>

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
	  <li class="active"><a href="rezervacija.php">Rezervacija</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="registracija.php"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
      <li><a href="prijava.php"><span class="glyphicon glyphicon-log-in"></span> Prijava</a></li>

	  
	  
	  <?php  if (isset($_SESSION['Mail_user'])) : ?>
		    <li><a href="prijava.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> Odjava</a></li> 
		<?php endif ?>
	  
    </ul>
  </div>
</nav>

<!-- FORMA ZA REZERVACIJU  -->

<div class="col-md-5">

				
				<div class="row">
						<h3 class="text-center">REZERVACIJA</h3>
				</div>
				
			<hr>
			
			<form method="post" action="rezervacija.php">
				
				<?php include('errors.php'); ?>
				
				
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
					<label class="label col-md-4 control-label" for="sel1">Naziv apartmana</label>
					<div class="col-md-8">
						<select class="form-control" name="apartman" id="sel1">
							<option value="ENA"> ENA </option>
							<option value="MARINA"> MARINA </option>
							<option value="MARIN"> MARIN </option>
						</select>
					</div>
				</div>
				
                <div class="row">
					<label class="label col-md-4 control-label" for="sel1">Broj odraslih</label>
					<div class="col-md-8">
						<select class="form-control" name="Odrasli" id="sel1">
							<option value="0"> 0 </option>
							<option value="1"> 1 </option>
							<option value="2"> 2 </option>
							<option value="3"> 3 </option>
							<option value="4"> 4 </option>
							<option value="5"> 5 </option>
						</select>
					</div>
				</div>
				
                <div class="row">
					<label class="label col-md-4 control-label" for="sel1">Broj djece</label>
					<div class="col-md-8">
						<select class="form-control" name="Djeca" id="sel1">
							<option value="0"> 0 </option>
							<option value="1"> 1 </option>
							<option value="2"> 2 </option>
							<option value="3"> 3 </option>
						</select>
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Datum dolaska</label>
					<div class="col-md-8">
					<input required type="date" class="form-control" name="DateDolaska" id="shootdate" min="<?php echo date('Y-m-d');?>"/>
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Datum odlaska</label>
					<div class="col-md-8">
					<input required type="date" class="form-control" name="DateOdlaska" id="shootdate1" min="<?php echo date('Y-m-d'); ?>"/>
					</div>
				</div>
				
				
				<input type="submit" name="rezervacija" value="Rezerviraj" class="btn btn-info">
				<a href="#"><div class="btn btn-warning">Odustani</div></a>
				</form>
				
				
</div>
</body>
</html>