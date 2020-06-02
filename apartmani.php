<?php include('server.php') ?>	
<!DOCTYPE html>
<html>
<head>
<title>EMMI-apartmani</title>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width", initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
      <li class="active"><a href="#">Apartmani</a></li>
      <li><a href="lifestyle.php">Lifestyle</a></li>
	  <li><a href="kalendar.html">Rezervacija</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="registracija.html"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
      <li><a href="prijava.html"><span class="glyphicon glyphicon-log-in"></span> Prijava</a></li>
	  <li><a href="prijava.html"><span class="glyphicon glyphicon-log-out"></span> Odjava</a></li>
	      </ul>
  </div>
</nav>


<!-- OVDJE KRECU APARTMANI I TE KARTICE-->
  <h1 class="text-center"> NAŠI APARTMANI </h1>
 </br>


<div class="container">
<div class="row justify-content-center">

 <!-- sve iz baze  -->

	<?php 	 
				
					$objekt_query="SELECT * FROM apartmani";

					$run_result_1 = mysqli_query($db,$objekt_query);
				
					while($row_result=mysqli_fetch_array($run_result_1, MYSQLI_ASSOC)){
					
						$naziv_apartmana=$row_result['Naziv_apartmana'];
						$opis=$row_result['Opis'];
						$slike=$row_result['Slika_apartmani'];
						

						echo "
						<div class='col-md-4'>
							 <div class='card shadow' style='width: 28rem;'>
							   <div class='inner'>
							   <img class='card-img-top' src='$slike'>
							   </div>
							  <div class='card-body text-center'>
								<h5 class='card-title'>$naziv_apartmana</h5>
								<p class='card-text'>$opis</p>
								<a href='kalendar.php' class='btn btn-primary'>Pogledaj odmah...</a>
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

  <!-- Gosti -->
  <h1 class="text-center"> MIŠLJENJE NAŠIH GOSTIJU </h1>
 </br>
  
  
 <div class="container">
<div class="row justify-content-center">
<div class="col-md-4">
   <div class="card shadow" style="width: 28rem;">
   <div class="inner">
    <img class="card-img-top" src="fiki.jpg" alt="Filip">
   </div>
  <div class="card-body text-center">
    <h5 class="card-title">Filip G.</h5>
    <p class="card-text">"Oduševljen sam priordom i tišinom, samo čisti zvuci priode, valovi i cvrčci! NP Paklenica jako me se dojmio! Preporučam svima!"</p>

	</br>
    </br>
  </div>
</div>
</div>

  <!-- Galerijica gostiju -->
<div class="col-md-4">
   <div class="card shadow" style="width: 28rem;">
   <div class="inner">
   <img class="card-img-top" src="ena.jpg" alt="Ena">
   </div>
  <div class="card-body text-center">
    <h5 class="card-title">Ena i Hrvoje</h5>
    <p class="card-text">Ena i Hrvoje mladi su bračni par koji su oduševljeni našim apartmanima te nam se svake sezone radosno vraćaju!</p>

	</br>
    </br>
 </div>
</div>
</div>


<div class="col-md-4">
   <div class="card shadow" style="width: 28rem;">
   <div class="inner">
   <img class="card-img-top" src="vana.jpg" alt="Vanica">
   </div>
  <div class="card-body text-center">
    <h5 class="card-title">Vana i njezin pas Cahlua</h5>
    <p class="card-text">"Jako sam sretna što sam pronašla apartman koji je pet-friendly! Ne želim se odvajati od psa ni tijekom odmora, a EMMI apartmani upravo su nam omogućili nezaboravan zajednički odmor za dušu i tijelo!"</p>

	</br>
    </br>
  </div>
</div>
</div>

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
