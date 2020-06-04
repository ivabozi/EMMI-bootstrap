<?php include('server.php') ?>	
<!DOCTYPE html>
<html>
<head>
<title>EMMI-apartmani</title>
<meta name="viewport" content="width=device-width", initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<!-- OVO JE NAV BAR-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">EMMI</a>
    </div>
    <ul class="nav navbar-nav">
	
      <li ><a href="index.html">Home</a></li>
      <li ><a href="apartmani.php">Apartmani</a></li>
      <li class="active"><a href="#">Lifestyle</a></li>
	  <li><a href="kalendar.php">Rezervacija</a></li>
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

  



 <h1 class="text-center"> RESTORANI I BAROVI U ZADRU </h1>
 </br>
  

<!-- OVDJE KRECU RESTORANI ZADAR-->
<div class="container">
<div class="row justify-content-center">


  <!-- Galerijica  -->

  		<?php 	 
				
					$objekt_query="SELECT * FROM objekt WHERE id_lokacije=2";

					$run_result_1 = mysqli_query($db,$objekt_query);
				
					while($row_result=mysqli_fetch_array($run_result_1, MYSQLI_ASSOC)){
					
						$naziv_objekta=$row_result['Naziv_objekta'];
						$opis=$row_result['Opis'];
						$slike=$row_result['Slike_objekta'];
						$link=$row_result['link'];
						

						echo "
						<div class='col-md-4'>
							 <div class='card shadow' style='width: 28rem;'>
							   <div class='inner'>
							   <img class='card-img-top' src='$slike'>
							   </div>
							  <div class='card-body text-center'>
								<h5 class='card-title'>$naziv_objekta</h5>
								<p class='card-text'>$opis</p>
								<a href='$link' class='btn btn-primary'>Pogledaj odmah...</a>
								</br>
								</br>
							 </div>
							</div>
							</div>
							";
					}
				?>

</div>
</div>

</br>
</br>

  <!-- RESTORANI VRSI -->
 <h1 class="text-center"> RESTORANI I BAROVI U VRSIMA </h1>
 </br>
  
  
 <!-- OVDJE KRECU RESTORANI ZADAR-->
<div class="container">
<div class="row justify-content-center">


  <!-- Galerijica  -->

  		<?php 	 
				
					$objekt_query="SELECT * FROM objekt WHERE id_lokacije=1";

					$run_result_1 = mysqli_query($db,$objekt_query);
				
					while($row_result=mysqli_fetch_array($run_result_1, MYSQLI_ASSOC)){
					
						$naziv_objekta=$row_result['Naziv_objekta'];
						$opis=$row_result['Opis'];
						$slike=$row_result['Slike_objekta'];
						$link=$row_result['link'];
						

						echo "
						<div class='col-md-4'>
							 <div class='card shadow' style='width: 28rem;'>
							   <div class='inner'>
							   <img class='card-img-top' src='$slike'>
							   </div>
							  <div class='card-body text-center'>
								<h5 class='card-title'>$naziv_objekta</h5>
								<p class='card-text'>$opis</p>
								<a href='$link' class='btn btn-primary'>Pogledaj odmah...</a>
								</br>
								</br>
							 </div>
							</div>
							</div>
							";
					}
				?>

</div>
</div>




  <!-- FOOTER -->
<div class="footer">
  <!-- Add font awesome icons -->
<a href="https://www.facebook.com/" class="fa fa-facebook"></a>
<a href="https://www.instagram.com/?hl=hr" class="fa fa-instagram"></a>

</div>


</body>
</html>
