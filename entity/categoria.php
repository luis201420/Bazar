<?php

class Categoria{
	private $id;
	private $nombre;
	private $contenidoTotal;
	private $cantidadVendida;


	function __construct() {
		$this->nombre=null;
		$this->contenidoTotal=null;
		$this->cantidadVendida=null;
	}

	public function setId($new_id){
		$this->id=$new_id;
		return $this;
	}

	public function setNombre($n){
		$this->nombre=$n;
		return $this;
	}

	public function setContenidoTotal($c){
		$this->contenidoTotal=$c;
		return $this;
	}

	public function setCantidadVendida($cv){
		$this->cantidadVendida=$cv;
		return $this;
	}

	public function getId(){
		return $this->id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getContenidoTotal(){
		return $this->contenidoTotal;
	}

	public function getCantidadVendida(){
		return $this->cantidadVendida;
	}
}

?>