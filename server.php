<?php

ob_start();               //Pohrana podataka koji se koriste na više stranica; 
session_start();		 //pohranjivanje podataka korisničkog imena, e-maila i lozinke,
						//dok se preglednik ne zatvori
						
// Deklaracija varijabli
$ime = "";
$prezime = "";
$email = "";
$errors = array();


/////////////// SPAJANJE NA BAZU ///////////////////////

$db = mysqli_connect('localhost', 'root', '', 'ibozic'); //spajanje sa lokalnim serverom

////////////////////// REGISTRACIJA /////////////////////////////////

if (isset($_POST['registracija'])) { //ako je korisnik kliknuo na gumb 'registracija'
		
		
		
		//primanje svih ulaznih vrijednosti/podataka registracije koje je unio korisnik prilikom registracije
		//mysqli_real_escape_string: funkcija za izbjegavanje poosebnih znakova u nizu zbog potreba SQLa	
		//$db: određuje vezu ka bazi koju treba koristiti
		//$POST['']: niz posebnih znakova koji će se izbjeći 
		$ime = mysqli_real_escape_string($db, $_POST['Ime_user']);
		$prezime = mysqli_real_escape_string($db, $_POST['Prezime_user']);
		$email = mysqli_real_escape_string($db, $_POST['Mail_user']);
		$password_1 = mysqli_real_escape_string($db, $_POST['Lozinka_user1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['Lozinka_user2']);

		
		
		//PROVJERA PODUDARANJA LOZINKE I POTVRDE LOZINKE
		if ($password_1 != $password_2) {									//ako se lozinka razlikuje od potvrde lozinke
			array_push($errors, "Lozinka i potvrda lozinke se ne podudaraju");
		}

		// REGISTRACIJA KORISNIKA AKO SU ISPRAVNO UNESENI PODACI
		if ($password_1==$password_2) {										//ako je zbroj greški u nizu = 0
			$password = md5($password_1);									//šifriranje lozinke prije spremanja u bazu;
																			//unosi je u obliku heksadecimalnog broja
			
			
			$query = "INSERT INTO user (Ime_user, Prezime_user, Mail_user, Lozinka_user) 
					  VALUES('$ime', '$prezime', '$email', '$password')";
			mysqli_query($db, $query);										//funkcija izvršava upit prema bazi podataka

			$_SESSION['Ime_user'] = $ime;	
			$_SESSION['Prezime_user'] = $prezime;	//sesiji će biti dodjeljena vrijednost korisničkog imena dok se preglednik ne zatvori
			$_SESSION['Mail_user'] = $email;	
									
			header('location: kalendar.php');	  //preusmjeravanje preglednika na index.php nakon uspješne registracije
		}

	}
	
	
	
	//////////////////// PRIJAVA /////////////////////////////
	
	// PRIJAVA KORISNIKA
	//provjerava je li korisnik kliknuo na gumb Prijavi se (prijava.php)
	//mysqli_real_escape_string: funkcija za izbjegavanje posebnih znakova u nizu zbog potreba SQLa	
	//$db: određuje vezu ka bazi koju treba koristiti
	//$POST['']: niz posebnih znakova koji će se izbjeći 
	if (isset($_POST['prijava'])) {
		$email = mysqli_real_escape_string($db, $_POST['Mail_user']);
		$password = mysqli_real_escape_string($db, $_POST['Lozinka_user']);

		
		// PROVJERA ISPRAVNOSTI UNESENIH PODATAKA U OBRAZAC I PRIKAZ OBAVJESTI
		//if empty: funkcija za provjeru je li varijabla prazna ili ne
		//array_push: unosi jedan ili više elemenata na kraj niza.
		//$errors: vrijednost 1; ime niza; definirano u liniji 10
		//"Unesi korisničko ime": vrijednost 2; obavjest
		if (empty($email)) {
			array_push($errors, "Unesi email");
		}
		if (empty($password)) {
			array_push($errors, "Unesi lozinku");
		}
		
		
		// PRIJAVA KORISNIKA AKO SU ISPRAVNO UNESENI PODACI
		if (count($errors) == 0) {																	//ako je zbroj greški u nizu = 0
			$password = md5($password);																//šifriranje lozinke prije spremanja u bazu
			$query = "SELECT * FROM user WHERE Mail_user='$email' AND Lozinka_user='$password'";		//označi sve koji su u tablici "user" kojima se kor ime
																									//i pass podudaraju s unesenim
																									
			$results = mysqli_query($db, $query);													//funkcija izvršava upit prema bazi podataka

		//mysqli_num_rows: funkcija vraća broj redaka dobivenih od upita prema bazi; ako je red samo jedan
		//$_SESSION['username'] = $username;: sesiji se dodjeljuje korisničko ime
		//$_SESSION['uspjesno'] = "Prijavljen si": poruka o uspješnoj prijavi
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['Mail_user'] = $email;
				$_SESSION['Lozinka_user'] = $password;
			
				header('location: kalendar.php');											//preusmjeravanje preglednika na index.php nakon uspješne registracije
			}else {
				array_push($errors, "Pogrešan mail i/ili lozinka");			//obavjest
			}
		}
	}
	
	/////////////////////////// REZERVACIJA //////////////////////////////////////////////////////////
	

////////////////////////////////
	
	if (isset($_POST['rezervacija'])) {
		$db = mysqli_connect('localhost', 'root', '', 'ibozic'); //spajanje sa lokalnim serverom
		$ime = mysqli_real_escape_string($db, $_POST['Ime_user']);
		$prezime = mysqli_real_escape_string($db, $_POST['Prezime_user']);
		$email = mysqli_real_escape_string($db, $_POST['Mail_user']);
		$naziv_apartmana = mysqli_real_escape_string($db, $_POST['apartman']);
		$br_odraslih = mysqli_real_escape_string($db, $_POST['Odrasli']);
        $br_djece = mysqli_real_escape_string($db, $_POST['Djeca']);
		$reservation_date_od = mysqli_real_escape_string($db, $_POST['DateDolaska']);
		$reservation_date_do = mysqli_real_escape_string($db, $_POST['DateOdlaska']);
		
		if (empty($ime)) { array_push($errors, "Unesi ime"); }
		if (empty($prezime)) { array_push($errors, "Unesi prezime"); }
		if (empty($email)) { array_push($errors, "Unesi e-mail"); }
		if (empty($naziv_apartmana)) { array_push($errors, "Unesi naziv apartmana"); }
		if (empty($reservation_date_od)) { array_push($errors, "Unesi datum dolaska"); }
		if (empty($reservation_date_do)) { array_push($errors, "Unesi datum odlaska"); }
		if (empty($br_odraslih)) { array_push($errors, "Unesi broj odraslih osoba"); }
		if (empty($br_djece)) { array_push($errors, "Unesi broj djece"); }

	
	//	if (count($errors) == 0) {											
//$query = "INSERT INTO rezervacija (ime_usera, prezime_usera, mail_usera, naziv_apartmana, br_odraslih, br_djece, datumOD, datumDO ) 
					//  VALUES('$ime','$prezime','$email','$naziv_apartmana', '$br_odraslih','$br_djece', '$reservation_date_od', '$reservation_date_do')";
			//mysqli_query($db, $query);	


					
//echo "INSERT INTO rezervacija (ime_usera, prezime_usera, mail_usera, naziv_apartmana, br_odraslih, br_djece, datumOD, datumDO ) 
					//  VALUES('$ime','$prezime','$email','$naziv_apartmana', '$br_odraslih','$br_djece', '$reservation_date_od', '$reservation_date_do')";
					
			//header('location: prijava.php');


		//}
	}


?>