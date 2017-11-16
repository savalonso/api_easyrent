<?php 

	class Apartment{
		public $id;
		public $name;
		public $description;
		public $capacity;
    	public $adress;
		public $status_id;
		public $statusName;
		public $distric_id;
		public $distric;
		public $price;
		public $Image;

		public function Apartment(){}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getDescription(){
			return $this->description;
		}

		public function setDescription($description){
			$this->description = $description;
		}

		public function getCapacity(){
	      return $this->capacity;
	    }

	    public function setCapacity($capacity){
	      $this->capacity = $capacity;
	    }

	    public function getAdress(){
	      return $this->adress;
	    }

	    public function setAdress($adress){
	      $this->adress = $adress;
	    }

		public function getStatus_id(){
			return $this->status_id;
		}

		public function setStatus_id($status_id){
			$this->status_id = $status_id;
		}

		public function getStatusName(){
			return $this->statusName;
		}

		public function setStatusName($statusName){
			$this->statusName = $statusName;
		}

		public function getDistric_id(){
			return $this->distric_id;
		}

		public function setDistric_id($distric_id){
			$this->distric_id = $distric_id;
		}

		public function getDistric(){
	      return $this->distric;
	    }
	    
	    public function setDistric($distric){
	      $this->distric = $distric;
	    }

		public function getDrice(){
			return $this->price;
		}

		public function setPrice($price){
			$this->price = $price;
		}

		public function getImage(){
			return $this->Image;
		}

		public function setImage($Image){
			$this->Image = $Image;
		}
		
	}

 ?>