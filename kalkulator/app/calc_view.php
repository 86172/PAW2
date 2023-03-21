<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_amoun">Podaj kwote: </label>
	<input id="id_amoun" type="text" name="amoun" value="<?php if(isset($amoun)) print($amoun); ?>" />
	<br />
	<label for="id_years">Na ile miesięcy: </label>
	<input id="id_years" type="text" name="years" value="<?php if(isset($years)) print($years); ?>" />
	<br />
	<label for="id_interest_rate">Jakie oprocentowanie (w procentach): </label>
	<input id="id_interest_rate" type="text" name="interest_rate" value="<?php if (isset($interest_rate)) print($interest_rate); ?>" /><br />
	<input type="submit" value="Wylicz" />
</form>	

<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>

<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #00f width:300px;">

<?php echo 'Miesięczna rata wynosi: '.$result; ?>

</div>

<?php } ?>

</body>
</html>