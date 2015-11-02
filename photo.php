<?php

class Photo{
	
	private $format;
	private $type;
	private $qty;
	private $position;
	
	function __construct($f, $t, $q, $p){

		$this->format = $f;
		$this->type = $t;
		$this->qty = $q;
		$this->position = $p;
		
	}
	
	public function getFormat(){
		return $this->format;
	}
	
	public function getType(){
		return $this->type;
	}
	
	public function getQty(){
		return $this->qty;
	}
	
	public function getPosition(){
		return $this->position;
	}
	
	public function getInfo(){
		echo "Format: " . $this->format . ", Type: " . $this->type . ", Quantity: "
			. $this->qty . ", Position: " . $this->position ."<br>";
	}
	
	public function explodePosition(){
		$exploded = explode(',', $this->position);
		
		return $exploded;
	}
	
	public function explodeQty(){
		$qtyExploded = explode(',', $this->qty);
		
		return $qtyExploded;
	}
	
}

?>