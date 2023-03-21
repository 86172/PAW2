<?php

require_once dirname(__FILE__).'/../config.php';

$amoun = $_REQUEST ['amoun'] ;
$years = $_REQUEST ['years'];
$interest_rate = $_REQUEST ['interest_rate'];
$procent = 100;


if ( ! (isset($amoun) && isset($years) && isset($interest_rate))) {

	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $amoun == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $years == "") {
	$messages [] = 'Nie podano liczby miesięcy';
}
if ( $interest_rate == "") {
	$messages [] = 'Nie podano oprocentowania';
}


if (empty( $messages )) {
	
	
	if (! is_numeric( $amoun ) or $amoun<0) {
		$messages [] = 'Podaj kwotę w postaci liczby dodatniej';
	}
	
	if (! is_numeric( $years )or $years<0) {
		$messages [] = 'Podaj liczbe miesięcy w postaci liczby dodatniej';
	}	
	if (! is_numeric($interest_rate) or $interest_rate<0) {
		$messages [] = 'Podaj oprocentowanie w postaci liczby dodatniej';
	}

}

if (empty ( $messages )) { // gdy brak błędów
	
	$amoun = floatval($amoun);
	$years = intval($years);
	$interest_rate = floatval($interest_rate);
	

if (  (isset($amoun) && isset($years) && isset($interest_rate))) {

			$result = (($amoun /$years) + ($amoun*($interest_rate/$procent)));
			
		}
	}

include 'calc_view.php';