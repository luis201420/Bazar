<?php

class Venta{
	private $id;
	private $fecha;


	function __construct() {
		$this->fecha=null;
	}

	public function setId($new_id){
		$this->id=$new_id;
		return $this;
	}

	public function setFecha($f){
		$this->fecha=$f;
		return $this;
	}

	public function getId(){
		return $this->id;
	}

	public function getFecha(){
		return $this->fecha;
	}
}

?>