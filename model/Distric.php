<?php 

	class Distric{
		
		public $id;
		public $name;
		public $is_active;
		public $id_canton;
		function Distric(){}

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
		function getId_canton(){
			return $this->id_canton;
		}
		function setId_canton($id_canton){
			$this->id_canton = $id_canton;
		}

	}
?>