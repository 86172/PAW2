<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;


class CalcCtrl {

	private $form;  
	private $result; 

	
	public function __construct(){
		
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	

	public function getParams(){
		$this->form->amoun = getFromRequest('amoun');
		$this->form->years = getFromRequest('years');
		$this->form->interest_rate = getFromRequest('interest_rate');
	}
	

	public function validate() {

		if (! (isset ( $this->form->amoun ) && isset ( $this->form->years ) && isset ( $this->form->interest_rate ))) {
			
			return false;
		}
		

		if ($this->form->amoun == "") {
			getMessages()->addError('Nie podano kwoty');
		}
		if ($this->form->years == "") {
			getMessages()->addError('Nie podano liczby miesięcy');
		}
		if ($this->form->interest_rate == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		

		if (! getMessages()->isError()) {
			
			
			if (! is_numeric ( $this->form->amoun )) {
				getMessages()->addError('Podaj kwotę w postaci liczby dodatniej');
			}
			
			if (! is_numeric ( $this->form->years )) {
				getMessages()->addError('Podaj liczbe miesięcy w postaci liczby dodatniej');
			}
			if (! is_numeric ( $this->form->interest_rate )) {
				getMessages()->addError('Podaj oprocentowanie w postaci liczby dodatniej');
			}
		}
		
		return ! getMessages()->isError();
	}
	

	public function process(){

		$this->getParams();
		$procent = 100;

		if ($this->validate()) {
				
			
			$this->form->amoun = intval($this->form->amoun);
			$this->form->years = intval($this->form->years);
			$this->form->interest_rate = intval($this->form->interest_rate);
			getMessages()->addInfo('Parametry poprawne.');
				
			
			$this->result->result = (($this->form->amoun /$this->form->years) + ($this->form->amoun*($this->form->interest_rate/$procent)));
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	

	public function generateView(){

		
		getSmarty()->assign('page_title','Hello');
		getSmarty()->assign('page_description','nafka wita!');
		getSmarty()->assign('page_header','kalkulator kredytowy');
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.html'); 
	}
}
