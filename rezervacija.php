

	<?php include('server.php') ?> <!-- uzima sav kod koji se nalazi u php datoteci i koristi je kao dio koda datoteke
											u koju je "pozvana"; spajanje_baza.php u sebi sadrži kod za spajanje sa serverom i bazom 
											podataka u kojoj se nalaze korisnici web aplikacije -->
											
																															
<?php
if(isset($_GET['date'])){
    $date = $_GET['date'];
}

if(isset($_POST['submit'])){
    $ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
    $email = $_POST['email'];
	$apartman =$_POST['apartman'];
	$odrasli = $_POST['odrasli'];
	$djeca= $_POST['djeca'];
    $mysqli = new mysqli('localhost', 'root', '', 'ibozic');
    $stmt = $mysqli->prepare("INSERT INTO bookings (ime, prezime, email, apartman, odrasli, djeca, date) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssss', $ime, $prezime, $email, $apartman, $odrasli, $djeca, $date);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Uspješno rezervirano!</div>";
    $stmt->close();
    $mysqli->close();
}


    // Generating a random number 
    $randomNumber = rand(); 
   
      
    // Generating a random number in a  
    // Specified range. 
    $randomNumber = rand(100,10000); 
 

			$to=$email;
			$subject="Rezervacijski kod";
			$message ="Prilikom dolaska na rezervirani termin morate imati rezervacijski kod. \n";
			$message .="Vaš rezervacijski kod je:\n";
			$message .= $randomNumber;
			//$message = print_r($randomNumber); 
			$header ="From: ivabozi96@gmail.com";
			mail($to, $subject, $message, $header);
		

?>

<!DOCTYPE html>
<html>
<head>
<title>EMMI</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	

 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="forme_style.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
      <li><a href="apartmani.php">Apartmani</a></li>
      <li><a href="lifestyle.php">Lifestyle</a></li>
	  <li class="active"><a href="kalendar.php">Rezervacija</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="registracija.php"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
      <li><a href="prijava.php"><span class="glyphicon glyphicon-log-in"></span> Prijava</a></li>

	  
	  <!-- ODJAVA  -->
	 
		<?php  if (isset($_SESSION['Mail_user'])) : ?>
		    <li><a href="prijava.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> Odjava</a></li> 
		<?php endif ?> 

	  
    </ul>
  </div>
</nav>

<!-- FORMA ZA REZERVACIJU  -->

<div class="col-md-5">

				
				<div class="row">
						<h3 class="text-center">REZERVACIJA <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr></h3>
				</div>
				
			
			
				<!-- KAD NIJE ISPUNJENO NES OD POLJA  -->
			 <?php include('errors.php'); ?>	
				
				 <?php echo isset($msg)?$msg:''; ?> <!-- Funkcija isset () provjerava je li varijabla postavljena, što znači da mora biti deklarirana i nije NULL.

														Ova funkcija vraća true ako varijabla postoji, a nije NULL, inače vraća false.

													    Napomena: Ako se isporuči više varijabli, ova će se funkcija vratiti istinom samo ako su postavljene sve varijable. -->
				<div class="row">
				 <form action="" method="post" autocomplete="off">
					<label class="label col-md-4 control-label">Ime</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="ime">
					</div>
				</div>
				
					<div class="row">
					 <label class="label col-md-4 control-label">Prezime</label>
					 <div class="col-md-8">
						<input type="text" class="form-control" name="prezime">
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">E-mail</label>
					<div class="col-md-8">
						<input type="e-mail" class="form-control" name="email">
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
						<select class="form-control" name="odrasli" id="sel1">
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
						<select class="form-control" name="djeca" id="sel1">
							<option value="0"> 0 </option>
							<option value="1"> 1 </option>
							<option value="2"> 2 </option>
							<option value="3"> 3 </option>
						</select>
					</div>
				</div>
				
	           <div  class="text-center">
				<button class="btn btn-primary" type="submit" name="submit">Potvrdi rezervaciju</button>
			<!--	<input type="submit" name="submit"  class="btn btn-primary"> -->
				<a href="#"><div class="btn btn-warning">Odustani</div></a>
				</div>
				</br>
				</br>
				</form>
				
				
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>