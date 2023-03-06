<html>
<head>
	<title>:)</title>
<body></head>

Hellow world :)

<?php

$a = 1;
$b = 5;
$c = 0;

$delta= $b*$b -4*($a*$c);


print ("<p> delta wynosi: " . $delta. "</p>");

if ($delta>0){
	$x1 = (-$b + sqrt($delta))/2*$a ;
	$x2 = (-$b - sqrt($delta))/2*$a ;
	 echo "<p> pierwiastki: "  .$x1. ", " .$x2. "</p>";
}else{
	if($delta == 0){
	$x1 = (-$b + sqrt($delta))/2*$a ;
	echo "<p> pierwiastek: "  .$x1. "</p>"; 
	} else {
		 echo "<p> brak pierwiastków rzeczywistych </p>"   ;
	}
}
echo "<p>  <b>ODLICZANIE </b></p>";
	for($i=0; $i<10; $i++){
        echo "<p>" .$i. "</p>";
    }

?>


</body>


<html/>