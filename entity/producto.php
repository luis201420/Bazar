<?php

class Producto{

	private $id;
	private $nombre;
	private $cantidad;
	private $costo;
	private $idCategoria;


	function __construct() {
		$this->nombre      = null;
		$this->cantidad    = null;
		$this->costo       = null;
		$this->idCategoria = null;
	}

	public function setId($new_id){
		$this->id=$new_id;
		return $this;
	}

	public function setNombre($n){
		$this->nombre=$n;
		return $this;
	}

	public function setCantidad($c){
		$this->cantidad=$c;
		return $this;
	}

	public function setCosto($c){
		$this->costo=$c;
		return $this;
	}

	public function setIdCategoria($id_c){
		$this->idCategoria=$id_c;
		return $this;
	}

	public function getId(){
		return $this->id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function getCosto(){
		return $this->costo;
	}

	public function getIdCategoria(){
		return $this->idCategoria;
	}
}

?>