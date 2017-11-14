<?php

 class Province{

 	public $id;
 	public $name;
 	public $is_active;

 	function Province(){}
 	

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id = $id;
	}
	function getName(){
		return $this->name;
	}
	function setName($name){
		$this->name = $name;
	}
	function getIs_active(){
		return $this->is_active;
	}
	function setIs_active($is_active){
		$this->is_active = $is_active;
	}

 }
?>