<?php include('server.php') ?>	
<!DOCTYPE html>
<html>
<head>
<title>EMMI-apartmani</title>


 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="ENAstil.css"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
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
      <li class="active"><a href="apartmani.php">Apartmani</a></li>
      <li><a href="lifestyle.php">Lifestyle</a></li>
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
  


<!-- OVDJE KRECU APARTMANI I TE KARTICE-->
  <h1 class="text-center"> APARTMAN ENA </h1>
 </br>


<div class="container">

  <!-- Full-width images with number text -->
  <div class="mySlides">
    <div class="numbertext">1 / 4</div>
      <img src="soba1.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 4</div>
      <img src="wc1.jpeg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 4</div>
      <img src="terasa1.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">4 / 4</div>
      <img src="kuhinja1.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <!-- Image text -->
  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <!-- Thumbnail images -->
  <div class="row">
    <div class="column">
      <img class="demo cursor" img src="soba1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Apartman ENA - soba">
    </div>


    <div class="column">
      <img class="demo cursor" src="wc1.jpeg" style="width:100%" onclick="currentSlide(2)" alt="Apartman ENA - kupaona">
    </div>


    <div class="column">
      <img class="demo cursor" src="terasa1.jpg" style="width:100%" onclick="currentSlide(3)" alt="Apartman ENA - terasa">
    </div>


	  <div class="column">
      <img class="demo cursor" src="kuhinja1.jpg" style="width:100%" onclick="currentSlide(4)" alt="Apartman ENA - kuhinja">
    </div>
	
    </div>
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
    
</br>
</br>

  <!-- FOOTER -->
<div class="footer">
  <!-- Add font awesome icons -->
<a href="https://www.facebook.com/" class="fa fa-facebook"></a>
<a href="https://www.instagram.com/?hl=hr" class="fa fa-instagram"></a>
</div>


</body>
</html>
