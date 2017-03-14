<?php

class MovimientosCaja{
	private $id;
	private $motivo;
	private $monto;
	private $tipo;


	function __construct() {
		$this->motivo=null;
		$this->monto=null;
		$this->tipo=null;
	}

	public function setId($new_id){
		$this->id=$new_id;
		return $this;
	}

	public function setMotivo($m){
		$this->motivo=$m;
		return $this;
	}

	public function setMonto($m){
		$this->monto=$m;
		return $this;
	}

	public function setTipo($t){
		$this->tipo=$t;
		return $this;
	}

	public function getId(){
		return $this->id;
	}

	public function getMotivo(){
		return $this->motivo;
	}

	public function getMonto(){
		return $this->monto;
	}

	public function getTipo(){
		return $this->tipo;
	}
}

?>