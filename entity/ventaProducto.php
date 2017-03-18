<?php

class VentaProducto{
	private $idVenta;
	private $idProducto;
	private $precio;
	private $cantidad;

	function __construct() {
		$this->precio=null;
		$this->cantidad=null;
	}

	public function setIdVenta($idV){
		$this->idVenta=$idV;
		return $this;
	}

	public function setIdProducto($idP){
		$this->idProducto=$idP;
		return $this;
	}

	public function setPrecio($p){
		$this->precio=$p;
		return $this;
	}

	public function setCantidad($c){
		$this->cantidad=$c;
		return $this;
	}

	public function getIdVenta(){
		return $this->idVenta;
	}

	public function getIdProducto(){
		return $this->idProducto;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function getCantidad(){
		return $this->cantidad;
	}
}

?>