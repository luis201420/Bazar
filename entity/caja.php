<?php

class Caja{
	private $id;
	private $monto_ganancia;
	private $monto_capital;


	function __construct() {
		$this->monto_ganancia=null;
		$this->monto_capital=null;
	}

	public function setId($new_id){
		$this->id=$new_id;
		return $this;
	}

	public function setGanancia($g){
		$this->monto_ganancia=$g;
		return $this;
	}

	public function setCapital($c){
		$this->monto_capital=$c;
		return $this;
	}

	public function getId(){
		return $this->id;
	}

	public function getGanancia(){
		return $this->monto_ganancia;
	}

	public function getCapital(){
		return $this->monto_capital;
	}
}

?>