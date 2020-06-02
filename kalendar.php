<?php
function build_calendar($month, $year){
	$mysqli = new mysqli('localhost', 'root', '', 'ibozic');
    $stmt = $mysqli->prepare("select * from bookings where MONTH(date) = ? AND YEAR(date) = ?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }
            
            $stmt->close();
        }
	}
	
	
	//za pčetak - kreiramo array koja sadrži imena svih dana u tjednu
	$daysOfWeek = array('Nedjelja', 'Ponedjeljak', 'Utorak', 'Srijeda', 'Četvrtak', 'Petak', 'Subota');
	
	//zatim slijedi prvi dan u mjesecu koji je u argumentu funkcije
	$firstDayOfMonth = mktime(0,0,0,$month,1,$year);
	
	//zatim moramo dobiti broj dana u mjesecu
	$numberDays = date('t', $firstDayOfMonth);
	
	//zatim moramo 'izvuć' informacije o prvom danu ovoga mjeseca
	$dateComponents = getdate($firstDayOfMonth);
	
	//zatim moramo dobiti ime tekućeg mjeseca
	$monthName = $dateComponents['month'];
	
	//zatim moramo dobit indeksnu vrijednost 0-6 prvog dana u ovom mjesecu
	$dayOfWeek = $dateComponents['wday'];
	
	//zatim dobivamo trenutni datum
    $dateToday = date('Y-m-d');
    
    
    ///ovo je za slijedeci sadasnji i prethodni mjesec
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    
    
        
      $calendar .= "<tr>";
	
	//kreiranje  headera kalendara
	foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'>$day</th>";
     } 
	
	//inicijalizacija brojača dana
	$currentDay=1;
	$calendar.="</tr><tr>";
	
	//////7 stupaca - dayOfweek varijabla
	 if ($dayOfWeek > 0) { 
        for($k=0;$k<$dayOfWeek;$k++){
           $calendar .= "<td  class='empty'></td>"; 

         }
     }
	//dobivanje broja mjeseci
	$month =str_pad($month,2,"0",STR_PAD_LEFT);
	
	while($currentDay <= $numberDays){
		
		//ako je sedmi stupac (subota) dohvaćen, onda treba započeti novi redak
		if($dayOfWeek ==7){
			$dayOfWeek=0;
			$calendar.="</tr><tr>";
		}
		
		$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
		$date="$year-$month-$currentDayRel";
		
		$dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date==date('Y-m-d')? "today" : "";
	if($date<date('Y-m-d')){
        $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
      }elseif(in_array($date, $bookings)){
        $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Already Booked</button>";
      }else{
        $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='rezervacija.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";//upitnik pa nešto znači da je sve iza upitnika get zahtjev
         }
		
		$calendar.="</td>";
		
		//inkrementiranje brojača
		$currentDay++;
		$dayOfWeek++;
	}
	
	//završavanje retka zadnjeg tjedna u mjesecu, po potrebi
	if($dayOfWeek !=7){
		$remainingDays = 7-$dayOfWeek;
		for($i=0;$i<$remainingDays;$i++){
			$calendar .= "<td class='empty'></td>"; 
		}
	}
	$calendar.="</tr>";
	$calendar.="</table>";
	
	echo $calendar;
	
}

?>


<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="kalendarStil.css">-->
	<style>
	@media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;

            }
            
            

            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "Sunday";
            }
            td:nth-of-type(2):before {
                content: "Monday";
            }
            td:nth-of-type(3):before {
                content: "Tuesday";
            }
            td:nth-of-type(4):before {
                content: "Wednesday";
            }
            td:nth-of-type(5):before {
                content: "Thursday";
            }
            td:nth-of-type(6):before {
                content: "Friday";
            }
            td:nth-of-type(7):before {
                content: "Saturday";
            }


        }

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }
            td {
                width: 33%;
            }
        }
        
        .row{
            margin-top: 20px;
        }
        
        .today{
            background:yellow;
        }
        
        
        
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
                     $dateComponents = getdate();
                     if(isset($_GET['month']) && isset($_GET['year'])){
                         $month = $_GET['month']; 			     
                         $year = $_GET['year'];
                     }else{
                         $month = $dateComponents['mon']; 			     
                         $year = $dateComponents['year'];
                     }
                    echo build_calendar($month,$year);
				?>
			</div>
		</div>
	</div>
<body>
<html>

