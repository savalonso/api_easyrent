<?php

	class Canton{

		public $id;
		public $name;
		public $is_active;
		public $province_id;

		function Canton(){}

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
		function getId_province(){
			return $this->province_id;
		}
		function setId_province($province_id){
			$this->province_id = $province_id;
		
		}

	}
?>